@extends('adminPage.index')
@section('scriptHeader')
    <link rel="stylesheet" href="admin/css/feather.css">
    <link rel="stylesheet" href="admin/css/select2.css">
    <link rel="stylesheet" href="admin/css/dropzone.css">
    <link rel="stylesheet" href="admin/css/uppy.min.css">
    <link rel="stylesheet" href="admin/css/jquery.steps.css">
    <link rel="stylesheet" href="admin/css/jquery.timepicker.css">
    <link rel="stylesheet" href="admin/css/quill.snow.css">
@endsection
@section('title', 'Edit Product')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Form Edit Product</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-warning">
                                        {{ Session::get('error') }}
                                        @php
                                            Session::forget('error');
                                        @endphp
                                    </div>
                                    @endif
                                    <form class="needs-validation"  novalidate method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-3 mb-3">
                                                <label for="custom-select">Product Types</label>
                                                <select class="custom-select" name="product_type_id" >
                                                    @foreach($productType as $productVal)
                                                    <option  value="{{$productVal->id_product_type}}" @if($product->product_type_id == $productVal->id_product_type) selected @endif >{{$productVal->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="quantity_sell">Quantity sell ( Quantity in warehouse : {{$warehouse->quantity}})</label>
                                                <div class="custom-File">
                                                    <input type="text" class="form-control" id="quantity_sell" name="quantity_sell" value="{{old('quantity_sell')}}" placeholder="Quantity remaining : {{$warehouse->quantity - $warehouse->quantity_sell}}" required>
                                                    <div class="invalid-feedback">Please enter quantity sell</div>
                                                    @if ($errors->has('quantity_sell'))
                                                    <div class="alert alert-danger">
                                                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('quantity_sell') }} 
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> <!-- /.form-row -->
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="price_buy">Price buy (.VNĐ)</label>
                                                <input type="text" class="form-control"  value="{{$product->warehouse->price}}" id="price_buy" disabled required>
                                                <div class="invalid-feedback">Please choose image for Price buy</div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="price_sell">Price sell (.VNĐ)</label>
                                                <input type="text" class="form-control" value="{{$product->price}}" id="price_sell" name="price_sell" required>
                                                <div class="invalid-feedback">Please choose image for Price sell</div>
                                                @if ($errors->has('price'))
                                                <div class="alert alert-danger">
                                                    <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('price_sell') }} 
                                                </div>
                                                @endif
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label>Add Thumbnail</label>
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" value="{{old('image')}}">
                                                    @if ($errors->has('image'))
                                                    <div class="alert alert-danger">
                                                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('image') }} 
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3" style="margin-top: -2.5%">
                                                @if($product->thumbnail != '')
                                                <img src="{{asset($product->thumbnail)}}" alt="" width="25%">
                                                @else
                                                <div class="alert alert-warning" role="alert">
                                                    <span class="fe fe-alert-triangle fe-16 mr-2"></span> Please choose a image for Product Type 
                                                </div>
                                                @endif
                                            </div>
                                        </div>      
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="discount">Discount %</label>
                                                <div class="custom-file">
                                                    <input type="text" class="form-control" id="discount" name="discount" value="{{$product->discount}}" required>
                                                    <div class="invalid-feedback">Please choose image for Discount</div>
                                                    @if ($errors->has('discount'))
                                                    <div class="alert alert-danger">
                                                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('discount') }} 
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!-- end section            /.col-12 col-lg-10 col-xl-10 -->
                </div>
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
    <script src='admin/js/jquery.mask.min.js'></script>
    <script src='admin/js/select2.min.js'></script>
    <script src='admin/js/jquery.steps.min.js'></script>
    <script src='admin/js/jquery.validate.min.js'></script>
    <script src='admin/js/jquery.timepicker.js'></script>
    <script src='admin/js/dropzone.min.js'></script>
    <script src='admin/js/uppy.min.js'></script>
    <script src='admin/js/quill.min.js'></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }

    </script>
    <script src="admin/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
    <script>
        $(document).ready(function(){
            $('#category').change(function(){
            var cid = $(this).val();
            if(cid){
            $.ajax({
            type:"get",
            url: '../admin/product/edit/getCategory/'+cid,//Please see the note at the end of the post**
            success:function(res)
            {       
                    if(res.length !== 0)
                    {
                        $("#producttype").empty();
                        $("#producttype").append('<option>Chon</option>');
                        $.each(res,function(key,value){
                            $("#producttype").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }else{
                        $("#producttype").empty();
                        $("#producttype").append('<option>Chọn</option>');
                    }
            }

            });
            }
        });
    });
    </script>
@endsection