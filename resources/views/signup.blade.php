<!DOCTYPE html>
<html lang="en">
<style>
.form1{
    min-height: 20px;
padding: 19px;
margin-bottom: 20px;
background-color: #f5f5f5;
border: 1px solid #e3e3e3;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
padding-right: 90px;
padding-left: 90px;
padding-top: 40px;
padding-bottom: 40px;
}

.test{
    right: 26px;
    width: 66px;
    height: 34px;
    position: absolute;
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
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

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
                     <li><a href="/logout">Logout</a></li>
                     <li>Welcome , {{Auth::user()->email}}</a></li>
                    @endif

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
    </div>
@endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 text-center">

                <p class="lead">Daftar Sekarang! Mulai Bermain di Lapangan Favorit Anda!</p>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form1">
                {{ Form::open(array('url' => 'daftar','method' => 'post','files' => 'true')) }}
                <label for="ex1">Nama</label>
                {{ Form::text('Nama', null, ['class' => 'form-control','id' => 'dp1']) }}                
                <label for="ex1">Email</label>
                {{ Form::text('email', null, ['class' => 'form-control','id' => 'dp1']) }}
                <label for="ex1">Password</label>
               
               <input type="password" name="password" class="form-control">
                <br>
                <div class="test">
                {{Form::submit('Kuy !',['class' => 'btn btn-primary',])}}
                </div>
<input type="hidden" name="_token" value="{{Session::token()}}">
                {{ Form::close() }}
                
            </div>
        </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
