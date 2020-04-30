<!-- IMAGE PRELOADER -->
<img src="{{asset('assets/regis-bg-low.jpg')}}" style="display: none;">
<img src="{{asset('assets/regis-artwork-compressed.png')}}" style="display: none;">
<img src="{{asset('assets/BNCC-black-compressed.png')}}" style="display: none;">
<img src="{{asset('assets/gojek-compressed.png')}}" style="display: none;">
<!-- END OF PRELOADER -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('css/library/bootstrap.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('css/register-style.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('css/library/animate.min.css')}}">
</head>

<body>
    <div class="background-wrapper">
        <div class="card animated fadeIn faster m-5">
            <!-- <span id="image-loader"></span> -->
            <div class="card-body my-4">
                <div class="row">
                    <div class="col-lg-6 px-5">
                        <h2 class="card-title text-center">Join Us Now !</h2>
                        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                        <form class="my-4" action="{{url('/register/b/post')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <input type="hidden" autocomplete="false">
                            <div class="form-group">
                                @if ($errors->has('bnccId'))
                                    <span class="text-danger">{{ $errors->first('bnccId') }}</span>
                                @endif
                                <input type="text" name="bnccId" placeholder="BNCC ID" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'BNCC ID'" value="{{ old('bnccId') }}" autofocus required>
                                <label class="animated fadeIn" for="bnccId">BNCC ID</label>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <input id="input-name" type="text" name="nama" placeholder="Name" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'"  value="{{ old('nama') }}" onkeydown="validateIsName(event)" required>
                                <label class="animated fadeIn" for="nama">Name</label>
                            </div>

                            <div class="form-group">
                                @if ($errors->has('nim'))
                                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                                @endif
                                <input type="text" name="nim" placeholder="NIM" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIM'" value="{{ old('nim') }}"  onkeydown="validateIsNIM(event)" required>
                                <label class="animated fadeIn" for="nim">NIM</label>
                            </div>
                            <div class="form-group">
                                    @if ($errors->has('jurusan'))
                                        <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                                    @endif
                                    <input type="text" name="jurusan" placeholder="Jurusan" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jurusan'" value="{{ old('jurusan') }}" required>
                                    <label class="animated fadeIn" for="jurusan">Jurusan</label>
                                </div>
                            <div class="form-group">
                                @if ($errors->has('tlp'))
                                    <span class="text-danger">The Phone Number has already been taken</span>
                                @endif
                                <input type="text" name="tlp" placeholder="Phone" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'"  onkeydown="validateIsPhone(event)" value="{{ old('tlp') }}" required>
                                <label class="animated fadeIn" for="tlp">Phone</label>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('lineId'))
                                    <span class="text-danger">{{ $errors->first('lineId') }}</span>
                                @endif
                                <input type="text" name="lineId" placeholder="Line ID" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Line ID'" value="{{ old('lineId') }}" required>
                                <label class="animated fadeIn" for="lineId">Line ID</label>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input type="text" name="email" placeholder="Email" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" onkeyup="validateIsEmail(event)" value="{{ old('email') }}" required>
                                <label class="animated fadeIn" for="email">Email</label>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('payment'))
                                    <span class="text-danger">{{ $errors->first('payment') }}</span>
                                @endif
                                    <div>
                                            <input id="cash" class="radio-button" name="payment" value="cash" type="radio"  onclick="handleRadioChange(this);">
                                            <label for="cash">Cash</label>
                                    </div>
                                    <div>
                                            <input id="transfer" class="radio-button" name="payment" value="transfer" type="radio" onclick="handleRadioChange(this);">
                                            <label for="transfer">Transfer</label>
                                    </div>
<h6>Cara Pembayaran</h6>
                            </div>
                            <div class="form-group">
                                @if ($errors->has('pembayar'))
                                    <span class="text-danger">{{ $errors->first('pembayar') }}</span>
                                @endif
                                <input type="text" name="pembayar" placeholder="Atas Nama" class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Atas Nama'" value="{{ old('pembayar') }}" required>
                                <label class="animated fadeIn" for="pembayar"> Ata sNama </label>
                            </div>
                            <div class="form-group">
                                    <select class="form-input" name="schedule_id" id="">
<option class="form-input" value="">--Pilih Materi--</option>
                                    @foreach($schedules as $schedule)
                                        @if($schedule->increments < 50)
                                            <option class="form-input" value="{{$schedule->id}}">{{ \Carbon\Carbon::parse($schedule->jadwal)->format('d M Y, h:i:s a') }} {{50 - $schedule->increments }} Slot Lefts</option>
                                        @endif
                                    @endforeach
                                    </select>
                                <label class="animated fadeIn" for="">Choose Your Schedule</label>
                            </div>
                            <div class="form-group">
                                <select class="form-input" name="materi" id="" placeholder="Pilih Materi">
                                        <option class="form-input" value="">--Pilih Materi--</option>
                                        <option class="form-input" value="UI/UX">UI/UX</option>
                                        <option class="form-input" value="Web Design">Web Design</option>
                                        <option class="form-input" value="Web Programming">Web Programming</option>
                                        <option class="form-input" value="Java Programming">Java Programming</option>
                                        <option class="form-input" value="Mobile Application">Mobile Application</option>
                                </select>
                            <label class="animated fadeIn" for="">Choose Your Course</label>
                        </div>

                            <input type="submit" class="btn btn-primary btn-md mt-3 mx-auto" value="Register">
                        </form>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="left-register-container container px-1">
                            <img id="bncc-logo" class="img-fluid mx-auto bncc-logo w-100" src="{{asset('assets/BNCC-black-compressed.png')}}" alt="">
                            <div class="py-3"><img class="img-fluid mx-auto gojek-logo mt-2 w-50 d-block" src="{{asset('assets/gojek.png')}}" alt=""><h4 class="text-center">Official Learning Partner</h4></div>
                            <img class="img-fluid px-2 py-4 artwork-img animated fadeInUp" src="{{asset('assets/regis-artwork-compressed.png')}}" alt="">
                            <h4 class="text-center">See You at BNCC Launching</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- POSTLOADER -->
<img id="regis-bg-high" src="{{asset('assets/regis-bg.jpg')}}" style="display: none;" alt="">
<!-- END OF POSTLOADER -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('js/library/jquery.min.js')}}"></script>
    <script src="{{url('js/library/popper.min.js')}}"></script>
    <script src="{{url('js/library/bootstrap.min.js')}}"></script>
    <script src="{{url('js/register-validator.js')}}"></script>
    <script>
            $("#regis-bg-high").attr({src: "assets/regis-bg.jpg"}).on("load", function() {
                $("body").css("background-image", "url('assets/regis-bg.jpg')");
            });
    </script>
    <script>
        function handleRadioChange(myradio){
            if(myradio.id == "cash"){
                $("#payment-slip").attr("disabled", "disabled");
            }
            else {
                $("#payment-slip").removeAttr("disabled");
            }
        }
    </script>
</body>

</html>
