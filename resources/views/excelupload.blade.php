<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



    <div class="">

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

  
        <form action="{{route('upload-excel')}}" method="POST"  enctype="multipart/form-data" >
            @csrf
        
            <input type="file" name="file"> <br> <br>
        
            <button type="submit">submit</button>
            {{-- <input type="submit"  value="submit"> --}}
        </form>
    </div>


</body>
</html>