<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddHomeComponent extends Component
{
    use WithFileUploads;
    public $fname,$lname,$email,$phone,$address,$image;

    public function updated($fields){
        $this->validateOnly($fields,[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);
    }

    public function addStudent(){
        $this->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);
        $student=new Student();
        $student->fname=$this->fname;
        $student->lname=$this->lname;
        $student->email=$this->email;
        $student->phone=$this->phone;
        $student->address=$this->address;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('students',$imageName);
        $student->image=$imageName;
        $student->save();
        session()->flash('message','Student has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.add-home-component')->layout('layouts.base');
    }
}
