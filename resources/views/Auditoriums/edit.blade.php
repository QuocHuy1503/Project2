<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('auditoriums.update',['auditorium' => $auditorium])}}" method="POST">
            @csrf
            @method('PUT')
        Auditorium name:<input type="text" name="name" value="{{$auditorium -> name}}"><br>
        {{-- Seat Number: <input type="number" name="seat_no" min="1" placeholder="{{$auditorium -> seat_no}}"><br> --}}
        <button type="submit">Change</button>
    </form>
</body>
</html>