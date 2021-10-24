<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditHomeComponent extends Component
{
    use WithFileUploads;
    public $student_id,$fname,$lname,$email,$phone,$address,$newimage,$image,$images,$newimages;

    public function mount($student_id){
        $this->student_id=$student_id;
        $student=Student::where('id',$this->student_id)->first();
        $this->fname=$student->fname;
        $this->lname=$student->lname;
        $this->email=$student->email;
        $this->phone=$student->phone;
        $this->address=$student->address;
        $this->image=$student->image;
        $this->images=$student->images;
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
        if($this->newimage){
            unlink('images/students'.'/'.$student->image);
            $imageName=Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('students',$imageName);
            $student->image=$imageName;
        }
        if($this->newimages){
            if($this->images){
                $images=explode(',',$this->images);
                foreach($images as $image){
                    if($image){
                        unlink('images/students'.'/'.$image);
                    }
                }
            }
            $imagesname="";
            foreach($this->newimages as $key=>$images){
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
        return view('livewire.edit-home-component')->layout('layouts.base');
    }
}
