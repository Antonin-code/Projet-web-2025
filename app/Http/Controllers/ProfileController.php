<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller

{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        // update the password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // update picture
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists($user->photo)) {   //Destroy picture if existing
                Storage::delete($user->photo);
            }

            // save new picture
            $user->photo = $request->file('photo')->store('profile_photos');
        }

        // save modifs
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }


    //Function to delete user by himself
public function destroy()
{
    $user = Auth::user();

    // delete picture if already exist
    if ($user->photo && Storage::exists($user->photo)) {
        Storage::delete($user->photo);
    }


    $user->delete();

    // after delete logout
    Auth::logout();

}}
