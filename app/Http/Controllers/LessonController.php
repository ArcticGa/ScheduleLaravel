<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabinet;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function delLessons($date, $group_id) {
        $query = DB::table('lessons')->where('date', '=', $date)->where('group_id', '=', $group_id);
        $query->delete();
        return redirect()->route('main', ['date' =>  $date, 'group_id' => 'all']);
    }

    public function updLessons($group_id) {
        $groupa = Group::find($group_id);
        $groups = Group::all();
        $subjects = Subject::all();
        $teachers = User::where('role_id', 2)->get();
        $cabinets = Cabinet::all();

        if (Lesson::where('group_id', $group_id)->count() > 0) {
            return view('user.teacher.update', compact(['groupa', 'groups', 'subjects', 'teachers', 'cabinets']));
        }
        else {
            return redirect()->route('account', ['group_id' => $group_id]);
        }

    }

    public function updLessonsPost(Request $request, $group_id)
    {
        $date = $request->input('date');
        for ($i = 0; $i < 7; $i++) {
            $data = [
                'date' => $date,
                'number_id' => $i + 1,
                'group_id' => $group_id,
                'subject_id' => $request->input('subject_id_' . $i),
                'user_id' => $request->input('user_id_' . $i),
                'cabinet_id' => $request->input('cabinet_id_' . $i)
            ];
            $query = DB::table('lessons')->where('number_id',  '=',  $i + 1)->where('group_id', '=', $group_id);
            $query->update($data);
        }
        return redirect()->route('main', ['date' => $date, 'group_id' => 'all']);
    }
}
