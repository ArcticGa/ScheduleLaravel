<?php

namespace App\Http\Controllers;

use App\Models\Caller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallerController extends Controller
{
    public function callersView() {
        $callers = Caller::all();
        return view('user.callers', compact('callers'));
    }

    public function callersPost(Request $request) {
        if (Auth::guest() || Auth::user()->role_id !== 1) {
            return back()->withErrors([
                'err' => 'Не лезь куда не просят...'
            ]);
        } else {
            Caller::where('id', $request->id)->update(['time' => $request->time]);
            return back();
        }
    }
}
