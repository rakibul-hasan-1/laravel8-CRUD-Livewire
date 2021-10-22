<div>
    <div class="container">
        <div class="row">
            <h1>Basic CRUD Operation</h1>
            <div class="col-md-12">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Rakibul</td>
                                    <td>Hasan</td>
                                    <td>rakibulhasan@gmail.com</td>
                                    <td>01756255989</td>
                                    <td>Adabor-10, Mohammadpur, Dhaka, bangladesh</td>
                                    <td>
                                        <a href="{{route('edit.home')}}" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
