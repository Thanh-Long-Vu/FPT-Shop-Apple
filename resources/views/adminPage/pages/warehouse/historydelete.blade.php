@extends('adminPage.index')
@section('scriptHeader')
<link rel="stylesheet" href="admin/css/feather.css">
<link rel="stylesheet" href="admin/css/dataTables.bootstrap4.css">
<script src="admin/js/jquery-ajax.min.js"></script>
<link rel="stylesheet" href="admin/css/switchery.min.css">
<script src="admin/js/switchery.min.js"></script>
<link rel="stylesheet" href="admin/css/toastr.min.css">
<script src="admin/js/toastr.min.js"></script>
@endsection
@section('title', 'History Delete Warehouse')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data WareHouse Deleted</h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    @if(Session::get('notify') == 'success')
                                    <div class="alert alert-success" role="alert">
                                        <span class="fe fe-help-circle fe-16 mr-2"></span> {{Session::get('massage')}} 
                                    </div>
                                    @endif 
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Data</th>
                                                <th>IMEI</th>
                                                <th>Color</th>
                                                <th>Memory</th>
                                                <th>Price</th>
                                                <th>Warranty</th>
                                                <th>Quantity</th>
                                                <th>Activate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($viewWareHouse as $listWareHouse)
                                            <tr>
                                                <td>{{$listWareHouse->id_warehouse}}</td>
                                                <td>{{$listWareHouse->name}}</td>
                                                <td>{{$listWareHouse->data}}</td>
                                                <td>{{$listWareHouse->IMEI}}</td>
                                                <td>
                                                    @if($listWareHouse->color == 0)
                                                    Red
                                                    @elseif($listWareHouse->color == 1)
                                                    Yellow
                                                    @elseif($listWareHouse->color == 2)
                                                    Violet
                                                    @elseif($listWareHouse->color == 3)
                                                    Violet
                                                    @elseif($listWareHouse->color == 4)
                                                    Black
                                                    @elseif($listWareHouse->color == 5)
                                                    White
                                                    @elseif($listWareHouse->color == 6)
                                                    Other
                                                    @elseif($listWareHouse->color == 7)
                                                    Patific
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($listWareHouse->memory == 0)
                                                    16GB
                                                    @elseif($listWareHouse->memory == 1)
                                                    32GB
                                                    @elseif($listWareHouse->memory == 2)
                                                    64GB
                                                    @elseif($listWareHouse->memory == 3)
                                                    128GB
                                                    @elseif($listWareHouse->memory == 4)
                                                    256GB
                                                    @elseif($listWareHouse->memory == 5)
                                                    512Gb
                                                    @endif
                                                </td>
                                                <td>{{$listWareHouse->price}}.VNĐ</td>
                                                <td>{{$listWareHouse->warranty}}</td>
                                                <td>{{$listWareHouse->quantity}}.Cái</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="active" class="custom-control-input" {{ $listWareHouse->active == 1 ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customCheck1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('restoreWareHouse',['id' => $listWareHouse->id_warehouse])}}" class="btn mb-2 btn-outline-warning">Restore</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>
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
    <script src='admin/js/jquery.dataTables.min.js'></script>
    <script src='admin/js/dataTables.bootstrap4.min.js'></script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });

    </script>
    <script src="admin/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');

    </script>
@endsection
