<div>
    <div class="container">
        <div class="row">
            <h1>Basic CRUD Operation</h1>
            <div class="col-md-12">
                @if (Session::has('delete_message'))
                    <div class="alert  alert-success">{{Session::get('delete_message')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Students
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('add.home')}}" class="btn btn-primary pull-right">Add New Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-stripe">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                    <th>Image Galary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->fname}}</td>
                                    <td>{{$student->lname}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->address}}</td>
                                    <td><img src="{{asset('images/students')}}/{{$student->image}}" width="80"/></td>
                                    <td>
                                        @if ($student->images)
                                            @php
                                                $images=explode(',',$student->images)
                                            @endphp
                                            @foreach ($images as $image)
                                                <img src="{{asset('images/students')}}/{{$image}}" alt="" width="60"/>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('edit.home',['student_id'=>$student->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger" onclick="confirm('Are you sure, You want to delete this student ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteStudent({{$student->id}})">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
