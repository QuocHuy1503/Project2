<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('genres.update',['genre' => $genre])}}" method="POST">
        
        @csrf
        @method('PUT')
        Genre name: <input type="text" name="name" value="{{ $genre -> name}}">
        <button type="submit">Edit</button>
    </form>
</body>
</html>