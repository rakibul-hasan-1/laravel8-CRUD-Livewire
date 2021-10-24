<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddHomeComponent extends Component
{
    use WithFileUploads;
    public $fname,$lname,$email,$phone,$address,$image,$images;

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

        if($this->images){
            $imagesname="";
            foreach($this->images as $key=>$images){
                $imgsName=Carbon::now()->timestamp.$key.'.'.$images->extension();
                $images->storeAs('students',$imgsName);
                $imagesname=$imagesname.','.$imgsName;
            }
            $student->images=$imagesname;
        }
        $student->save();
        session()->flash('message','Student has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.add-home-component')->layout('layouts.base');
    }
}
