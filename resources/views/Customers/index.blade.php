<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Phone Number</td>
            <td>Email</td>
            <td>Password</td>
            <td>Status</td>
            <td rowspan="2">Action</td>
        </tr>
        <tr>
            @foreach ($customers as $item)
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endforeach
        </tr>
    </table>
</body>
</html>