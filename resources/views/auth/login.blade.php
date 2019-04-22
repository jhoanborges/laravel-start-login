<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{url('css/fontastic.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{url('css/fontawesome-all.min.css')}}">


    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <div class="page login-page">
          <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
              <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                  <div class="info d-flex align-items-center">
                    <div class="content">
                      <div class="logo">
                        <h1>Terra Vital</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>

        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          <div class="form d-flex align-items-center">
            <div class="content">
              <form method="post" class="" id="form">
                <div class="form-group">

                    <input  name="email"  id="email" type="text"  required data-msg="Introduce tu nombre de usuario (admin@softdepot.mx)" class="input-material"  value="{{ old('email') }}">
                    <span class="error" role="alert"> </span>
                    <label for="email" class="label-material">User Name</label>
                </div>
                <div class="form-group">

                    <input minlength="8" name="password" id="password" type="password" required data-msg="Introduce tu contraseña (12345678)"
                    class="input-material {{ $errors->has('password') ? ' is-invalid' : '' }}">

                    <span class="error" role="alert"> </span>
                    <label for="password" class="label-material">Password</label>
                </div>
                <button id="login" type="submit" class="btn btn-primary">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                </form><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password?</a><br>


            </div>
        </div>
    </div>
</div>
</div>
</div>



</div>
<!-- JavaScript files-->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{url('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('js/loadingoverlay.min.js')}}"></script>
<!-- Main File-->

<script src="{{url('js/front.js')}}"></script>

@include('sweetalert::alert')



<script>
    $(function () {

        function clear_messages(){
            var form =  $("#form")
            form.find('.invalid-feedback').each(function(){
                $(this).remove()
            })
        }


        $("#form").on("submit", function(e){

            $('button[type=submit], input[type=submit]').prop('disabled',true);
            var form = $(this)
            var page = $('.page');


            var array = $(this).serializeArray();
            dataObj = {};

            $(array).each(function(i, field){
              dataObj[field.name] = field.value;
          });



            data = new FormData();
            data.append('email', dataObj['email']);
            data.append('password', dataObj['password']);

            e.preventDefault();

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: '{{route('login')}}',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                type: 'POST',


                beforeSend: function () {
                    form.LoadingOverlay("show", {
                        image       : "",
                        fontawesomeColor: "#ff3f3f",
                        fontawesome : "fas fa-spinner fa-spin",
                        progress    : true
                    });
                },

                success: function(response) {
                   window.location.href = '{{route("home")}}';
               },

               error:function (xhr, ajaxOptions, thrownError){

                $('button[type=submit], input[type=submit]').prop('disabled',false);

                clear_messages();
                form.LoadingOverlay("hide")


                if (xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, value){
                        $('#'+key).next('.error')
                        .append('<strong style="display:block;" class="invalid-feedback">'+value[0]+'</strong>').show();
                    });
                    return false

                }

                const Toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 10000
                });

                Toast.fire({
                    type: 'error',
                    title: 'Verifica tus credenciales de acceso.'
                })


            }
        });


        })

    })
</script>



</body>
</html>
