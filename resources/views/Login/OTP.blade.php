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
                    <form action="{{ route('admin-verify-otp') }}" class="mt-5 border p-4 bg-light shadow" method="POST">
                        @csrf
                        <h2 class="mb-5 text-success" style="text-align: center">OTP HAS BEEN SENT TO YOU'RE EMAIL</h2>
                        <h3 style="color: red" class="mb-2"> OTP sent to : {{$user_check_email}}</h3>
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

                     <input type="hidden" name="hidden_otp" id="hidden_otp" value={{$user_id_check}}>

                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label>Enter OTP for validation : <span class="text-danger">*</span></label>
                                <input type="number" name="verify_otp" id="verify_otp" class="form-control" placeholder="Enter OTP Sent" value="{{old('otp')}}" >
                                <span class="text-danger">@error('verify_otp'){{$message}}@enderror</span>
                            </div>

                           
                            <div class="col-md-12">
                               <button type="submit" class="btn btn-primary float-end" id="admin_verify_otp_btn">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript"></script>
    <script src="/assets/js/jquery.min.js"></script>

     <script>

            $('#admin_verify_otp_btn').click(function (){

                var verify_otp = $('#verify_otp').val();
                var hidden_otp = $('#hidden_otp').val();


                if(verify_otp == ""){
                    alert("Please enter OTP token before submitting");
                    
                    return false;
                }


                var form_data = new FormData();

                form_data.append('verify_otp',verify_otp);
                form_data.append('hidden_otp',hidden_otp);

                $ajax({

                        type: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        data		: form_data,								
                        headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

                        url			:'/admin-verify-otp',
                        success		:function(data){
                            values = data;
                            if(values.status){
								alert(values.message);
							}
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