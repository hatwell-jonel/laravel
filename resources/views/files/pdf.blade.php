<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
            <thead>
            <tr>
                <th scope="col">Student #</th>
                <th scope="col">firstname</th>
                <th scope="col">middlename</th>
                <th scope="col">lastname</th>
                <th scope="col">contact</th>
                <th scope="col">email</th>
                <th scope="col">gender</th>
                <th scope="col">birthdate</th>
                <th scope="col">birthplace</th>
                <th scope="col">address</th>
            </tr>
            </thead>
            @if(count($students) >= 1)
            <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td><a href="/students/{{$student->id}}">{{ $student->student_id}}</a></td>
                            <td>{{ $student->firstname}}</td>
                            <td>{{ $student->middlename}}</td>
                            <td>{{ $student->lastname}}</td>
                            <td>{{ $student->contact}}</td>
                            <td>{{ $student->email}}</td>
                            <td>{{ $student->gender}}</td>
                            <td>{{ $student->birthdate}}</td>
                            <td>{{ $student->birthplace}}</td>
                            <td>{{ $student->address}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
</body>
</html>