<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Registrasi</h1>
    <form action="{{url('/user/update')}}" method="post">
        @csrf
        <b>Nama:</b><input type="text" name="nama" value="{{$register->nama}}"><br>
        <b>BNCC ID:</b><input type="email" name="bnccId" value="{{$register->bnccId}}"><br>
        <b>Email:</b><input type="email" name="email" value="{{$register->email}}"><br>
        <b>Jurusan:</b><input type="text" name="jurusan" value="{{$register->jurusan}}"><br>
        <b>Line ID:</b><input type="text" name="lineId" value="{{$register->lineId}}"><br>
        <b>Phone Number:</b><input type="text" name="tlp" value="{{$register->tlp}}"><br>
        <b>NIM:</b><input type="text" name="nim" value="{{$register->nim}}"><br>
        <b>Payment:</b><input type="radio" name="payment" value="cash" ><label for="">Cash</label>
        <input type="radio" name="payment" value="transfer"><label for="">Transfer</label><br>
        <label for="">Pilih Jadwal:</label>
        <select>
                <option>{{\Carbon\Carbon::parse($register->schedule->jadwal)->format('d M Y, h:i:s a')}} </option>
            @foreach ($schedules as $item)
          @if($register->schedule->id == $item->id)
                @continue
          @else

    <option value="{{$item->id}}">{{ \Carbon\Carbon::parse($item->jadwal)->format('d M Y, h:i:s a') }}
    </option>
    @endif
            @endforeach
        </select>
        <input type="submit">
    </form>
</body>
</html>
