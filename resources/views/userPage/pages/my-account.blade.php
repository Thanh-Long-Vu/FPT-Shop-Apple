@extends('userPage.index')
@section('title')
    My Account
@endsection
@section('script_header')
    <link rel="stylesheet" href="assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <script src="../admin/js/jquery-ajax.min.js"></script>
    <link rel="stylesheet" href="../admin/css/toastr.min.css">
    <script src="../admin/js/toastr.min.js"></script>
    <style>
        .list_start i:hover {
            cursor: pointer;
        }
        .list_text {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background-color: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border: 2px;
            display: none;
        }
        .list_text::after {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgb(82, 184, 88, 0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
        .list_start .fas .rating_active {
            color: #fed700;
        }
        #loading_icon {
            visibility: hidden;
        }
    </style>
@endsection
@section('content')
    <main id="content" role="main" class="checkout-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My
                                Account</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <div class="container-fluid mb-10">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{session('message')}}
                            </strong>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    @if (Session::has('failed'))
                        <div class="alert alert-danger">
                            {{ Session::get('failed') }}
                            @php
                                Session::forget('failed');
                            @endphp
                        </div>
                    @endif
                    <h2 class="h3 mb-4 page-title text-center">My
                        Account</h2>
                    <div class="my-4">
                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="myAccount-tab" data-toggle="tab" href="#myAccount" role="tab"
                                    aria-controls="myAccount" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="transaction-tab" data-toggle="tab" href="#transaction" role="tab"
                                    aria-controls="transaction" aria-selected="false">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rated-tab" data-toggle="tab" href="#rated" role="tab"
                                    aria-controls="rated" aria-selected="false">History reviewed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="rating-tab" data-toggle="tab" href="#rating" role="tab"
                                    aria-controls="rating" aria-selected="false">Review Transaction</a>
                            </li>
                        </ul>
                    </div> <!-- /.card-body -->
                    <div class="my-4 tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="myAccount" role="tabpanel" aria-labelledby="myAccount-tab"
                            data-target-group="groups">
                            @if (!empty($user))
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('updateMyAccount', ['id' => $user->id_user]) }}">
                                    {{ csrf_field() }}
                                    <div class="row mt-5 align-items-center">
                                        <div class="col-md-3 text-center mb-5">
                                            <div class="avatar avatar-xl">
                                                <img src="../{{ $user->avatar }}" class="w-60" style="border-radius: 50%;
                                                                                            border: 1px solid #fed700;"
                                                    alt="..." class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <h4 class="mb-1">Name : {{ $user->name }}</h4>
                                                    <p class="mb-3">
                                                        @if ($user->role_id == 1)
                                                            <span class="badge badge-dark">
                                                                Admin
                                                            </span>
                                                        @elseif($user->role_id == 2)
                                                            <span class="badge badge-dark">
                                                                Co-Admin
                                                            </span>
                                                        @elseif($user->role_id == 3)
                                                            <span class="badge badge-success">
                                                                User
                                                            </span>
                                                        @else
                                                            <span class="badge badge-infog">
                                                                Guest
                                                            </span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-7">
                                                    <p>Address : {{ $user->address }}</p>
                                                </div>
                                                <div class="col">
                                                    <b>
                                                        <p class="small mb-0 ">Email : {{ $user->email }}</p>
                                                        <p class="small mb-0 ">Phone : {{ $user->phone }}</p>
                                                        <p class="small mb-0 ">Total pay of you :
                                                            {{ number_format($user->total_pay) }}.VND</p>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Firstname</label>
                                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                                class="form-control" placeholder="Brown">
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">
                                                <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                            id="inputEmail4" placeholder="brown@asher.me">
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="inputAddress5">Address</label>
                                        <input type="text" name="address" value="{{ $user->address }}"
                                            class="form-control" id="inputAddress5"
                                            placeholder="P.O. Box 464, 5975 Eget Avenue">
                                    </div>
                                    @if ($errors->has('address'))
                                        <div class="alert alert-danger">
                                            <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="tel" name="phone" value="{{ $user->phone }}"
                                                class="form-control" id="phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="avatar">Choose Avatar to change</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                                <label class="custom-file-label" for="avatar">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <div class="alert alert-danger">
                                            <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('avatar'))
                                        <div class="alert alert-danger">
                                            <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                            {{ $errors->first('avatar') }}
                                        </div>
                                    @endif
                                    <input type="submit" class="btn btn-primary" value="Save Change">
                                </form>
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('updatePassword', ['id' => $user->id_user]) }}">
                                    {{ csrf_field() }}
                                    <hr class="my-4">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputPasswordOld">Old Password</label>
                                                <input type="password" name="pass_old" class="form-control"
                                                    id="inputPasswordOld">
                                            </div>
                                            @if ($errors->has('pass_old'))
                                                <div class="alert alert-danger">
                                                    <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                                    {{ $errors->first('pass_old') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="inputPasswordNew">New Password</label>
                                                <input type="password" name="pass_new" class="form-control"
                                                    id="inputPasswordNew">
                                            </div>
                                            @if ($errors->has('pass_new'))
                                                <div class="alert alert-danger">
                                                    <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                                    {{ $errors->first('pass_new') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="inputPassword6">Confirm Password</label>
                                                <input type="password" name="confirm_pass_new" class="form-control"
                                                    id="inputPassword6">
                                            </div>
                                            @if ($errors->has('confirm_pass_new'))
                                                <div class="alert alert-danger">
                                                    <span class="fe fe-minus-circle fe-16 mr-2"></span>
                                                    {{ $errors->first('confirm_pass_new') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-2">Password requirements</p>
                                            <p class="small text-muted mb-2"> To create a new password, you have to meet all
                                                of
                                                the following requirements: </p>
                                            <ul class="small text-muted pl-4 mb-0">
                                                <li> Minimum 8 character </li>
                                                <li>At least one special character</li>
                                                <li>At least one number</li>
                                                <li>Can’t be the same as a previous password </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Change Password">
                                </form>
                            @endif
                        </div>
                        <div class="tab-pane fade pt-2 " id="transaction" role="tabpanel" aria-labelledby="transaction-tab"
                            data-target-group="groups">
                            @if (!empty($transaction))
                                <h6 class="mb-3 text-center">Last payment</h6>
                                @csrf
                                <table class="table table-borderless table-striped" id="table_data">
                                        @include('userPage.ajax.transaction')
                                </table>
                            @else
                                No found data......
                            @endif
                        </div>
                        <div class="tab-pane fade pt-2 " id="rated" role="tabpanel" aria-labelledby="rated-tab"
                            data-target-group="groups">
                            @if (!empty($transactionHistory))
                                @foreach ($transactionHistory as $item)
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-lg-10 col-xl-8">
                                            <div class="card shadow">
                                                <div class="card-body p-5">
                                                    <div class="row mb-5">
                                                        <div class="col-12 text-center mb-4">
                                                            <h2 class="mb-0 text-uppercase">Invoice
                                                                #{{ $item->id_transaction }}</h2>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <p class="small text-uppercase mb-2">Invoice from</p>
                                                            <p class="mb-4">
                                                                FPT Shop<br />
                                                            </p>
                                                            <p>
                                                                <span class="small text-uppercase">Invoice #</span><br />
                                                                <strong>{{ $item->id_transaction }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <p class="small text-uppercase mb-2">Invoice to</p>
                                                            <p class="mb-4">
                                                                {{ $item->user->name }} <br /> <strong>Phone</strong>
                                                                {{ $item->user->phone }}<br /> <strong>Address</strong>
                                                                {{ $item->user->address }} <br />
                                                            </p>
                                                            <p>
                                                                <small class="small text-uppercase">Due date</small><br />
                                                                <strong>{{ $item->created_at }}</strong>
                                                            </p>
                                                        </div>
                                                    </div> <!-- /.row -->
                                                    <table class="table table-borderless table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col" class="text-center">Image</th>
                                                                <th scope="col" class="text-center">Color / Memory</th>
                                                                <th scope="col" class="text-center">Product</th>
                                                                <th scope="col" class="text-center">Price</th>
                                                                <th scope="col" class="text-center">Quantity</th>
                                                                <th scope="col" class="text-center">Discount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($item->order as $order)
                                                                <tr>
                                                                    <td class="text-center w-40"><img class="w-25"
                                                                            src="../{{ $order->first()->product->thumbnail }}"
                                                                            alt=""></td>
                                                                    <td class="text-right"> <b>
                                                                            @if ($order->first()->product->warehouse->color == 0)
                                                                                <span
                                                                                    class="dot dot-lg dot-red mr-2"></span>Red
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 1)
                                                                                <span
                                                                                    class="dot dot-lg dot-yellow mr-2"></span>Yellow
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 2)
                                                                                <span
                                                                                    class="dot dot-lg dot-violet mr-2"></span>Violet
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 3)
                                                                                <span
                                                                                    class="dot dot-lg dot-green mr-2"></span>Green
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 4)
                                                                                <span
                                                                                    class="dot dot-lg dot-black mr-2"></span>Black
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 5)
                                                                                <span
                                                                                    class="dot dot-lg dot-white mr-2"></span>White
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 6)
                                                                                <span
                                                                                    class="dot dot-lg dot-other mr-2"></span>Other
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 7)
                                                                                <span
                                                                                    class="dot dot-lg dot-patific mr-2"></span>Patific
                                                                            @endif
                                                                        </b> - <b>
                                                                            @if ($order->first()->product->warehouse->memory == 0)
                                                                                16GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 1)
                                                                                32GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 2)
                                                                                64GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 3)
                                                                                128GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 4)
                                                                                256GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 5)
                                                                                512Gb
                                                                            @endif
                                                                        </b>
                                                                    </td>
                                                                    <td class="text-center"><a
                                                                            href="{{ route('products.show', ['product' => $order->product->id_product]) }}}}">{{ $order->product->productType->name }}</a>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ number_format($order->price) }}.VND</td>
                                                                    <td class="text-right">{{ $order->quantity }}</td>
                                                                    <td class="text-right">{{ $order->sale }} %</td>
                                                                <tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row mt-5">
                                                        <div class="col-md-6">
                                                            <p class="small">
                                                                <strong>Note :</strong>{{ $order->transaction->note }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="text-right mr-2">
                                                                <p class="mb-2 h6">
                                                                    <span class="text-muted">Total : </span>
                                                                    <span>{{ number_format($order->transaction->total_price) }}.VNĐ</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div> <!-- /.row -->
                                                </div> <!-- /.card-body -->
                                                <hr>
                                                <div>
                                                    <h6 class="text-uppercase mb-2 text-center">Rating Transaction <b
                                                            style="red">ID#{{ $item->id_transaction }}</b></h6>
                                                    @if ($item->rating != null)
                                                        @foreach ($item->rating as $rating)
                                                            <div class="row mb-5">
                                                                <div class="ml-5 col-md-6">
                                                                    <p class="small text-uppercase mb-2"><b>Content review
                                                                            of you <i
                                                                                class="text-warning">{{ $rating->product->productType->name }}</i></b>
                                                                    </p>
                                                                    <p><textarea class="form-control p-5" rows="4"
                                                                            name="content"
                                                                            disabled>{{ $rating->content }}</textarea>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-5 text-warning">
                                                                    <p class="small text-uppercase mb-2"><b
                                                                            class="text-warning">You have rated the product
                                                                            {{ $rating->number }} <small
                                                                                class="fas fa-star"></small></b></p>
                                                                    @for ($i = $rating->number; $i--; $i >= 0)
                                                                        <small class="fas fa-star"></small>
                                                                    @endfor
                                                                    @for ($i = 5 - $rating->number; $i--; $i >= 0)
                                                                        <small class="far fa-star text-muted"></small>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        t điên với m lắm r
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                            aria-label="Page navigation example">
                                    {{ $transactionHistory->withQueryString()->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                        <div class="tab-pane fade pt-2 " id="rating" role="tabpanel" aria-labelledby="rating-tab"
                            data-target-group="groups">
                            @if (!empty($transactionReview))
                                @foreach ($transactionReview as $item)
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-lg-10 col-xl-8">
                                            <div class="card shadow">
                                                <div class="card-body p-5">
                                                    <div class="row mb-5">
                                                        <div class="col-12 text-center mb-4">
                                                            <h2 class="mb-0 text-uppercase">Invoice
                                                                #{{ $item->id_transaction }}</h2>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <p class="small text-uppercase mb-2">Invoice from</p>
                                                            <p class="mb-4">
                                                                FPT Shop<br />
                                                            </p>
                                                            <p>
                                                                <span class="small text-uppercase">Invoice #</span><br />
                                                                <strong>{{ $item->id_transaction }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <p class="small text-uppercase mb-2">Invoice to</p>
                                                            <p class="mb-4">
                                                                {{ $item->user->name ?? null }} <br /> <strong>Phone</strong>
                                                                {{ $item->user->phone ?? null }}<br /> <strong>Address</strong>
                                                                {{ $item->user->address ?? null }} <br />
                                                            </p>
                                                            <p>
                                                                <small class="small text-uppercase">Due date</small><br />
                                                                <strong>{{ $item->created_at }}</strong>
                                                            </p>
                                                        </div>
                                                    </div> <!-- /.row -->
                                                    <table class="table table-borderless table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col" class="text-center">Image</th>
                                                                <th scope="col" class="text-center">Color / Memory</th>
                                                                <th scope="col" class="text-center">Product</th>
                                                                <th scope="col" class="text-center">Price</th>
                                                                <th scope="col" class="text-center">Quantity</th>
                                                                <th scope="col" class="text-center">Discount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($item->order as $order)
                                                                <tr>
                                                                    <td class="text-center w-40"><img class="w-25"
                                                                            src="../{{ $order->first()->product->thumbnail }}"
                                                                            alt=""></td>
                                                                    <td class="text-right"> <b>
                                                                            @if ($order->first()->product->warehouse->color == 0)
                                                                                <span
                                                                                    class="dot dot-lg dot-red mr-2"></span>Red
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 1)
                                                                                <span
                                                                                    class="dot dot-lg dot-yellow mr-2"></span>Yellow
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 2)
                                                                                <span
                                                                                    class="dot dot-lg dot-violet mr-2"></span>Violet
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 3)
                                                                                <span
                                                                                    class="dot dot-lg dot-green mr-2"></span>Green
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 4)
                                                                                <span
                                                                                    class="dot dot-lg dot-black mr-2"></span>Black
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 5)
                                                                                <span
                                                                                    class="dot dot-lg dot-white mr-2"></span>White
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 6)
                                                                                <span
                                                                                    class="dot dot-lg dot-other mr-2"></span>Other
                                                                            @elseif($order->first()->product->warehouse->color
                                                                                == 7)
                                                                                <span
                                                                                    class="dot dot-lg dot-patific mr-2"></span>Patific
                                                                            @endif
                                                                        </b> - <b>
                                                                            @if ($order->first()->product->warehouse->memory == 0)
                                                                                16GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 1)
                                                                                32GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 2)
                                                                                64GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 3)
                                                                                128GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 4)
                                                                                256GB
                                                                            @elseif($order->first()->product->warehouse->memory
                                                                                == 5)
                                                                                512Gb
                                                                            @endif
                                                                        </b>
                                                                    </td>
                                                                    @if($order->product)
                                                                    <td class="text-center"><a
                                                                            href="{{ route('products.show', ['product' => $order->product->id_product]) }}}}">{{ $order->product->productType->name }}</a>
                                                                    </td>
                                                                    @endif
                                                                    <td class="text-right">
                                                                        {{ number_format($order->price) }}.VND</td>
                                                                    <td class="text-right">{{ $order->quantity }}</td>
                                                                    <td class="text-right">{{ $order->sale }} %</td>
                                                                <tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row mt-5">
                                                        <div class="col-md-6">
                                                            <p class="small">
                                                                <strong>Note :</strong>{{ $order->transaction->note }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="text-right mr-2">
                                                                <p class="mb-2 h6">
                                                                    <span class="text-muted">Total : </span>
                                                                    <span>{{ number_format($order->transaction->total_price) }}.VNĐ</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div> <!-- /.row -->
                                                </div> <!-- /.card-body -->
                                                <hr>
                                                <div>
                                                    <h6 class="text-uppercase mb-2 text-center">Rating Transaction <b
                                                            style="red">ID#{{ $item->id_transaction }}</b></h6>
                                                    <div class="row mb-5">
                                                        <div class="ml-5 col-md-6">
                                                            <p class="small text-uppercase mb-2"><b>Enter content review
                                                                    product of you
                                                                    <i class="text-warning"></i></b>
                                                            </p>
                                                            <div>
                                                                @if(!empty($item->order))
                                                                <select id="id_product" class="js-select selectpicker dropdown-select btn-block col-12 px-0"
                                                                    data-style="btn-sm bg-white font-weight-normal py-2 border">
                                                                    @foreach ($item->order as $productVal)
                                                                        <option
                                                                            value="{{ $productVal->product->id_product ?? null }}"
                                                                            selected>
                                                                            {{ $productVal->product->productType->name ?? null }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </div>
                                                            <p><textarea class="form-control p-5" rows="4" id="content"></textarea>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-5 text-warning">
                                                            <p class="small text-uppercase mb-2"><b class="text-warning">Add
                                                                    rated the product</b></p>
                                                            <div class="number_rating"
                                                                style="display :flex;font-size: 15px;margin-top :15px;">
                                                                <span class="list_start " style="margin : 0 15px">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <i class="fas fa-star text-muted "
                                                                            data-key="{{ $i }}"
                                                                            onclick="submitStar({{ $i }})"></i>
                                                                    @endfor
                                                                </span>
                                                                <span class="list_text"></span>
                                                            </div>
                                                            {{-- <div class="mt-5">
                                                                <input type="radio" name="status" id="status" value="false" class="mr-1">Continue
                                                                <input type="radio" name="status" id="status" value="true" class="mr-1">Done
                                                            </div> --}}
                                                            <div class="form-check mt-5">
                                                                <input class="form-check-input" type="checkbox" value="" id="status1" name="status1">
                                                                <label class="form-check-label" for="defaultCheck1"> Continue/Done </label>
                                                            </div>
                                                            <input type="hidden" name="id_transaction" id="id_transaction" value="{{$item->id_transaction}}">
                                                        </div>
                                                        <div
                                                            class="offset-md-4 offset-lg-3 col-auto text-center margin-center">
                                                            <input type="submit"
                                                                class="btn btn-primary-dark btn-wide transition-3d-hover"
                                                                value="Add Review" id="add_review" onclick="submitReview()">
                                                            <div class="spinner-border" role="status" id="loading_icon">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            Not found data ...
                            @endif
                            <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                            aria-label="Page navigation example">
                                    {{ $transactionReview->withQueryString()->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>
@endsection
@section('script_footer')
    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="assets/vendor/appear.js"></script>
    <script src="assets/vendor/jquery.countdown.min.js"></script>
    <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="assets/vendor/typed.js/lib/typed.min.js"></script>
    <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="assets/vendor/appear.js"></script>
    <script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- JS Electro -->
    <script src="assets/js/hs.core.js"></script>
    <script src="assets/js/components/hs.countdown.js"></script>
    <script src="assets/js/components/hs.header.js"></script>
    <script src="assets/js/components/hs.hamburgers.js"></script>
    <script src="assets/js/components/hs.unfold.js"></script>
    <script src="assets/js/components/hs.focus-state.js"></script>
    <script src="assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="assets/js/components/hs.validation.js"></script>
    <script src="assets/js/components/hs.fancybox.js"></script>
    <script src="assets/js/components/hs.onscroll-animation.js"></script>
    <script src="assets/js/components/hs.slick-carousel.js"></script>
    <script src="assets/js/components/hs.quantity-counter.js"></script>
    <script src="assets/js/components/hs.range-slider.js"></script>
    <script src="assets/js/components/hs.show-animation.js"></script>
    <script src="assets/js/components/hs.svg-injector.js"></script>
    <script src="assets/js/components/hs.scroll-nav.js"></script>
    <script src="assets/js/components/hs.go-to.js"></script>
    <script src="assets/js/components/hs.selectpicker.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                direction: 'horizontal',
                pageContainer: $('.container'),
                breakpoint: 767.98,
                hideTimeOut: 0
            });
        });
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));
            // initialization of animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });
            // initialization of HSScrollNav component
            $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
                duration: 700
            });
            // initialization of quantity counter
            $.HSCore.components.HSQantityCounter.init('.js-quantity');
            // initialization of popups
            $.HSCore.components.HSFancyBox.init('.js-fancybox');
            // initialization of countdowns
            var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                yearsElSelector: '.js-cd-years',
                monthsElSelector: '.js-cd-months',
                daysElSelector: '.js-cd-days',
                hoursElSelector: '.js-cd-hours',
                minutesElSelector: '.js-cd-minutes',
                secondsElSelector: '.js-cd-seconds'
            });
            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
            // initialization of forms
            $.HSCore.components.HSFocusState.init();
            // initialization of form validation
            $.HSCore.components.HSValidation.init('.js-validate', {
                rules: {
                    confirmPassword: {
                        equalTo: '#signupPassword'
                    }
                }
            });
            // initialization of forms
            $.HSCore.components.HSRangeSlider.init('.js-range-slider');
            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');
            // initialization of fancybox
            $.HSCore.components.HSFancyBox.init('.js-fancybox');
            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
            // initialization of hamburgers
            $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                beforeClose: function() {
                    $('#hamburgerTrigger').removeClass('is-active');
                },
                afterClose: function() {
                    $('#headerSidebarList .collapse.show').collapse('hide');
                }
            });
            $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                if ($(this).attr('aria-expanded') === "true") {
                    $(target).collapse('hide');
                } else {
                    $(target).collapse('show');
                }
            });
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
            // initialization of select picker
            $.HSCore.components.HSSelectPicker.init('.js-select');
        });
    </script>
    <script>
        let star = 0;
        const submitStar = (numberRequest) => {
            console.log(numberRequest);
            // $("#loading_icon").css("visibility", "visible");
            $.ajax({
                url: "{{ route('getStar', ['id' => $id]) }}",
                type: 'get',
                data: {
                    number: numberRequest
                }
            }).done(function(result) {
                star = numberRequest;
                // $("#loading_icon").css("visibility", "hidden");
                // console.log(result);
            });
        }
        const submitReview = () =>{
            star;
            var content = $('textarea#content').val();
            let id_product = $('#id_product').val();
            let id_transaction = $('#id_transaction').val();
            if ($('#status1').is(":checked"))
            {
                status1 = 4;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                $("#loading_icon").css("visibility", "visible");
                $.ajax({
                    url: "{{ route('ratingTransaction', ['id' => $id]) }}",
                    type: 'post',
                    data: {
                        star: star,content:content,id_product:id_product,status1:status1,id_transaction:id_transaction
                    }
                }).done(function(result) {
                    $("#loading_icon").css("visibility", "hidden");
                    toastr.options.closeButton = 1;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(result.message);
                    setTimeout(function(){
                            location.reload();
                    }, 100);
                });
            }else {
                status1 = 0;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                $("#loading_icon").css("visibility", "visible");
                $.ajax({
                    url: "{{ route('ratingTransaction', ['id' => $id]) }}",
                    type: 'post',
                    data: {
                        star: star,content:content,id_product:id_product,status1:status1,id_transaction:id_transaction
                    }
                }).done(function(result) {
                    $("#loading_icon").css("visibility", "hidden");
                    toastr.options.closeButton = 1;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(result.message);
                });
            }
        }
        $(function() {
            let list_start = $(".list_start .fas");
            listRating = {
                '1': "Dislike",
                '2': "Okey",
                '3': "Normal",
                '4': "Good",
                '5': "Very Good",
            }
            list_start.mouseover(function() {
                let $this = $(this);
                let number = $this.attr('data-key');
                list_start.addClass('text-muted');
                $.each(list_start, function(key, value) {
                    if (key + 1 <= number) {
                        $(this).removeClass('text-muted')
                    }
                });
                $(".list_text").text('').text(listRating[number]).show();
            });
        });
        $(document).ready(function(){

          $(document).on('click', '.page-link', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getTransaction(page);
          });

          function getTransaction(page)
          {
            var _token = $("input[name=_token]").val();
            $.ajax({
              url:"{{ route('getTransaction',['id' => $id]) }}",
              method:"POST",
              data:{_token:_token, page:page},
              success:function(data)
              {
                $('#table_data').html(data);
              }
            });
          }

        });
    </script>
@endsection
