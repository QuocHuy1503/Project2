<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('movie.update',['movie' => $movie]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="Title"> Title:</label>
    <input type="text" id="title" name="title"  value="{{$movie -> title }}"><br><br>

    <label for="director">Director:</label>
    <input type="text" id="director" name="director"  value="{{$movie -> director}}"><br><br>

    <label for="cast">Cast:</label>
    <input id="cast" name="cast" rows="4" cols="50"  placeholder="{{$movie -> cast}}" value="{{$movie -> cast}}"></textarea><br><br>

    <label for="description">Description:</label>
    <input id="description" name="description" rows="4" cols="50"  placeholder="{{$movie -> description}}" value="{{$movie -> description}}"></textarea><br><br>

    <label for="duration_min">Duration (Minutes):</label>
    <input type="number" id="duration_min" name="duration_min" min="1"  value="{{$movie -> duration_min}}"><br><br>

    <label for="release_date">Release Date (YYYY-MM-DD):</label>
    <input type="date" id="release_date" name="release_date"  value="{{$movie -> release_date}}"><br><br>

    <label for="language">Language:</label>
    <input type="text" id="language" name="language" maxlength="50"  value="{{$movie -> language}}"><br><br>

    <label for="production_studio">Production Studio:</label>
    <input type="text" id="production_studio" name="production_studio"  value="{{$movie -> production_studio}}"><br><br>

    <button type="submit">Add Movie</button>
    </form>
</body>
</html>