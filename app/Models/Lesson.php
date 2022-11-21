<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
      'date',
        'number_id',
      'group_id',
      'subject_id',
      'user_id',
      'cabinet_id'
    ];

    public function groupName()
    {
        try {
            return $this->hasOne(Group::class, 'id', 'group_id')->first()->name;
        } catch (Exception $e){
            return '-';
         }
    }

    public function subjectName()
    {
        try {
            return $this->hasOne(Subject::class, 'id', 'subject_id')->first()->name;
        } catch (Exception $e){
            return '-';
        }
    }

    public function teacherName()
    {
        try {
            return $this->hasOne(User::class, 'id', 'user_id')->first()->name;
        } catch (Exception $e){
            return '-';
        }
    }

    public function cabinetName()
    {
        try {
            return $this->hasOne(Cabinet::class, 'id', 'cabinet_id')->first()->name;
        } catch (Exception $e){
            return '-';
        }
    }
}
