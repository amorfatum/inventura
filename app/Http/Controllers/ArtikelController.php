<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Artikel;

class ArtikelController extends Controller
{

    /**
     * Delete the user's account.
     */
    public function index(Request $request)
    {
        return Inertia::render(
            'Artikel/Index',
            [
                'artikel' => Artikel::query()
                    ->when(Request::input('search'), function ($query, $search) {
                        $query->where('id', 'like', $search);
                    })->paginate(8)
                    ->withQueryString(),
            ]
        );
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
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

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Delete the user's account.
     */
    public function show(Request $request)
    {
        return Inertia::render(
            'Artikel/Show',
            [
                'artikel' => Artikel::query()
                    ->when(Request::input('artikelId'), function ($query, $search) {
                        $query->where('artikelId', 'like', '%' . $search . '%');
                    })->paginate(8)
                    ->withQueryString(),
            ]
        );
    }
}
