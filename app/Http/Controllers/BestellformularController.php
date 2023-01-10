<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Bestellformular;

class BestellformularController extends Controller
{
   /**
     * Delete the user's account.
     */
    public function index(Request $request)
    {
        return Inertia::render('Bestellformular/Index', [
            'bestellform' => Bestellformular::all(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function store(Request $request)
    {

        $bestellformular = Bestellformular::create([
            'artikelId' => $request->artikelId,
            'lieferantenId' => $request->lieferantenId,
            'anzahl' => $request->anzahl,
        ]);

        return Redirect::route('bestellformular.index');
    }

}
