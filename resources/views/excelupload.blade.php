<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="/assets/css/style.css">
<title>welcome to Bootstrap</title>
</head>
<body>


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

            @if (Session::has('import_errors'))
                    @foreach (Session::get('import_errors') as $failure)
                        <div class="alert alert-danger">
                            {{$failure->errors()[0]}} at line  {{$failure->row()}}
                        </div>
                    @endforeach
            @endif
  
        <form action="{{route('upload-excel')}}" method="POST"  enctype="multipart/form-data" >
            @csrf
        
            <input type="file" name="file"> <br> <br>
        
            <button type="submit">submit</button>
            {{-- <input type="submit"  value="submit"> --}}
        </form>
    </div>


</body>
</html>