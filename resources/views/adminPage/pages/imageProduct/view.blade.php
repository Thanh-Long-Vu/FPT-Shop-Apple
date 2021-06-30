@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
    <link rel="stylesheet" href="admin/css/dataTables.bootstrap4.css">
@endsection
@section('title', 'View Image Product')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Image Product</h2>
                        </div>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <div class="row">
                        @foreach ($data as $itemdata)
                            <div class="col-md-3">
                                <div class="card shadow mb-4">
                                    <img src="{{ $itemdata->img_url }}" alt="..." class="w-100 h-50 text-align: center;
                                        margin: 0 auto;">
                                    <div class="card-footer">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-auto">
                                                @if ($itemdata->active == 1)
                                                    <small>
                                                        <span class="dot dot-lg bg-success mr-1"></span> Online
                                                    </small>
                                                @else
                                                    <small>
                                                        <span class="dot dot-lg bg-danger mr-2"></span>Offline
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="col-auto">
                                                @if($itemdata->active == 0)
                                                <small>
                                                    <a class="dropdown-item btn mb-2 btn-danger" href="{{route('OnlStatus',['id'=> $itemdata->id_image_product])}}" ><i
                                                            class="fe fe-eye fe-12 mr-4" ></i>Enable
                                                    </a>
                                                </small>
                                                @elseif($itemdata->active ==1)
                                                <small>
                                                    <a class="dropdown-item btn mb-2 btn-sucess" href="{{route('offStatus',['id'=> $itemdata->id_image_product])}}"><i
                                                            class="fe fe-eye-off fe-12 mr-4"></i>Disable
                                                    </a>
                                                </small>
                                                @endif
                                                <small class="btn-outline-danger">
                                                    <a class="dropdown-item btn mb-2 btn-danger" href="{{route('deleteImageProduct',['id'=>$itemdata->id_image_product])}}"><i
                                                            class="fe fe-delete fe-12 mr-4 "></i>Delete
                                                    </a>
                                                </small>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-footer -->
                                </div>
                            </div> <!-- .col -->
                        @endforeach
                    </div> <!-- .row -->
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
@endsection
