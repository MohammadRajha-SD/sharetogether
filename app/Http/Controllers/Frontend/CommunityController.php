<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('community.index', compact('communities'));
    }

    public function joinCommunity(Request $request, $id)
    {
        $community = Community::findOrFail($id);
        $user = auth()->user();

        // Attach the user to the community if not already a member
        if (!$user->communities->contains($community->id)) {
            $user->communities()->attach($community->id);
        }

        // Redirect to the chat
        return redirect()->route('community.chat', ['id' => $community->id]);
    }

    public function chat($id)
    {
        $community = Community::findOrFail($id);

        // Load chat messages here for the selected community
        return view('community.chat', compact('community'));
    }
}
