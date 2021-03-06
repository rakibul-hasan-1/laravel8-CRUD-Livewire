<div>
    <div class="container">
        <div class="row">
            <h1>Basic CRUD Operation</h1>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Students
                            </div>
                            <div class="col-md-6">
                                <a href="/" class="btn btn-primary pull-right">All Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="addStudent">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">First Name:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="First Name" wire:model="fname"/>
                                    @error('fname')
                                        <p class="text-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Last Name:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Last Name" wire:model="lname"/>
                                    @error('lname')
                                        <p class="text-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Email:</label>
                                <div class="col-md-4">
                                    <input type="email" class="form-control input-md" placeholder="Email" wire:model="email"/>
                                    @error('email')
                                        <p class="text-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Phone:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Phone" wire:model="phone"/>
                                    @error('phone')
                                        <p class="text-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Address:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Address" wire:model="address"/>
                                    @error('address')
                                        <p class="text-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Image:</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}" alt="img" width="120">
                                    @endif
                                    @error($image)
                                        <p class="alert alert-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Image Galary:</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control input-file" wire:model="images" multiple>
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                                        @endforeach
                                    @endif
                                    @error('images')
                                        <p class="alert alert-danger" role="text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
