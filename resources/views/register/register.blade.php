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
    <form action="{{url('/register/'.$user->id.'/update')}}" method="post">
        @csrf
        <b>Nama:</b><input type="text" name="nama" value="{{$user->nama}}"><br>
        <b>BNCC ID:</b><input type="text" name="bnccId" value="{{$user->bnccId}}"><br>
        <b>Email:</b><input type="email" name="email" value="{{$user->email}}"><br>
        <b>Line ID:</b><input type="text" name="lineId" value="{{$user->lineId}}"><br>
        <b>Phone Number:</b><input type="text" name="tlp" value="{{$user->tlp}}"><br>
        <b>NIM:</b><input type="text" name="nim" value="{{$user->nim}}"><br>

        <input type="submit">
    </form>
</body>
</html>
