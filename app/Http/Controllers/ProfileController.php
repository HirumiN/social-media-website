<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return Inertia::render('Profile/View', [
            'mustVerifyEmail' => $user instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => new UserResource($user)
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateCover(Request $request, User $user)
{
    Log::info('Update cover image request received.', ['user_id' => $user->id]);

    $request->validate([
        'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Hapus cover lama jika ada
    if ($user->cover_path) {
        Storage::delete($user->cover_path);
        Log::info('Old cover image deleted.', ['path' => $user->cover_path]);
    }

    // Simpan cover baru
    $coverPath = $request->file('cover')->store('user/cover', 'public');
    Log::info('New cover image uploaded.', ['path' => $coverPath]);

    // Update data user
    $user->cover_path = $coverPath;
    $user->save();

    Log::info('User cover updated successfully.', ['user_id' => $user->id, 'cover_path' => $coverPath]);

    return back()->with([
        'flash' => ['success' => 'Cover image updated successfully!'],
        'user' => $user,
    ]);
}


}
