<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\DiscussionMessage;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user()->load('organization'); // eager load relasi

        $recentMessages = DiscussionMessage::with('discussion')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $posts = Post::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('profile.edit', compact('user', 'recentMessages', 'posts'));
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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
    public function show()
    {
        $user = Auth::user();

        // Ambil 5 pesan terakhir user dalam diskusi (dengan relasi diskusi)
        $recentMessages = DiscussionMessage::with('discussion')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Ambil 5 postingan terbaru user (jika ada tabel posts)
        $posts = Post::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('profile.show', compact('user', 'recentMessages', 'posts'));
    }

}
