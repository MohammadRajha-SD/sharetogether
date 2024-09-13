<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Traits\ImageUploadTrait;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    public function index(): View
    {
        $user = auth()->user();
        return view('frontend.profile.index', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:25|min:4|unique:users,username,' . auth()->id(),
            'occupation' => 'required|integer|exists:occupations,id',
            'interests' => 'required|array',
            'interests.*' => 'integer|exists:categories,id',
            'bio' => 'nullable|string'
        ]);

        DB::beginTransaction();

        try {
            // Get Current User
            $user = auth()->user();

            // Update User Data
            $user->update([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
            ]);

            // Update User Detail
            $user->details()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'occupation_id' => $validatedData['occupation'],
                    'longitude' => $validatedData['longitude'],
                    'latitude' => $validatedData['latitude'],
                    'bio' => $validatedData['bio'],
                ]
            );

            // Sync User Interests
            $user->interests()->sync($validatedData['interests']);

            DB::commit();

            return redirect()->route('profile.index')->with('status', trans('messages.profile'));

        }  catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error',  trans('messages.error') )->withInput();
        }
    }

   /* Update Profile Image */
    public function updateProfileImage(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        try {
            // Get Current User
            $user = auth()->user();

            // Handle the uploaded file
            if ($request->hasFile('image')) {
                $currentImage = $user->image()->first(); // Get the current image record

                $imagePath = $this->updateImage($request, 'image', 'uploads', $currentImage ? $currentImage->path : null);

                $user->image()->updateOrCreate(
                    ['imageable_id' => $user->id, 'imageable_type' => User::class],
                    ['path' => $imagePath]
                );
            }

            return redirect()->route('profile.index')->with('status', trans('messages.profile'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('messages.error'))->withInput();
        }
    }

    public function updateLocation(Request $request){
            $validatedData = $request->validate([
                'country' => 'required|integer',
                'state' => 'required|integer',
                'city' => 'required|integer',
            ]);

            $user = Auth::user();
            $user->details()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'country' => $validatedData['country'],
                    'state' => $validatedData['state'],
                    'city' => $validatedData['city'],
                ]
            );

            return redirect()->route('profile.index')->with('status', 'Location updated successfully.');
}

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
