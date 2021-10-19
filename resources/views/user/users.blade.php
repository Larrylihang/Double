<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User | List</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles/fonts for this template -->
    @include('admin.public.style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.public.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.public.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                            <button id="btn" style="float:right" class="btn btn-success btn-icon-split"
                                data-toggle="modal" data-target="#myModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Users</span>
                            </button>
                            <!--editModal-->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <label>Show <select name="dataTable_length" aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Salary</th>
                                            <th>Username</th>
                                            <th>Start date</th>
                                            <th>Update date</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $v )
                                        <tr>
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->email}}</td>
                                            <td>{{$v->salary}}</td>
                                            <td>{{$v->username}}</td>
                                            <td>{{$v->created_at}}</td>
                                            <td>{{$v->updated_at}}</td>
                                            <td>
                                                <a href="details?id={{$v->id}}" style="padding:5px" data-toggle="modal"
                                                    data-target="#detailsModal" aria-hidden="true"><i class="fa fa-bars"
                                                        aria-hidden="true"></i></a>
                                                <a href="/admin/user/{{$v->id}}" style="padding:5px" data-toggle="modal"
                                                    data-target="#editModal"><i class="fa fa-edit" aria-hidden="true"
                                                        style="padding:10px"></i></a>
                                                <a href="delet?id={{$v->id}}" style="padding:5px"><i
                                                        class=" delete fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$user->links()}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.public.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end of Logout Modal -->
    <!--addModal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="addModal modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--form start-->
                    @if(is_object($errors))
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{$error}}!
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-danger" role="alert">
                        {{$errors}}
                    </div>
                    @endif
                    <form class="user" method="POST" action="{{url('admin/user')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            Name: <input type="text" class="form-control form-control-user" id="name"
                                aria-describedby="emailHelp" placeholder="Name" name="username">
                        </div>
                        <div class="form-group">
                            Email: <input type="email" class="form-control form-control-user" id="email"
                                placeholder="Password" name="email" required="require">
                        </div>
                        <div class="form-group">
                            Username: <input type="text" class="form-control form-control-user" id="email"
                                placeholder="Username" name="name">
                        </div>
                        <div class="form-group">
                            Password: <input type="password" class="form-control form-control-user" id="email"
                                placeholder="Username" name="password">
                        </div>
                        <div class="form-group">
                            Salary: <input type="text" class="form-control form-control-user" id="salary" name="salary">
                        </div>
                        <div class="operationBtn">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="add" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end of addModal-->
    <!-- detailsModal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="addModal modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">User Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--form start-->
                    <p>Name: </p>
                    <p>Address: </p>
                    <p>Position: </p>
                    <p>Title: </p>
                    <p>Contact Number: </p>
                    <p>Date of Birth: </p>
                    <p>Gender: </p>
                </div>
            </div>i
        </div>
    </div>
    <!-- end of detailsModal -->
    <!-- editMoadl -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="addModal modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--form start-->
                    @if(is_object($errors))
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{$error}}!
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-danger" role="alert">
                        {{$errors}}
                    </div>
                    @endif
                    <form class="user" method="POST" action="{{url('admin/user/{user}')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            Name: <input type="text" class="form-control form-control-user" id="name"
                                aria-describedby="emailHelp" placeholder="Name" name="username" value="{{$v->name}}">
                        </div>
                        <div class="form-group">
                            Email: <input type="email" class="form-control form-control-user" id="email"
                                placeholder="Password" name="email" required="require">
                        </div>
                        <div class="form-group">
                            Username: <input type="text" class="form-control form-control-user" id="email"
                                placeholder="Username" name="name">
                        </div>
                        <div class="form-group">
                            Password: <input type="password" class="form-control form-control-user" id="email"
                                placeholder="Username" name="password">
                        </div>
                        <div class="form-group">
                            Salary: <input type="text" class="form-control form-control-user" id="salary" name="salary">
                        </div>
                        <div class="operationBtn">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="add" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of editModal -->


    <!-- Bootstrap core JavaScript-->
    @include('admin.public.script')

</body>

</html>