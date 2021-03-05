<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('books')->get()->all();

        return view('reservations', collect(['reservations' => $reservations]));
    }

    public function update(Request $request)
    {
        try {
            $reservation = Reservation::find($request->reservation);
            $reservation->transition($request->transaction);
            $msg = $reservation->save();

            return redirect()->back();
        } catch (LaraflowValidatorException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
}
