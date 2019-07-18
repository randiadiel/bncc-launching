<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                @foreach($users as $user)
                <tr>
                    <td>{{$user->nama}}</td>
                    <td>{{$user->bnccId}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->lineId}}</td>
                    <td>{{$user->tlp}}</td>
                    <td>{{$user->nim}}</td>
                    <td>{{$user->lane}}</td>
                    <td><a href="{{url('register/'.$user->id.'/edit')}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
