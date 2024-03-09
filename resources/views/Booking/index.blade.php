<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css    ">
</head>
<body>
    <form action="{{route('booking.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        {{--Choosing auditorium--}}
        @foreach ($auditoriums as $auditorium)
        <input type="radio" name="id" value="{{ $auditorium-> id }}"> {{ $auditorium->name }}<br>
        @endforeach
        <button type="submit">Submit</button>
    {{--end of auditorium--}}
      {{--Choosing seats--}}
      <table>
        <thead>
          <tr>
            <th>Hàng</th>
            <th>Số ghế</th>
          </tr>
        </thead>
      
        <tbody>
          @foreach ($seats as $seat)
            <tr>
              <td>{{ $seat->hang }}</td> <td>
                        @for ($i = 1; $i <= $seat->so_ghe; $i++)
                            <a href="" class="text-primary text-decoration-none" style="text-decoration: none"><i class="fa-solid fa-chair"></i> &nbsp;</a> 
                        @endfor
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    {{--end of seats--}}
    {{---Chosing payment method--}}
    {{--end of payment method--}}
    </form>
</body>
</html>