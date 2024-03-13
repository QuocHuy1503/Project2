<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('genres.create')}}">CREATE</a>
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
        </tr>
        @foreach ($tag as $item)
            <tr>
                <td>{{$item -> id}}</td>
                <td>{{$item -> name}}</td>
                <td><a href="{{route('genres.edit',['genre' => $item])}}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('genres.destroy',['genre' => $item])}}">
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