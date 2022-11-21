<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function accountView($group_id)
    {
        $lessons = Lesson::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $teachers = User::where('role_id', 2)->get();
        $cabinets = Cabinet::all();
        $groupa = Group::find($group_id);

        return view('user.teacher.account', compact(['groups', 'subjects', 'teachers', 'cabinets', 'lessons', 'groupa']));
    }

    public function createSchedule(Request $request, $group_id = 0)
    {
        $date = $request->input('date');
        if (Lesson::where('group_id', $group_id)->count() > 0 && Lesson::where('date', $date)->count()>0) {
            return back()->withErrors([
                'err' => 'Пары для этой группы уже созданы.'
            ]);
        }

        for ($i = 0; $i<7; $i++){
            $data = [
                'date' => $request->input('date'),
                'number_id' => $i + 1,
                'group_id' =>$group_id,
                'subject_id' =>$request->input('subject_id_'.$i),
                'user_id' => $request->input('user_id_'.$i),
                'cabinet_id' =>$request->input('cabinet_id_'.$i)
            ];
            Lesson::create($data);
        }

        return redirect()->route('main', ['date' => $date, 'group_id' => 'all']);
    }

    public function listView() {
        $teachers = User::where('role_id', 2)->get();
        return view('listTeachers', compact('teachers'));
    }
}
