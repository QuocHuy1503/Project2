<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('auditoriums.store')}}" method="POST">
        @csrf
        Auditorium name:<input type="text" name="name"><br>
        Seat Number: <input type="number" name="seat_no"><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>