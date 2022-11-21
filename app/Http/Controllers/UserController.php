<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mainView($date, $group_id)
    {
        $string = "dafgadfhdfgdf342rasdfgdfa";

        $filteredNumbers = array_filter(preg_split("/\D+/", $string));
        $firstOccurence = reset($filteredNumbers);
        $number = $firstOccurence[0];

        if($group_id != 'all') {
            $lessons = Lesson::where('group_id', $group_id)->get();
            $groups = Group::where('id', $group_id)->get();
            return view('main', compact(['lessons', 'groups', 'date', 'group_id']));
        }

        $lessons = Lesson::all();
        $groups = Group::all();

        return view('main', compact(['lessons', 'groups', 'date', 'group_id']));
    }
    public function mainPost(Request $request) {
        $date = $request->input('date');
        $group_id = $request->input('group_id');

        return redirect()->route('main', ['date' => $date, 'group_id' => $group_id]);
    }


    public function authView()
    {
        return view('user.auth');
    }
    public function authPost(Request $request)
    {
        $date = Carbon::now()->toDateString();
        $request -> validate([
            'login'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt($request->only('login', 'password'))){
            $request->session()->regenerate();
            return redirect()->route('main', ['date' => $date, 'group_id' => 'all']);
        }

        return back()->withErrors([
            'error'=>'Неверный логин или пароль'
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth');
    }
}
