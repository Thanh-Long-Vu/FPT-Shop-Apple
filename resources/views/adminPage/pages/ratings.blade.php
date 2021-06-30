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
@section('title', 'Ratings')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data table Image Product</h2>
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
                                                <th>Number</th>
                                                <th>Content</th>
                                                <th>UserName</th>
                                                <th>Product</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($listRating))
                                                @foreach ($listRating as $item)
                                                <tr>
                                                    <td>{{$item->id_rating}}</td>
                                                    <td>
                                                        @if ($item->number == 1)
                                                            <span class="fe fe-star"></span>
                                                        @elseif($item->number == 2)
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                        @elseif($item->number == 3)
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                        @elseif($item->number == 4)
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                        @elseif($item->number == 5)
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                            <span class="fe fe-star"></span>
                                                        @endif
                                                    </td>
                                                    <td>{{$item->content}}</td>
                                                    <td>{{$item->user->name}}</td>
                                                    <td>{{$item->product->productType->name}}</td>
                                                    <td>
                                                        <input type="checkbox" data-id="{{ $item->id_rating }}" name="active" class="js-switch" {{ $item->active == 1 ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
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
                let id_rating = $(this).data('id');
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '{{ route('ratingUpdateStatus') }}',
                    data: {
                        'active': active,
                        'id_rating': id_rating
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
