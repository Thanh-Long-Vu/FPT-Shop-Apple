@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
@endsection
@section('title', 'Edit User')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Update User</h2>
                    <div class="my-4">
                        <form>
                            <div class="row mt-5 align-items-center">
                                <div class="col-md-3 text-center mb-5">
                                    <div class="avatar avatar-xl">
                                        <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <h4 class="mb-1">Brown, Asher</h4>
                                            <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-7">
                                            <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac
                                                habitasse platea dictumst. Cras urna quam, malesuada vitae risus at, pretium
                                                blandit sapien. </p>
                                        </div>
                                        <div class="col">
                                            <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                                            <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                                            <p class="small mb-0 text-muted">(537) 315-1481</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Name</label>
                                    <input type="text" id="firstname" class="form-control" placeholder="Brown">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="numberphone">Phone</label>
                                    <input type="text" id="numberphone" class="form-control" placeholder="092959595">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="brown@asher.me">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress5">Address</label>
                                <input type="text" class="form-control" id="inputAddress5"
                                    placeholder="P.O. Box 464, 5975 Eget Avenue">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState5">Role</label>
                                    <select id="inputState5" class="form-control">
                                        <option selected="selected">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customFile">Avatar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Old Password</label>
                                        <input type="password" class="form-control" id="inputPassword5">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword5">New Password</label>
                                        <input type="password" class="form-control" id="inputPassword5">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword6">Confirm Password</label>
                                        <input type="password" class="form-control" id="inputPassword6">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">Password requirements</p>
                                    <p class="small text-muted mb-2"> To create a new password, you have to meet all of the
                                        following requirements: </p>
                                    <ul class="small text-muted pl-4 mb-0">
                                        <li> Minimum 8 character </li>
                                        <li>At least one special character</li>
                                        <li>At least one number</li>
                                        <li>Can’t be the same as a previous password </li>
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update User</button>
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
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');

    </script>
@endsection
