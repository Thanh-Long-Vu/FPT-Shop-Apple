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
@section('title', 'List Product Type')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data table Product Type</h2>
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
                                    <a href="{{ route('createProductType') }}"class="btn btn-primary float-right ml-3">Create Product Type</a>
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Thumbnail</th>
                                                <th>Description</th>
                                                <th>Total Number</th>
                                                <th>Total Rating</th>
                                                <th>Warranty</th>
                                                <th>Category</th>
                                                <th>is_Hot</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productType as $itemproductType)
                                                <tr>
                                                    <td>{{ $itemproductType->id_product_type }}</td>
                                                    <td>{{ $itemproductType->name }}</td>
                                                    <td><img src="{{ asset($itemproductType->thumbnail) }}"
                                                            alt="productType" class="w-25 h-auto"></td>
                                                    <td>{{ $itemproductType->description }}</td>
                                                    <td>{{ $itemproductType->total_number }}NbComment</td>
                                                    <td>{{ $itemproductType->total_rating }}Rating</td>
                                                    <td>{{ $itemproductType->warranty }}.Tháng</td>
                                                    <td>{{ $itemproductType->category->name }}</td>
                                                    <td>
                                                        <input type="checkbox" data-id="{{ $itemproductType->id_product_type }}" name="active" class="js-switch" {{ $itemproductType->active == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm dropdown-toggle more-horizontal"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{route('viewImageProduct',['id'=>$itemproductType->id_product_type])}}"><i class="fe fe-eye"></i> View</a>
                                                            <a class="dropdown-item" href="{{route('editProductType',['id'=>$itemproductType->id_product_type])}}"><i class="fe fe-edit"></i> Edit</a>
                                                            <a class="dropdown-item" href="{{route('softDeleteProductType',['id'=>$itemproductType->id_product_type])}}"><i class="fe fe-delete"></i> Delete</a>
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
                let producTypeId = $(this).data('id');
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '{{ route('updateStatusProductType') }}',
                    data: {
                        'active': active,
                        'product_type_id': producTypeId
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
