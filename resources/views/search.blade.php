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
@if(isset($details))
<p>the search results <b>{{$query}}</b> are:</p>
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
    </tr>
</thead>

<tbody>
    @foreach($details as $register)
    <tr>
        <td>{{$register->nama}}</td>
        <td>{{$register->bnccId}}</td>
        <td>{{$register->email}}</td>
        <td>{{$register->lineId}}</td>
        <td>{{$register->tlp}}</td>
        <td>{{$register->nim}}</td>
        <td>{{$register->lane}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@elseif(isset($message))
<p>{{$message}}</p>
@endif
</body>
</html>
