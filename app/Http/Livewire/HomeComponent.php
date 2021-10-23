<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class HomeComponent extends Component
{
    public function deleteStudent($id){
        $student=Student::find($id);
        if($student->image){
            unlink('images/students'.'/'.$student->image);
        }
        $student->delete();
        session()->flash('delete_message','Student Deleted Successfully!');
    }
    public function render()
    {
        $students=Student::all();
        return view('livewire.home-component',['students'=>$students])->layout('layouts.base');
    }
}
