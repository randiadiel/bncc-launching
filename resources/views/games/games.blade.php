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
          <div class="content">
             <div class="title montserrat-sb">
              <h4 style="align-self: center;">Input Your NIM</h4>
            </div>
        <form action="{{url('/games/user')}}" method="post">
            @csrf
            <div class="input">
                <input class="monserrat-sb" type="text" name="nim" placeholder="NIM">
                <button class="button montserrat-sb"  type="submit">Submit</button>

            </div>
        </form>
          </div>
        </div>
    <img src="{{asset('assets/Logo.png')}}" class=" logo-img" alt="">
    <img src="{{asset('assets/cloud-star.png')}}" class=" cloud-img"alt="">
	</div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
