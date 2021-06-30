@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
    <link rel="stylesheet" href="admin/css/dataTables.bootstrap4.css">
@endsection
@section('title', 'List Transaction')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Data table Statistics Transaction</h2>
                    <div class="row my-4">
                        <div class="col-md-12">
                            <form method="POST" action="{{route('export.Excel.Transaction')}}">
                                @csrf
                                <div class="col-md-2 float-right" style="margin-top: 29px;">
                                    <input type="submit" value="Export" id="exportExcel" class="btn btn-primary">
                                </div>
                                {{-- <div class="col-md-2 float-right" style="margin-top: 29px;">
                                    <input type="submit" value="Get Month" class="btn btn-primary" onclick="getmonth()">
                                </div> --}}
                                <div class="col-md-3 float-right">
                                    <label for="month">Month</label>
                                    <input class="form-control dropdown-toggle" id="month" type="month" name="month">
                                </div>
                            </form>
                        </div>
                    </div>
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
                                                <th>Method Receive</th>
                                                <th>Total Price</th>
                                                <th>Method Payment</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($statistics as $item)
                                                @if (!empty($item->user_id))
                                                    <tr>
                                                        <td>{{ $item->id_transaction }}</td>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td>{{ $item->note }}</td>
                                                        <td>
                                                            @if ($item->method_receive == 0)
                                                                Thanh toán tiền mặt
                                                            @elseif($item->method_receive == 1)
                                                                Trả thẳng qua thẻ
                                                            @elseif($item->method_receive == 2)
                                                                Trả góp qua ngân hàng
                                                            @endif
                                                        </td>
                                                        <td>${{ number_format($item->total_price) }}</td>
                                                        <td>{{ $item->payment_method->name }}</td>
                                                        <td>
                                                            <button type="button"
                                                                class="fe fe-user-check btn mb-2 btn-success">
                                                                Reviewed</button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('orderlist', ['id' => $item->id_transaction]) }}"
                                                                class="btn mb-1 btn-info fe fe-eye"></a>
                                                        </td>
                                                    </tr>
                                                @elseif(!empty($item->guest_id))
                                                    <tr>
                                                        <td>{{ $item->id_transaction }}</td>
                                                        <td>{{ $item->guest->name }}</td>
                                                        <td>{{ $item->note }}</td>
                                                        <td>
                                                            @if ($item->method_receive == 0)
                                                                Thanh toán tiền mặt
                                                            @elseif($item->method_receive == 1)
                                                                Trả thẳng qua thẻ
                                                            @elseif($item->method_receive == 2)
                                                                Trả góp qua ngân hàng
                                                            @endif
                                                        </td>
                                                        <td>{{ number_format($item->total_price) }}.VND</td>
                                                        <td>{{ $item->payment_method->name }}</td>
                                                        <td>
                                                            <button type="button"
                                                                class="fe fe-user-check btn mb-2 btn-success">
                                                                Reviewed</button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('orderlist', ['id' => $item->id_transaction]) }}"
                                                                class="btn mb-1 btn-info fe fe-eye"></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        <b class="fe fe-dollar-sign"></b> <b>Total Money</b> :
                                        {{ number_format($statistics->sum('total_price')) }}.VND
                                    </div>
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
