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
        $user = $request->user();
        $imageUrl = Storage::disk('local')->url('/public/profile_pictures/' . $user->profile_picture);

        return view('profile.edit', compact('imageUrl', 'user'));
    }

    /**
     * Update the user's profile information.
     */

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Fill the user model with the validated request data
        $request->user()->fill($request->validated());

        // Check if the email is updated, and nullify email_verified_at if it is
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('profile_picture')) {

            $image = $request->file('profile_picture');

            // Delete old profile picture if it exists
            if ($request->user()->profile_picture) {
                Storage::delete('public/profile_pictures/' . $request->user()->profile_picture);
            }

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName);

            // Update the user's profile picture field in the database
            $request->user()->profile_picture = $imageName;
        }

        // Save the updated user data
        $request->user()->save();

        // Return the user to the profile edit page with a success message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
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
