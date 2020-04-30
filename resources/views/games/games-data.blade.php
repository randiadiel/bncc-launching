<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/games-css.css')}}">
  <title>Search</title>
</head>
<body>
	<div class="page">
    	<div class="content-container">
          <div class="content" style="width: 12%;">
            <h4 style="color: white;">Player Data</h4>
            <img style="width: 35%;" src="{{asset('assets/underline.png')}}" alt="">
           </div>
           <div class="content-isi montserrat-sb" style="width: 11%; margin: 2%; display: flex; flex-direction: column;">
               <table>
                   <tr>
                       <td><p>Name:</p></td>
                       <td><p>{{$users->nama}}</p></td>
                   </tr>
                   <tr>
                       <td><p>Email:</p></td>
                       <td><p>{{$users->email}}</p></td>
                   </tr>
                   <tr>
                       <td><p>Jurusan:</p></td>
                       <td><p>{{$users->jurusan}}</p></td>
                   </tr>
                   <tr>
                       <td><p>Line ID:</p></td>
                        <td><p>{{$users->lineId}}</p></td>
                   </tr>
                   <tr>
                       <td><p>Phone Number:</p></td>
                       <td><p>{{$users->tlp}}</p></td>
                   </tr>
               </table>
                {{-- <div>
                   <p>Name:</p> <p></p>
                </div>
                <div>
                    <p>Email:</p> <p></p>
                </div>
                <div>
                    <p>Jurusan:</p> <p></p>
                </div>
                <div>
                    <p>Line ID:</p> <p></p>
                </div>
                <div>
                    <p>Phone Number:</p> <p></p>
                </div> --}}

           </div>
           <button style="color: white; " class="button montserrat-sb"><a style="color: white;"href="{{url('/games')}}">OK</a></button>
          </div>
        </div>
    <img src="{{asset('assets/Logo.png')}}" class=" logo-img" alt="" style="width: 100vw; padding: 2%;">
    <img src="{{asset('assets/cloud-star.png')}}" class=" cloud-img"alt="" style="width: 100vw;">
	</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
