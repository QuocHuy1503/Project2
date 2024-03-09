<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="Title"> Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="director">Director:</label>
    <input type="text" id="director" name="director" required><br><br>

    <label for="cast">Cast (Separate with commas):</label>
    <textarea id="cast" name="cast" rows="4" cols="50" required></textarea><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

    <label for="duration_min">Duration (Minutes):</label>
    <input type="number" id="duration_min" name="duration_min" min="1" required><br><br>

    <label for="release_date">Release Date (YYYY-MM-DD):</label>
    <input type="date" id="release_date" name="release_date" required><br><br>

    <label for="language">Language:</label>
    <input type="text" id="language" name="language" maxlength="50" required><br><br>

    <label for="production_studio">Production Studio:</label>
    <input type="text" id="production_studio" name="production_studio" required><br><br>

    <button type="submit">Add Movie</button>
    </form>
</body>
</html>