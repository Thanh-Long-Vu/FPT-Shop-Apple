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
@section('title', 'List Warehouse')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data table WareHouse</h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                    @endif
                                    <a href="{{route('warehouse.create')}}" class="btn btn-primary float-right ml-3" type="button">Create Warehouse</a>
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
                                            @foreach ($listWareHouses as $listWareHouse)
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
                                                    Green
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
                                                    <input type="checkbox" data-id="{{ $listWareHouse->id_warehouse }}" name="active" class="js-switch" {{ $listWareHouse->active == 1 ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{route('createProduct',['id'=>$listWareHouse->id_warehouse])}}">Create</a>
                                                        <a class="dropdown-item" href="{{route('warehouse.edit',['id'=>$listWareHouse->id_warehouse])}}">Edit</a>
                                                        <a class="dropdown-item" href=" {{route('softDeleteWareHouse', ['id' => $listWareHouse->id_warehouse])}}">Remove</a>  
                                                    </div>
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
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });
        $(document).ready(function() {
            $('.js-switch').change(function() {
                let active = $(this).prop('checked') === true ? 1 : 0;
                let id_wareHouse = $(this).data('id');
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '{{ route('updateStatusWareHouse') }}',
                    data: {
                        'active': active,
                        'warehouse_id': id_wareHouse
                    },
                    success: function(data) {         
                        toastr.options.closeButton = 1;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });
        });
    </script>
@endsection
