<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('auditoriums.create')}}">CREATE</a>
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Seat number</td>
            <td>Action 1</td>
            <td>Action 2</td>
        </tr>
        @foreach ($auditorium as $item)
            <tr>
                <td>{{$item -> id}}</td>
                <td>{{$item -> name}}</td>
                <td>{{$item -> seat_no}}</td>
                <td><a href="{{route('auditoriums.edit',['auditorium' => $item])}}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('auditoriums.destroy',['auditoriums' => $item])}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE"/>
                    </form>
                </td> 
            </tr>
        @endforeach
        
    </table>
</body>
</html>