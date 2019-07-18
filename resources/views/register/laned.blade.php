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
    <form action="{{url('/register/d')}}" method="post">
        @csrf
        <b>Nama:</b><input type="text" name="nama"><br>
        <b>Email:</b><input type="email" name="email"><br>
        <b>Line ID:</b><input type="text" name="lineId"><br>
        <b>Phone Number:</b><input type="text" name="tlp"><br>
        <b>NIM:</b><input type="text" name="nim"><br>

        <input type="submit">
    </form>
</body>
</html>
