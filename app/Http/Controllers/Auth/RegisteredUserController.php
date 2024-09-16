<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Country;
use App\Models\Occupation;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
// use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $countries = Country::all();
        $occupations = Occupation::all();
        $categories = config('categories.categories');

        return view('auth.register', compact('occupations', 'countries', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'name' => 'required|string|max:255',
            'username' => 'required|string|email|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string||unique:users,phone',
            'occupation' => 'required|integer|exists:occupations,id',
            'interests' => 'required|array',
            'interests.*' => 'integer|exists:categories,id',
            'country' => 'required|integer',
            'city' => 'required|integer',
            'state' => 'required|integer',
        ]);
        try {
            // Create User
            $user = User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Create User Detail
            UserDetail::create([
                'user_id' => $user->id,
                'occupation_id' => $validatedData['occupation'],
                'country_id' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => $validatedData['city'],
                'longitude' => $validatedData['longitude'],
                'latitude' => $validatedData['latitude'],
            ]);

            // Attach User Interests
            $user->interests()->attach($validatedData['interests']);

            // event(new Registered($user));
            Auth::login($user);
            DB::commit();

            return redirect()->route('home')->with('status', trans('messages.register'));

        }  catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', trans('messages.error'))->withInput();
        }
    }
}
