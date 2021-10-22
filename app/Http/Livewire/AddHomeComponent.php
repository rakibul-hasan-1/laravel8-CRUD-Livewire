<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class AddHomeComponent extends Component
{
    public $fname,$lname,$email,$phone,$address;

    public function updated($fields){
        $this->validateOnly($fields,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
    }

    public function addStudent(){
        $this->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $student=new Student();
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
        return view('livewire.add-home-component')->layout('layouts.base');
    }
}
