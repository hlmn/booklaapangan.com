<!DOCTYPE html>
<html lang="en">

<head>
<style>
.sub{
    width:10%;
    float:left;
    display:inline-block;
   
}
.form-grup{
    margin-bottom: 15px;
padding-left: 15px;
padding-right: 15px;
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Booklapangan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{ Html::style('css/bootstrap.min.css') }}
            {{ Html::style('css/bootstrap-datepicker.css') }}
            {{ Html::style('css/modern-business.css') }}
    

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">BookLapangan</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/signin') }}">Login</a></li>
                        <li><a href="{{ url('/signup') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/profile">Profil</a>
                            </li>
                            <li>
                                <a href="upload">Manage Fasor</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/logout">Logout</a>
                    </li>

                    @endif
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
           
            
            @for ($i = 0; $i < $jumlah; $i++)
                    @if($i == 0)
                        <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
                    @else
                    <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                    @endif

            @endfor

        </ol>
        <?php $j=0; ?>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            @foreach ($lapangans as $lapangan)
            
            @if ($j==0)
                <div class="item active">
                <div class="fill" style="background-image:url('{{$lapangan->foto}}');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
            @else
            <div class="item">
                <div class="fill" style="background-image:url('{{$lapangan->foto}}');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
            @endif
            <?php $j++; ?>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
 <div class="col-lg-12"><br>
          @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          
                <h1 class="page-header">
                    <small>Tunggu apa lagi? Cari Lapangan!</small>
                </h1>
            </div>
        </div>
        <p></p>
        <div class="well">

        {{ Form::open(array('url' => 'cari','method' => 'get')) }}
    
 <div class="form-grup">

                                 <label for="email">Kota</label>
                                 
                            {{ Form::text('kota', null, ['class' => 'form-control']) }}
                                <!-- <input type="city" class="form-control" id="kota">-->
                            </div> 
                            <div class="col-md-2">
                                <label for="ex1">Tanggal</label>

                          <div class="input-group date" id="tai">
  <input type="text" class="form-control" name="tgl" ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>
                            </div>
                            
                                     <div class="col-md-2">
                              <label for="ex1">Jam Mulai Bermain</label>
                                <select name="start" class="form-control">
                                <option disabled selected>Waktu Mulai</option>
                                <option value="05:00:00">05:00</option>
                                <option value="06:00:00">06:00</option>
                                <option value="07:00:00">07:00</option>
                                <option value="08:00:00">08:00</option>
                                <option value="09:00:00">09:00</option>
                                <option value="10:00:00">10:00</option>
                                <option value="11:00:00">11:00</option>
                                <option value="12:00:00">12:00</option>
                                <option value="13:00:00">13:00</option>
                                <option value="14:00:00">14:00</option>
                                <option value="15:00:00">15:00</option>
                                <option value="16:00:00">16:00</option>
                                <option value="17:00:00">17:00</option>
                                <option value="18:00:00">18:00</option>
                                <option value="19:00:00">19:00</option>
                                <option value="20:00:00">20:00</option>
                                <option value="21:00:00">21:00</option>
                                <option value="22:00:00">22:00</option>
                                <option value="23:00:00">23:00</option>
                    
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="ex1">Jam Selesai Bermain</label>
                              <select name="end" class="form-control">
                                <option disabled selected>Waktu Selesai</option>
                                <option value="06:00:00">06:00</option>
                                <option value="07:00:00">07:00</option>
                                <option value="08:00:00">08:00</option>
                                <option value="09:00:00">09:00</option>
                                <option value="10:00:00">10:00</option>
                                <option value="11:00:00">11:00</option>
                                <option value="12:00:00">12:00</option>
                                <option value="13:00:00">13:00</option>
                                <option value="14:00:00">14:00</option>
                                <option value="15:00:00">15:00</option>
                                <option value="16:00:00">16:00</option>
                                <option value="17:00:00">17:00</option>
                                <option value="18:00:00">18:00</option>
                                <option value="19:00:00">19:00</option>
                                <option value="20:00:00">20:00</option>
                                <option value="21:00:00">21:00</option>
                                <option value="22:00:00">22:00</option>
                                <option value="23:00:00">23:00</option>
                                <option value="24:00:00">24:00</option>
                                 



                              </select>
                            </div>                     
                            <div class="col-md-2">
                              <label for="ex1">Jenis Lapangan</label>
                          
                              {{ Form::select('lapangan', $items, null, ['class' => 'form-control']) }}
                              
                        </div>
                        <div class="col-xs-1">
                            <label for="ex1"><br></label>
                            <br>
                        {{Form::submit('Kuy !',['class' => 'btn btn-primary'])}}
                        </div>
        

                      <!--  <form>
                            <div class="form-grup">
                                 <label for="email">Kota</label>
                                 <input type="city" class="form-control" id="kota">
                            </div> 
                            <div class="col-md-2">
                                <label for="ex1">Tanggal</label>
                                <input type="text" class="form-control" value="02-16-2012" id="dp1">
                            </div>
                            <div class="col-md-2">
                            <label for="ex1">Tanggal</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-xs-1">
                            <label for="ex1"><br></label>
                            <br>
                            <button type="submit" class="btn btn-primary">Primary</button>
                        </div>
                    </form>-->{{ Form::close() }}
                    <br><br><br>

                </div>
                <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Booklapangan 2016</p>
                </div>
            </div>
        </footer>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
     



    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="booklapangan.cjs/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

   <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>



  <script>
$(function(){
    $('#tai').datepicker({
      startDate: "d",
      format: "yyyy-mm-dd",
      orientation: "top auto",
      autoclose: true,
      todayHighlight: true
    });
});
  </script>

    <!-- jQuery -->
 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
