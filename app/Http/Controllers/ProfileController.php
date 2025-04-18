<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    //Fonction to update email and password of profile (here password dont work)
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //pass == empty tab
        $pass = [];
        $user = $request->user();

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->user()->isDirty('password')) {
            $request->user()->email_verified_at = null;
        }

        //password validation
        if ($request->filled('password') || $request->filled('current_password') ||  $request->filled('password_confirmation')) {
        $pass['current_password'] = ['required', 'current_password']; // Validate that the current password field is filled in and that it matches the authenticated user's actual current password
            $pass['password'] = ['required', 'string', 'confirmed'];// Validate that the new password is required, is a string, and matches the password confirmation field (usually named 'password_confirmation')

    }

        // Update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $user = $request->user();

        Auth::logout();

        $user->delete(); //deleting user here

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

   //function to update the profile photo (Dont work here)
    public function updatePP(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_picture')) {
            // delete old picture if already existing
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // stock the new photo
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save(); //save modifications
        }

        return Redirect::route('profile.edit')->with('status', 'profile-picture-updated');
    }


}
