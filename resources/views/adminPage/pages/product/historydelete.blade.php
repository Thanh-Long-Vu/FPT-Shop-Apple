@extends('adminPage.index')
@section('scriptHeader')
<link rel="stylesheet" href="admin/css/feather.css">
<link rel="stylesheet" href="admin/css/dataTables.bootstrap4.css">
@endsection
@section('title', 'History Category')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data History Product</h2>
                    {{-- <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible
                        tool, built upon the foundations of progressive enhancement, that adds all of these advanced
                        features to any HTML table. </p> --}}
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($view as $dataitem)
                                            <tr>
                                                <td>{{$dataitem->id_product}}</td>
                                                <td><img src="{{asset($dataitem->thumbnail)}}" width="50%" alt=""></td>
                                                <td>
                                                    @if($dataitem->color == 0)
                                                    Red
                                                    @elseif($dataitem->color == 1)
                                                    Yellow
                                                    @elseif($dataitem->color == 2)
                                                    Violet
                                                    @elseif($dataitem->color == 3)
                                                    Violet
                                                    @elseif($dataitem->color == 4)
                                                    Black
                                                    @elseif($dataitem->color == 5)
                                                    White
                                                    @elseif($dataitem->color == 6)
                                                    Other
                                                    @elseif($dataitem->color == 7)
                                                    Patific
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($dataitem->memory == 0)
                                                    16GB
                                                    @elseif($dataitem->memory == 1)
                                                    32GB
                                                    @elseif($dataitem->memory == 2)
                                                    64GB
                                                    @elseif($dataitem->memory == 3)
                                                    128GB
                                                    @elseif($dataitem->memory == 4)
                                                    256GB
                                                    @elseif($dataitem->memory == 5)
                                                    512Gb
                                                    @endif
                                                </td>
                                                <td>{{$dataitem->quantity}} Month</td>
                                                <td>{{$dataitem->discount}} . %</td>
                                                <td>{{$dataitem->producttype->name}}</td>
                                                <td>{{$dataitem->warehouse->warranty}} %</td>
                                                <td>{{$dataitem->price}}.VNĐ</td>
                                                <td>
                                                    <a href="{{route('restoreProduct',['id' => $dataitem->id_product])}}" class="btn mb-2 btn-outline-warning">Restore</a>
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
