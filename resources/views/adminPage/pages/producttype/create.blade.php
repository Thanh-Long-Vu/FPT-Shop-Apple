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
@section('title', 'Create Product Type')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Form Create Product Type</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                {{-- <div class="card-header">
                                    <strong class="card-title">Advanced Validation</strong>
                                </div> --}}
                                <div class="card-body">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                    @endif
                                    <form class="needs-validation" novalidate action="{{ route('storeProductType') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field() }}
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Name product type</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required >
                                                <div class="invalid-feedback">Please enter a name in the Name product type. </div>
                                            @if ($errors->has('name'))
                                                    <div class="alert alert-danger">
                                                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('name') }} 
                                                    </div>
                                            @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Description">Description</label>
                                                <input type="text" class="form-control" id="Description" name ="description" value="{{old('description')}}" 
                                                    required>
                                            <div class="invalid-feedback">Please enter a description </div>
                                            @if ($errors->has('description'))
                                                    <div class="alert alert-danger">
                                                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('description') }} 
                                                    </div>
                                                    @endif
                                            </div>
                                        </div> <!-- /.form-row -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6" style="margin-top: 2.5%">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" value="{{old('image')}}" required>
                                                <div class="invalid-feedback">Please choose image for Product Type</div>
                                                @if ($errors->has('image'))
                                                <div class="alert alert-danger">
                                                    <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('image') }} 
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="warranty">Warranty</label>
                                                <input type="text" class="form-control" id="warranty" name="warranty"
                                                    required >
                                                    @if ($errors->has('warranty'))
                                                    <div class="alert alert-danger">
                                                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $errors->first('warranty') }} 
                                                    </div>
                                                    @endif
                                                    <div class="invalid-feedback">Please enter a warranty for Product Type </div>
                                            </div>
                                        </div> <!-- /.form-row -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6 mb-6">
                                                <label for="custom-select" >Category</label>
                                                <select class="custom-select" id="custom-select" name = "id_category" required>
                                                    <option disabled selected value >Select Category</option>
                                                    @if($category)
                                                        @foreach($category as $categoryitem)
                                                            <option value="{{$categoryitem->id_category}}" >{{$categoryitem->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback"> Please select a valid Category. </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="dataproduct">Data Product</label>
                                            <div class="form-row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="fileName">Name field</label>
                                                    <input type="text" class="form-control" name="name_fied[]" value="Screen size" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Screen technology" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Rear camera" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Front camera" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Chipset" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="RAM capacity" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Internal memory" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="The battery" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="SIM" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Operating system" >
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="name">Values</label>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="fileName">Name field</label>
                                                    <input type="text" class="form-control" name="name_fied[]" value="Screen resolution	" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Screen feature" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="CPU type" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="GPU" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Size" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Weight" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Video" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Bluetooth" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Charging technology" >
                                                    <input type="text" class="form-control" name="name_fied[]" value="Charging port	" >
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="name">Values</label>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                    <input type="text" class="form-control" id="values" name="value[]" value="{{old('value')}}" required >
                                                    <div class="invalid-feedback">Please enter a value. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Create Product</button>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!-- end section -->
                </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Package has uploaded successfull</strong></small>
                                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-download fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Widgets are updated successfull</strong></small>
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-inbox fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Notifications have been sent</strong></small>
                                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-link fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Link was attached to menu</strong></small>
                                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .list-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-success justify-content-center">
                                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Control area</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Activity</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Droplet</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Upload</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Users</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');

    </script>
@endsection