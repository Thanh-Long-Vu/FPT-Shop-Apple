@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
@endsection
@section('title', 'Create User')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Add User</h2>
                    <div class="my-4">
                        <form class="needs-validation" action="{{route('home.user.store')}}" novalidate method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <hr class="my-4">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control" required>
                                        @foreach ($role as $item)
                                         <option value="{{$item->id_role}}">{{$item->name_role}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newpassword">New Password</label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword">
                                        @if ($errors->has('newpassword'))
                                            <div class="alert alert-danger">
                                                <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                                {{ $errors->first('newpassword') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                                        @if ($errors->has('confirmpassword'))
                                            <div class="alert alert-danger">
                                                <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                                {{ $errors->first('confirmpassword') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">Password requirements</p>
                                    <p class="small text-muted mb-2"> To create a new password, you have to meet all of the
                                        following
                                        requirements: </p>
                                    <ul class="small text-muted pl-4 mb-0">
                                        <li> Minimum 8 character </li>
                                        <li>At least one special character</li>
                                        <li>At least one number</li>
                                        <li>Can’t be the same as a previous password </li>
                                    </ul>
                                </div>
                            </div>
                            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign up">
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection
@section('script')
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/popper.min.js"></script>
    <script src="admin/js/moment.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/simplebar.min.js"></script>
    <script src='admin/js/daterangepicker.js'></script>
    <script src='admin/js/jquery.stickOnScroll.js'></script>
    <script src="admin/js/tinycolor-min.js"></script>
    <script src="admin/js/config.js"></script>
    <script src="admin/js/apps.js"></script>
@endsection
