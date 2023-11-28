<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/images">
    <title>..:: Admin - Register Portal ::..</title>
</head>
<body>
    <div class="img-centre-two">
      <a href="#"><img src="/assets/img/logo.jpg" ></a>  
    </div>
   
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="{{ route('admin.save') }}" class="mt-3 border p-4 bg-light shadow" method="POST">
                        @csrf
                        <h2 class="mb-5 text-primary" style="text-align: center">COMESA ADMIN REGISTER PORTAL</h2>

                        @if (Session::get('success'))
                           <div class="alert alert-success">
                            {{Session::get('success')}}
                           </div>
                        @endif

                        @if (Session::get('fail'))
                           <div class="alert alert-danger">
                            {{Session::get('fail')}}
                           </div>
                        @endif


                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label>Username<span class="text-danger">*</span></label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" value="{{old('username')}}" required>
                                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>User Role<span class="text-danger">*</span></label>
                                <select name="user_role" id="user_role" class="form-control">
                                    @foreach ($user_roles as $user_role)
                                    <option  value="{{$user_role->user_name}}">{{$user_role->user_name}}</option>    
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" value="{{old('username')}}" required> --}}
                                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}" required>
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                           
                            <div class="col-md-12">
                               <button class="btn btn-primary float-end" >Register Admin</button>
                            </div>
                        </div>
                    </form>
                    {{-- <p class="text-center mt-3 text-secondary">If you don't have account, Please <a href="#">Signup Now</a></p> --}}
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript"></script>
    <script src="/assets/js/jquery.min.js"></script>

     <script>
           


     $('#supplier_sign_in').click(function(){

        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var user_role = $('#user_role').val();
        

        var form_data = new FormData();

        form_data.append('email',email);
        form_data.append('username',username);
        form_data.append('password',password);
        form_data.append('user_role',user_role);

                    $ajax({
                     type: "post",

                        processData: false,
                        contentType: false,
                        cache: false,
                        data		: form_data,								
                        headers		:{	'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},

                        url			:'/admin.save',
                        success		:function(data){
                            if(data.status){
                                alert(data.message);
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