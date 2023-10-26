<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="/assets/css/style.css">
    {{-- <link rel="stylesheet" href="/assets/images"> --}}
    <title>..:: COMESA - Admin Portal ::..</title>
</head>
<body>
    <div class="img-centre">
      <a href="#"><img id="logo_resize_img" src="/assets/img/logo.jpg" alt="COMESA_logo" class="responsive"></a>  
    </div>
   
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="{{ route('admin.check') }}" class="mt-5 border p-4 bg-light shadow" method="POST">
                        @csrf
                        <h2 class="mb-5 text-success" style="text-align: center">OTP HAS BEEN SENT TO YOU'RE EMAIL</h2>
                        
                        @if (Session::get('fail'))
                           <div class="alert alert-danger">
                            {{Session::get('fail')}}
                           </div>
                        @endif


                        @if (Session::get('success'))
                        <div class="alert alert-success">
                         {{Session::get('success')}}
                        </div>
                     @endif

                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label>Enter OTP for validation : <span class="text-danger">*</span></label>
                                <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP Sent" value="{{old('otp')}}" required>
                                <span class="text-danger">@error('otp'){{$message}}@enderror</span>
                            </div>

                           
                            <div class="col-md-12">
                               <button class="btn btn-primary float-end" id="supplier_login_in">Login</button>
                            </div>
                        </div>
                    </form>
                    {{-- <p class="text-center mt-3 text-secondary">If you don't have account, Please <a href="{{route('supplier-registration')}}">Signup Now</a></p> --}}
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript"></script>
    <script src="/assets/js/jquery.min.js"></script>

     <script>

            $('#reload').click(function (){
                $.ajax({

                    type:'GET',
                    url:'reload-captcha',
                    success:function(data){
                        $(".captcha span").html(data.captcha)
                    }
                });
            });



            $('#supplier_login_in').click(function (){

                var email = $('#email').val();
                var password = $('#password').val();
                var captcha = $('#captcha').val();

                var form_data = new FormData();

                form_data.append('email',email);
                form_data.append('password',password);
                form_data.append('captcha',captcha);


                $ajax({
                     type: "post",

                        processData: false,
                        contentType: false,
                        cache: false,
                        data		: form_data,								
                        headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

                        url			:'/admin.check',
                        success		:function(data){
                            alert("Data has been stored");
                        },
                        error: function(data)
                        {
                            $('body').html(data.responseText);
                        }
                    });
            });

        </script>



</body>

    
</html>