<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{ asset('user_page/assets') }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/font-electro.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
    <script src="../admin/js/jquery-ajax.min.js"></script>
    <link rel="stylesheet" href="../admin/css/toastr.min.css">
    <script src="../admin/js/toastr.min.js"></script>
    @yield('script_header')
    <!-- CSS Electro Template -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
</head>

<body>
    <!-- ========== HEADER ========== -->
        @include("userPage.layouts.header")
    <!-- ========== END HEADER ========== -->
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @yield('content')
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
    <!-- ========== FOOTER ========== -->
    @include("userPage.layouts.footer")
    <!-- ========== END FOOTER ========== -->
    <!-- ========== SECONDARY CONTENTS ========== -->
    @include('userPage.layouts.aside-left')
    <!-- ========== END SECONDARY CONTENTS ========== -->

    {{-- @include('userPage.layouts.scripts_end') --}}
    @yield('script_footer')
    <script>
        $(document).on('ready', function (){
            function login(email, password) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                $.ajax({
                    url: "{{ route('login') }}",
                    method: "POST",
                    data: {email: email, password: password}
                }).done(function(data) {
                    let role = data.role
                    if (role === "Admin" || role === "Co-admin" || role === "Editor" || role === "Staff Warehouse") {
                        window.location.href = "{{route('home.index')}}";
                    } else if(role === "User") {
                        window.location.href = "{{route('home')}}";
                    }
                }).error(function (error) {
                    $('#signIn-error').html(error.responseJSON.message)
                });
            }
            $('#submitLogin').click(function (e) {
                let email = $('#signInEmail').val()
                let password = $('#signInPassword').val()
                if(email.length > 0 && password.length > 0) {
                    e.preventDefault();
                    login(email, password)
                }
            })

            function signUp(name, email, password, password_confirmation) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                $.ajax({
                    url: "{{ route('register') }}",
                    method: "POST",
                    data: {
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    }
                }).done(function() {
                    window.location.href = "{{route('home')}}";
                }).error(function (error) {
                    let response = JSON.parse(error.responseText);
                    $('#resSignupEmail-error').show().html(response.errors.email[0])
                    $('#emailSignUp').addClass('u-has-error')
                });
            }
            $('#submitSignUp').click(function (e) {
                let name = $('#signupUsername').val()
                let email = $('#signupEmail').val()
                let password = $('#signupPassword').val()
                let password_confirmation = $('#signupConfirmPassword').val()
                if(
                    email.length > 0
                    && password.length > 0
                    && name.length > 0
                    && password_confirmation.length > 0
                ) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    signUp(name, email, password, password_confirmation)
                }
            })
            $('#signupEmail').keydown(function () {
                $('#resSignupEmail-error').hide()
            })
            $('#signup').find("input").keydown(function (e) {
                if (e.which === 13) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    $('#submitSignUp').trigger("click")
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#productType").autocomplete({
                source: function(request, response){
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                $.ajax({
                    url:"{{route('autoComplete')}}",
                    type: 'post',
                    dataType:"json",
                    data:{
                        'category_id': $('#category_id').val(),
                        'name~' :request.term
                    },
                    success: function(data) {
                        response (data);
                    }
                });
                },
                select: function (event, ui) {
                    $('#productType').val(ui.item.label);
                    $('#employeeid').val(ui.item.value);
                    return false;
                }
            });
        });
        function fetch_select(val, request, response){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                type:'post',
                url: '{{route('autoComplete')}}',
                dataType : 'json',
                data:{
                    option:val
                }
            });
        };
        
        // $(document).ready(function() {
        //     $('#addCart').click(function() {
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
        //             }
        //         });
        //         var quantity = $('#quantity').val();
        //         var id_product = $('#id_product').val();
        //         $.ajax({
        //             type:"post",
        //             url: '/add-to-cart/'+ id_product,
        //             data:{quantity :quantity,id_product:id_product },
        //             success:function(res){       
        //                 console.log(res)
        //             }
        //         });
        //     });
        // }); 
        function addCart(id_product){
            var quantity = $('#quantity').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                type:"post",
                url: '../../add-to-cart/'+id_product,
                data:{quantity :quantity,id_product:id_product },
                success: function(data) {
                    RenderData()
                    $(".label_item_cart").text(data.count_cart);
                    toastr.success(data.message);
                }
            });
            function RenderData(data) { 
                toastr.options.closeButton = 1;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
            }
        }
    </script>
</body>
</html>
