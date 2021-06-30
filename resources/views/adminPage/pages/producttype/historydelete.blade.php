@extends('adminPage.index')
@section('scriptHeader')
<link rel="stylesheet" href="admin/css/feather.css">
<link rel="stylesheet" href="admin/css/dataTables.bootstrap4.css">
@endsection
@section('title', 'History Product Type')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data History Product Type</h2>
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
                                                <th>Thumbnail</th>
                                                <th>Description</th>
                                                {{-- <th>Data</th> --}}
                                                <th>Total Number</th>
                                                <th>Total Rating</th>
                                                <th>Warranty</th>
                                                <th>Category</th>
                                                <th>is_Hot</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($view as $itemproductType)
                                                <tr>
                                                    <td>{{ $itemproductType->id_product_type }}</td>
                                                    <td>{{ $itemproductType->name }}</td>
                                                    <td><img src="{{ asset($itemproductType->thumbnail) }}"
                                                            alt="productType" width="50%"></td>
                                                    <td>{{ $itemproductType->description }}</td>
                                                    {{-- <td>{{$itemproductType->data}}</td> --}}
                                                    <td>{{ $itemproductType->total_number }}NbComment</td>
                                                    <td>{{ $itemproductType->total_rating }}Rating</td>
                                                    <td>{{ $itemproductType->warranty }}.Tháng</td>
                                                    <td>{{ $itemproductType->category->name }}</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="active" class="custom-control-input" {{ $itemproductType->active == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                        </div>                                                
                                                    </td>
                                                    <td>
                                                        <a href="{{route('restoreProductType',['id' => $itemproductType->id_product_type])}}" class="btn mb-2 btn-outline-warning">Restore</a>
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
