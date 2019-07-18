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
    <form action="{{url('/register/a')}}" method="post">
        @csrf
        <b>Nama:</b><input type="text" name="nama"><br>
        <b>BNCC ID:</b><input type="text" name="bnccId"><br>
        <b>Email:</b><input type="email" name="email"><br>
        <b>Line ID:</b><input type="text" name="lineId"><br>
        <b>Phone Number:</b><input type="text" name="tlp"><br>
        <b>NIM:</b><input type="text" name="nim"><br>

        <input type="submit">
    </form>
    <div class="col-md-4">
            <form action="/search" method="post" role="search">
                @csrf
                <div class="input-group">
                    <input type="search" name="search" class="form-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>
        @if(isset($registers))
        <p>the search results are:</p>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>BNCC_ID</th>
                <th>Email</th>
                <th>Line ID</th>
                <th>Phone Number</th>
                <th>NIM</th>
                <th>Lane</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($registers as $register)
            <tr>
                <td>{{$register->nama}}</td>
                <td>{{$register->bnccId}}</td>
                <td>{{$register->email}}</td>
                <td>{{$register->lineId}}</td>
                <td>{{$register->tlp}}</td>
                <td>{{$register->nim}}</td>
                <td>{{$register->lane}}</td>
                <td><a href="{{url('register/'.$register->id.'/edit')}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{$message}}</p>
    @endif
</body>
</html>
