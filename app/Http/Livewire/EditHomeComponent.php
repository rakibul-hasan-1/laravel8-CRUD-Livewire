<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class EditHomeComponent extends Component
{
    public $student_id,$fname,$lname,$email,$phone,$address;

    public function mount($student_id){
        $this->student_id=$student_id;
        $student=Student::where('id',$this->student_id)->first();
        $this->fname=$student->fname;
        $this->lname=$student->lname;
        $this->email=$student->email;
        $this->phone=$student->phone;
        $this->address=$student->address;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
    }

    public function updateStudent(){
        $this->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $student=Student::find($this->student_id);
        $student->fname=$this->fname;
        $student->lname=$this->lname;
        $student->email=$this->email;
        $student->phone=$this->phone;
        $student->address=$this->address;
        $student->save();
        session()->flash('message','Student has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.edit-home-component')->layout('layouts.base');
    }
}
