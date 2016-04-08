<!DOCTYPE html>
<html lang="en">
<style>

.test{
    right: 26px;
    width: 66px;
    bottom:14%;
    height: 34px;
    position: absolute;
}
.fasilitas{
    max-height: 38%;

}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Booklapangan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
         @section('css')
            {{ Html::style('css/bootstrap.min.css') }}
           
            {{ Html::style('css/shop-homepage.css') }}
        @show


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

    <!-- Page Content -->

    <div class="container">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
 
                        <a href="/cari">About</a>

    </div>

@endif
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Detail Pemesanan</p>
                <div class="well">
                <div class="list-group">
                    @foreach($nm_fsrs as $nm_fsr)
                        Tempat : {{$nm_fsr->NAMA_FASOR}}
                        <br>
                    @endforeach
                    Tanggal : {{$tgl}}<br>
                    Jam Main : {{$start}}<br>
                    Jam Selesai : {{$end}}<br>
                </div>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            @for ($i = 0; $i < $jumlah; $i++)
                            @if($i == 0)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
                            @else
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                            @endif
                            @endfor
                            </ol>
                            <div class="carousel-inner">
                            <?php $j=0; ?>
                             @foreach ($shows as $show)
            
                                @if ($j==0)
                                <div class="item active">
                                    <img style="max-height: 562px"class="slide-image" src="http://booklapangan.com/{{$show->foto}}" alt="">
                                </div>
                                @else
                                <div class="item">
                                    <img style="max-height: 562px" class="slide-image" src="http://booklapangan.com/{{$show->foto}}" alt="">
                                </div>
                                @endif
                                        <?php $j++; ?>
                                @endforeach

                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>




                <div class="row">
                    @foreach ($shows as $show)
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img style="width: 100%;height: 200px"src="http://booklapangan.com/{{$show->foto}}" alt="">
                                <div class="caption">
                                <h4><a href="#">{{$show->NAMA_LAP}}</a></h4>
                                    @foreach ($prices as $price)
                                        @if ($show->ID_LAP == $price->ID_LAP )
                                            @if($start < $price->MULAI && $end > $price->SELESAI)
                                               {{$price->MULAI}} - {{$price->SELESAI}}: {{$price->HARGA}}
                                            @elseif ($start < $price->SELESAI && $end >$price->SELESAI)
                                               {{$start}} - {{$price->SELESAI}}: {{$price->HARGA}}/jam 
                                            @elseif ($end > $price->MULAI && $start < $price->MULAI)
                                                {{$price->MULAI}} - {{$end}}: {{$price->HARGA}}/jam
                                            @elseif ($price->MULAI < $end && $price->SELESAI > $start)
                                                {{$start}} - {{$end}}: {{$price->HARGA}}/jam
                                            @endif
                                        @endif
                                    @endforeach
                                    
                                   

                                    
                                   <!-- <div class="fasilitas">
                                    Fasilitas:
                                    
                                    @foreach ($fasilitas as $fas) 
                                        @if ($show->ID_LAP == $fas->ID_LAP )
                                        {{$fas->NAMA_FAS}}
                                        @endif
                                    @endforeach
                                    </div>-->
                                    <div class="test">
                                    <form action="/booking" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_lap" value="{{$show->ID_LAP}}">
                                        <input type="hidden" name="id_fasor" value="{{$show->ID_FASOR}}">
                                        <input type="hidden" name="start" value="{{$start}}">
                                        <input type="hidden" name="end" value="{{$end}}">
                                        <input type="hidden" name="tgl" value="{{$tgl}}">
                                        <input type="hidden" name="Language" value="English">
                                        <input type="hidden" name="Language" value="English">

                                        <input type="submit" class="btn btn-primary" value="Pesan"></form>
                                    </div>
                                </div>

                                <div class="ratings">
                                    <p class="pull-right">15 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                

        <br>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

{{ Html::script('js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
{{ Html::script('js/bootstrap.min.js') }}

</body>

</html>
