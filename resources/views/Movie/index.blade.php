<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('movie.create')}}">CREATE</a>

    <table>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Director</td>
            <td>Cast</td>
            <td>Description</td>
            <td>Duration_min</td>
            <td>Release Date</td>
            <td>Language</td>
            <td>Production Studio</td>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{$movie -> id}}</td>
            <td>{{$movie -> title}}</td>
            <td>{{$movie -> director}}</td>
            <td>{{$movie -> cast}}</td>
            <td>{{$movie -> description}}</td>
            <td>{{$movie -> duration_min}} minute</td>
            <td>{{$movie -> release_date}}</td>
            <td>{{$movie -> language}}</td>
            <td>{{$movie -> production_studio}}</td>
            <td><a href="{{route('movie.edit',['movie' => $movie])}}">Edit</a></td>
            <td>
                <form method="post" action="{{ route('movie.destroy',['movies' => $movie])}}">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>