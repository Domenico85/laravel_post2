<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profiles.show', compact('user'));
    }

    public function edit()
    {
        $profile = Auth::user()->profile ?? Auth::user()->profile()->create(); 
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request)
{
    $request->validate([
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ]);

    $user = Auth::user(); 
    $profile = $user->profile; 


    $profile->address = $request->input('address', $profile->address); 
    $profile->phone = $request->input('phone', $profile->phone); 

    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public'); 
        $profile->avatar = $avatarPath;
    }

    $profile->save(); 

    return redirect()->route('profiles.show')->with('success', 'Profile updated successfully!');
}

}
