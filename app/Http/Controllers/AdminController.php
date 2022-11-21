<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Group;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class AdminController extends Controller
{
    public function adminView()
    {
        $roles = Role::all();
        $groups = Group::all();
        return view('user.admin.account', compact(['roles', 'groups']));
    }

    public function adminInfoView()
    {
        $cabinets = Cabinet::all();
        $teachers = User::where('role_id', 2)->get();
        $students = User::where('role_id', 3)->get();
        $groups = Group::all();
        $subjects = Subject::all();
        return view('user.admin.info', compact(['cabinets', 'teachers', 'students', 'subjects', 'groups']));
    }

    public function adminInfoPost(Request $request) {

        if($request->subject_name != null) {
            Subject::where('id', $request->id)->update(['name' => $request -> subject_name]);
        }
        if ($request->cabinet_name != null) {
            Cabinet::where('id', $request->id)->update(['name' => $request -> cabinet_name]);
        }
        if($request->user_name != null) {
            User::where('id', $request->id)->update(['name' => $request -> user_name]);
        }
        if($request->group_name != null) {
            Group::where('id', $request->id)->update(['name' => $request -> group_name]);
        }

        return back();
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'login' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $role = $request->input('role_id');
        $grouper = $request->input('group_id');

        if ($role == 3 && $grouper == '-') {
            return back()->withErrors([
               'errGroup' => 'Не указана группа для пользователя'
            ]);
        }

        if($role != 3) {
            $grouper = null;
        }

        $request->merge(['password' => Hash::make($request->password), 'group_id' => $grouper]);


        User::create($request->all());
        return back();
    }


//    Удаление Юзеров для Админа
    public function deleteUserView(User $user_id)
    {
        return view('confirm.userDelete', compact('user_id'));
    }
    public function deleteUserPost(User $user_id) {
        $user_id->delete();
        return redirect()->route('adminInfo');
    }

//Удаление предмета
    public function delSubject(Subject $subject_id) {
        $subject_id->delete();
        return redirect()->route('adminInfo');
    }


    public function deleteCabinet($cabinet_id)
    {
        Cabinet::where('id', $cabinet_id)->delete();
        return redirect()->route('adminInfo');
    }

    public function addSubject(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30'
        ]);
        Subject::create($request->all());
        return back();
    }

    public function addCabinet(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30'
        ]);
        Cabinet::create($request->all());
        return back();
    }

    public function addGroup(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30'
        ]);

        Group::create($request->all());
        return back();
    }
    public function delGroup(Group $group_id) {
        $group_id->delete();
        return redirect()->route('adminInfo');
    }
}
