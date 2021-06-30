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
@section('title', 'List Transaction')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data table Transaction</h2>
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
                                                <th>User</th>
                                                <th>Note</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Method Receive</th>
                                                <th>Total Price</th>
                                                <th>Method Payment</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->id_transaction}}</td>
                                                <td>{{$item->user->name ?? "Not Account"}}</td>
                                                <td>{{$item->note}}</td>
                                                <td>{{$item->addtional_data[0]["value"] ?? ""}}</td>
                                                <td>{{$item->addtional_data[2]["value"] ?? ""}}</td>
                                                <td>{{$item->addtional_data[3]["value"] ?? ""}}</td>
                                                <td>
                                                    @if($item->method_receive == 0)
                                                        Home delivery
                                                    @elseif($item->method_receive == 1)
                                                        In-store delivery
                                                    @endif
                                                </td>
                                                <td>{{$item->total_price ?? ""}}</td>
                                                <td>{{$item->payment_method->name ?? ""}}</td>
                                                <td>
                                                @if ($item->status == 1 || $item->status == 0)
                                                    <input type="checkbox" data-id="{{ $item->id_transaction }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                                                @elseif($item->status == 3)
                                                    <form action="{{route('changeStatusTransaction',[$item->id_transaction])}}" method="get">
                                                        {{-- <input type="hidden" data-id="{{ $item->id_transaction }}" name="status" class="js-switch" > --}}
                                                        <input type="submit" class="btn mb-2 btn-outline-warning" value="Ordered">
                                                    </form>
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('orderlist',['id'=> $item->id_transaction])}}" class="btn mb-1 btn-info fe fe-eye"></a>
                                                </td>
                                            </tr>
{{--                                            @elseif(empty($item->user_id))--}}
{{--                                            <tr>--}}
{{--                                                <td>{{$item->id_transaction}}</td>--}}
{{--                                                <td>{{$item->user->name ?? ""}}</td>--}}
{{--                                                <td>{{$item->note}}</td>--}}
{{--                                                <td>--}}
{{--                                                    @if($item->method_receive == 0)--}}
{{--                                                    Thanh toán tiền mặt--}}
{{--                                                    @elseif($item->method_receive == 1)--}}
{{--                                                    Trả thẳng qua thẻ--}}
{{--                                                    @elseif($item->method_receive == 2)--}}
{{--                                                    Trả góp qua ngân hàng--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                                <td>{{$item->total_price}}</td>--}}
{{--                                                <td>{{$item->payment_method->name}}</td>--}}
{{--                                                <td>--}}
{{--                                                @if ($item->status == 1 || $item->status == 0)--}}
{{--                                                    <input type="checkbox" data-id="{{ $item->id_transaction }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>--}}
{{--                                                @elseif($item->status == 3)--}}
{{--                                                    <form action="{{route('changeStatusTransaction',[$item->id_transaction])}}" method="get">--}}
{{--                                                        --}}{{-- <input type="hidden" data-id="{{ $item->id_transaction }}" name="status" class="js-switch" > --}}
{{--                                                        <input type="submit" class="btn mb-2 btn-outline-warning" value="Ordered">--}}
{{--                                                    </form>--}}
{{--                                                @endif--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <a href="{{route('orderlist',['id'=> $item->id_transaction])}}" class="btn mb-1 btn-info fe fe-eye"></a>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
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
                let status = $(this).prop('checked') === true ? 1 : 0;
                let id_transaction = $(this).data('id');
                $.ajax({
                    type: "get",
                    dataType: "json",
                    url: '{{ route('updateStatusTransaction') }}',
                    data: {
                        'status': status,
                        'id_transaction': id_transaction
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
