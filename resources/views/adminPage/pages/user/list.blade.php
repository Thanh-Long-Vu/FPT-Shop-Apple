@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
    <link rel="stylesheet" href="admin/css/dataTables.bootstrap4.css">
@endsection
@section('title', 'User List')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    @if (!empty($listUser) && isset($listUser))
                    <h2 class="mb-2 page-title">Data table Customer List</h2>
                    @elseif(!empty($listCoAdmin) && isset($listCoAdmin))
                    <h2 class="mb-2 page-title">Data table Employees List</h2>
                    @endif
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
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                @if (!empty($listUser) && isset($listUser))
                                                <th>Total_pay</th>
                                                @elseif(!empty($listCoAdmin) && isset($listCoAdmin))
                                                <th>Edit</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($listUser) && isset($listUser))
                                                @foreach ($listUser as $item)
                                                <tr>
                                                    <td>{{$item->id_user ?? ""}}</td>
                                                    <td>{{$item->name ?? ""}}</td>
                                                    <td>{{$item->role->name_role ?? ""}}
                                                    </td>
                                                    <td>{{$item->email ?? ""}}</td>
                                                    <td>{{$item->phone ?? ""}}</td>
                                                    <td>{{$item->address ?? ""}}</td>
                                                    <td>{{$item->total_pay ?? ""}}</td>    
                                                </tr>
                                                @endforeach
                                            @elseif(!empty($listCoAdmin) && isset($listCoAdmin))
                                            
                                            @foreach ($listCoAdmin as $item)
                                            <tr>
                                                <td>{{$item->id_user ?? ""}}</td>
                                                <td>{{$item->name ?? ""}}</td>
                                                <td>{{$item->role->name_role ?? ""}}
                                                </td>
                                                <td>{{$item->email ?? ""}}</td>
                                                <td>{{$item->phone ?? ""}}</td>
                                                <td>{{$item->address ?? ""}}</td>
                                                <td>Edit</td>    
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div>
            </div> <!-- .row -->
        </div>
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
