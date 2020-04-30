<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Panel</title>

    <link rel="stylesheet" type="text/css" href="{{url('css/admin.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand text-white" href="#">ADMIN</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="admin.html"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a
              class="nav-link disabled"
              href="#"
              tabindex="-1"
              aria-disabled="true"
              >Disabled</a
            >
          </li>
        </ul>
      </div>
    </nav>
    <div class="content">

      <div class="edit-content">
        <h3>Edit Data</h3>
        <form action="{{url('/register/'.$users->id.'/update')}}" method="post" enctype="multipart/form-data">
          @csrf
          <table class="table">
            <tr>
                @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
              <td>Name</td>
              <td><input type="text" name="nama" value="{{$users->nama}}"></td>
            </tr>
            <tr>
                @if ($errors->has('bnccId'))
                    <span class="text-danger">{{ $errors->first('bnccId') }}</span>
                @endif
              <td>BNCC ID</td>
              <td><input type="text" name="bnccId" value="{{$users->bnccId}}"></td>
            </tr>
            <tr>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              <td>Email</td>
              <td><input type="email" name="email" value="{{$users->email}}"></td>
            </tr>
            <tr>
                @if ($errors->has('jurusan'))
                    <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                @endif
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="{{$users->jurusan}}"></td>
              </tr>

            <tr>
                @if ($errors->has('lineId'))
                    <span class="text-danger">{{ $errors->first('lineId') }}</span>
                @endif
              <td>Line Id</td>
              <td><input type="text" name="lineId" value="{{$users->lineId}}"></td>
            </tr>
            <tr>
                @if ($errors->has('tlp'))
                    <span class="text-danger">The Phone Number has already been taken</span>
                @endif
              <td>Phone Number</td>
              <td><input type="text" name="tlp" value="{{$users->tlp}}"></td>
            </tr>
            <tr>
                @if ($errors->has('nim'))
                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                @endif
              <td>NIM</td>
              <td><input type="text" name="nim" value="{{$users->nim}}"></td>
            </tr>
            <tr>
                <td>Jadwal</td>.
                <td>
<input type="hidden"  name="decrements" value="{{$users->schedule->id}}">
                    <select class="form-input" name="schedule_id" id="">
                    <option value="{{$users->schedule->id}}">{{\Carbon\Carbon::parse($users->schedule->jadwal)->format('d M Y, h:i:s a')}} </option>
                        @foreach ($schedules as $item)
                            @if($users->schedule->id == $item->id)
                            @continue
                        @else
                        <option value="{{$item->id}}">{{ \Carbon\Carbon::parse($item->jadwal)->format('d M Y, h:i:s a') }}
                        </option>
                        @endif
                        @endforeach
                    </select>

            </td>
            </tr>
            <tr>
              <td>Payment</td>
              <td>
                <input type="radio" name="payment" value="cash" /> Cash
                <input type="radio" name="payment" value="transfer"/> Credit
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="" id="" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
