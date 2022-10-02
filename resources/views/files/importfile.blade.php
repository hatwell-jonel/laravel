<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <a href="{{url('/admin_access/student')}}" class="btn btn-primary">back</a>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <form action="{{route('import.studentExcel')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="formFile" class="form-label">Import Excel</label>
                        <input class="form-control" name="file" type="file" id="formFile">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </form>
                  </div>
                  @if(session('status'))
                    <div class="alert alert-success" role="alert">{{session('status')}}</div>
                  @endif

                  @if( isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                  @endif


                  @if(session()->has('failures'))
                    <table class="table table-danger">
                        <tr>
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Errors</th>
                            <th>Value</th>
                        </tr>

                        @foreach(session()->get('failures') as $failure)
                            <tr>
                                <td>{{$failure->row()}}</td>
                                <td>{{$failure->attribute()}}</td>
                                <td>
                                    @foreach($failure->errors() as $error)
                                            <li>{{$error}}</li>
                                    @endforeach
                                </td>
                                <td>
                                    {{$failure->values()[$failure->attribute()]}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                  @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>