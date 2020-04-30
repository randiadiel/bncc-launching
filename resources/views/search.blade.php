<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <html lang="en">
                <head>
                  <meta charset="UTF-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
                  <title>Admin Panel</title>
                  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                  <link rel="stylesheet" type="text/css" href="{{url('css/admin.css')}}"/>

                </head>
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
                          <a class="nav-link" href="{{url('/search')}}"
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
                    <div class="search-content">
                      <form action="{{url('/search')}}" method="post" role="search" class="form-inline my-2 my-lg-0">
                        @csrf
                        <input
                          class="form-control mr-sm-2"
                          type="search"
                          placeholder="Search"
                          aria-label="Search"
                          name="search"
                        />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                          Search
                        </button>
                      </form>
                    </div>

                    <div class="table-content">
                            @if(isset($details))
                            <p>the search results <b>{{$query}}</b> are:</p>
                            <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">BNCC ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Line ID</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Jadwal</th>
                                    <th scope="col">Lane</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($details as $register)
                                <tr>
                                    <td>{{$register->nama}}</td>
                                    <td>{{$register->jurusan}}</td>
                                    <td>{{$register->bnccId}}</td>
                                    <td>{{$register->email}}</td>
                                    <td>{{$register->lineId}}</td>
                                    <td>{{$register->tlp}}</td>
                                    <td>{{$register->payment}}</td>
                                    <td>{{$register->nim}}</td>
                                    <td>{{$register->schedule->jadwal}}</td>
                                    <td>{{$register->lane}}</td>
                                    <td><a href="{{url('register/'.$register->id.'/edit')}}">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            @elseif(isset($message))
                            <p>{{$message}}</p>
                            @endif
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

