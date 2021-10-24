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
        if($student->images){
            $images=explode(',',$student->images);
            foreach($images as $image){
                if($image){
                unlink('images/students'.'/'.$image);
                }
            }
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
