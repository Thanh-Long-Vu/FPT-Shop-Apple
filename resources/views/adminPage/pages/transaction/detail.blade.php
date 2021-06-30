@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
@endsection
@section('title', 'Detail Transaction')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h2 class="h5 page-title"><small class="text-muted text-uppercase">ID Transaction</small><br />#{{$transaction->id_transaction}}
                            </h2>
                        </div>
                        <div class="col-auto">
                            {{-- <button type="button" class="btn btn-secondary">Print</button> --}}
                            <button type="button" class="btn btn-primary">Processed</button>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body p-5">
                            <div class="row mb-5">
                                <div class="col-12 text-center mb-4">
                                    <img src="admin/assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4"
                                        alt="...">
                                    <h2 class="mb-0 text-uppercase">Invoice</h2>
                                </div>
                                <div class="col-md-7">
                                    <p class="small text-muted text-uppercase mb-2">Invoice from</p>
                                    <p class="mb-4">
                                        <strong>Name Sell</strong><br />  FPT Shop<br />
                                    </p>
                                    <p>
                                        <span class="small text-muted text-uppercase">Invoice #</span><br />
                                        <strong>{{$transaction->id_transaction}}</strong>
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <p class="small text-muted text-uppercase mb-2">Invoice to</p>
                                    <p class="mb-4">
                                        <strong>Name Receive</strong><br />{{$transaction->addtional_data[0]["value"] ?? ""}} <br /> <strong>Phone : </strong>  {{$transaction->addtional_data[2]["value"] ?? ""}}<br /> <strong>Address : </strong> {{$transaction->addtional_data[3]["value"] ?? ""}} <br /><strong>Email : </strong> {{$transaction->addtional_data[1]["value"] ?? ""}} <br />
                                    </p>
                                    <p>
                                        <small class="small text-muted text-uppercase">Due date</small><br />
                                        <strong>{{$transaction->created_at}}</strong>
                                    </p>
                                </div>
                            </div> <!-- /.row -->
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Order ID</th>
                                        <th scope="col" class="text-right">Product</th>
                                        <th scope="col" class="text-right">Price VNĐ</th>
                                        <th scope="col" class="text-right">Quantity</th>
                                        <th scope="col" class="text-right">Discount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td class="text-center">{{$item->transaction_id ?? ""}}</td>
                                            <td class="text-right">{{$item->product->productType->name ?? ""}}</td>
                                            <td class="text-right">{{$item->price ?? ""}}</td>
                                            <td class="text-right">{{$item->quantity ?? ""}}</td>
                                            <td class="text-right">{{$item->sale ?? ""}} %</td>
                                        <tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <p class="text-muted small">
                                        <strong>Note :{{$transaction->note ?? ""}}</strong>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right mr-2">
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Subtotal : </span>
                                            <strong>${{number_format($totalprice)}}</strong>
                                        </p>
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Total Sale :</span>
                                            <strong>{{$sale}}%</strong>
                                        </p>
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Total : </span>
                                            <span>${{number_format($transaction->total_price)}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
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
