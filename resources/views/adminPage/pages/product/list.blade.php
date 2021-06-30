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
@section('title', 'List Product')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data table Product</h2>
                    {{-- <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible
                        tool, built upon the foundations of progressive enhancement, that adds all of these advanced
                        features to any HTML table. </p> --}}
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
                                    <a href="{{ route('createImageProduct') }}"class="btn btn-primary float-right ml-3">Add Image</a>
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Thumbnail</th>
                                                <th>Color</th>
                                                <th>Memory</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Product Types</th>
                                                <th>Warranty</th>
                                                <th>Price</th>
                                                <th>is_Hot</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dataitem)
                                            <tr>
                                                <td class = "text-center">{{$dataitem->id_product}}</td>
                                                <td class = "text-center"><img src="{{asset($dataitem->thumbnail)}}" class="w-25 h-auto" alt=""></td>
                                                <td class = "text-center">
                                                    @if($dataitem->warehouse->color == 0 ?? 0)
                                                    Red
                                                    @elseif($dataitem->warehouse->color == 1 ?? 0)
                                                    Yellow
                                                    @elseif($dataitem->warehouse->color == 2 ?? 0)
                                                    Violet
                                                    @elseif($dataitem->warehouse->color == 3 ?? 0)
                                                    Violet
                                                    @elseif($dataitem->warehouse->color == 4 ?? 0)
                                                    Black
                                                    @elseif($dataitem->warehouse->color == 5 ?? 0)
                                                    White
                                                    @elseif($dataitem->warehouse->color == 6 ?? 0)
                                                    Other
                                                    @elseif($dataitem->warehouse->color == 7 ?? 0)
                                                    Patific
                                                    @endif
                                                </td>
                                                <td class = "text-center">
                                                    @if($dataitem->warehouse->memory == 0 ?? 0)
                                                    16GB
                                                    @elseif($dataitem->warehouse->memory == 1 ?? 0)
                                                    32GB
                                                    @elseif($dataitem->warehouse->memory == 2 ?? 0)
                                                    64GB
                                                    @elseif($dataitem->warehouse->memory == 3 ?? 0)
                                                    128GB
                                                    @elseif($dataitem->warehouse->memory == 4 ?? 0)
                                                    256GB
                                                    @elseif($dataitem->warehouse->memory == 5 ?? 0)
                                                    512Gb
                                                    @endif
                                                </td>
                                                <td class = "text-center">{{$dataitem->warehouse->quantity ?? 0}}</td>
                                                <td class = "text-center">{{$dataitem->discount ?? 0}}  %</td>
                                                <td class = "text-center">{{$dataitem->producttype->name ?? 0}}</td>
                                                <td class = "text-center">{{$dataitem->warehouse->warranty ?? 0}}.Month</td>
                                                <td class = "text-center">{{$dataitem->price ?? 0}}.VNĐ</td>
                                                <td class = "text-center">
                                                    <input type="checkbox" data-id="{{ $dataitem->id_product }}" name="is_hot" class="js-switch" {{ $dataitem->is_hot == 1 ? 'checked' : '' }}>
                                                </td>
                                                <td class = "text-center">
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{route('editProduct',['id'=>$dataitem->id_product])}}">Edit</a>
                                                        <a class="dropdown-item" href=" {{route('softDeleteProduct', ['id' => $dataitem->id_product])}}">Remove</a>  
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
                let is_hot = $(this).prop('checked') === true ? 1 : 0;
                let productId = $(this).data('id');
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '{{ route('updateStatusProduct') }}',
                    data: {
                        'is_hot': is_hot,
                        'product_id': productId
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
