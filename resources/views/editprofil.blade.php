<!DOCTYPE html>
<html lang="en">
<style>
.form1{
min-height: 20px;
padding: 67px;
margin-bottom: 20px;
background-color: #f5f5f5;
border: 1px solid #e3e3e3;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
box-shadow: inset 0 1px 1px rgba(0,0,0,.05);

padding-top: 40px;
padding-bottom: 40px;
position:relative;
}

.test{
    right: 26px;
    width: 66px;
    height: 34px;
    position: absolute;
}

.babi{
    width: 100%;
    float: left;
    position: relative;
    min-height: 20px;

}



.ibab {
    width: 35%;
    position: relative;
    
    float: left;
    padding-right: 15px
}
.ukuran{
    width:100%;

}

}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

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
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Edit Profil</h1>
                <br>
                <br>
            </div>
        </div>
            <div class="col-md-6">
              <div class="form1" >
                        <h3>Edit Profil Mu</h3>
                        <div id="namahide">
                            <label>Nama:</label>
                            {{Auth::user()->name}}
                            <a href="#nama" id="nama">edit</a>
                        </div>
                        <div id="name">
                    
                    <strong>Nama Lama : </strong>{{Auth::user()->name}}
                   
                    <form action="changename" method="POST">
                    
                    <label>Masukkan Nama Baru</label>
                    <input type="text" class="form-control" style="width: 50%" name="nama" placeholder="Nama"></input><br>
                    


                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Submit" name="test"  style="float: left;" class="btn btn-primary">
                </form>                             
                        <input type="submit" value="Cancel" name="test"  style="float: left; right: 0px;" class="btn btn-danger" id="cancelnama">
                        <br><br>

                       
                        </div>
                        
                        <div id="emailhide">
                            <label>Email:</label>
                            {{Auth::user()->email}}
                            <a href="#email" id="email">edit</a>
                        </div> 
                        <div id="tot"  >                
                            <strong>Email Lama : </strong>{{Auth::user()->email}}
                           
                            <form action="changeemail" method="POST">
                            
                            <label>Masukkan Email Baru</label>
                            <input type="email" class="form-control" style="width: 50%" name="email" placeholder="Email "></input><br>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" value="Submit" name="test"  style="float: left;" class="btn btn-primary">
                            </form>
                            <input type="submit" value="Cancel" name="test"  style="float: left; right: 0px;" class="btn btn-danger" id="cancelemail">
                            <br><br>
                        </div>

                        <div id="handphonehide">
                            <label>Handphone:</label>
                            {{Auth::user()->handphone}}
                            <a href="#handphone" id="handphone">edit</a>
                        </div>
                        <div id="hp">
                            <strong>Handphone Lama : </strong>{{Auth::user()->name}}
                           
                            <form action="changehp" method="POST">
                            
                            <label>Masukkan Handphone Baru</label>
                            <input type="text" class="form-control" style="width: 50%" name="handphone" placeholder="No. Handphone"></input><br>
                            


                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" value="Submit" name="test"  style="float: left;" class="btn btn-primary">
                            </form>
                            <input type="submit" value="Cancel" name="test"  style="float: left; right: 0px;" class="btn btn-danger" id="cancelhp">
                            <br><br>
                        </div>
                                
                    

                   
                </div>
            </div>
            <div class="col-md-6">
              <div class="form1" >
                    <form action="/changepassword" method="POST" enctype="multipart/form-data">
                        <h3>Edit Profil Mu</h3>
                        <label>Password Lama</label>
                        {{ Form::password('old_password', ['class'=>'form-control']) }}
                        <label>Password Baru</label>
                        {{ Form::password('password', ['class'=>'form-control']) }}
                        <label>Konfirmasi Password Baru</label>
                        {{ Form::password('password_confirmation', ['class'=>'form-control']) }}

                        <br>           
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                    </form>
                </div>
            </div>


    </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
    $("#tot").hide();
    $("#hp").hide();
    $("#name").hide();
    $("#email").click(function(){
        $("#tot").show();
        $("#hp").hide();
        $("#handphonehide").show();
        $("#name").hide();
        $("#namahide").show();
        $("#emailhide").hide();
    });
    $("#cancelemail").click(function(){
        $("#tot").hide();
        $("#emailhide").show();
    });
    $("#handphone").click(function(){
        $("#hp").show();
        $("#tot").hide();
        $("#emailhide").show();
        $("#name").hide();
        $("#namahide").show();
        $("#handphonehide").hide();
    });
    $("#cancelhp").click(function(){
        $("#hp").hide();
        $("#handphonehide").show();
    });
    $("#nama").click(function(){
        $("#name").show();
        $("#namahide").hide();
        $("#hp").hide();
        $("#handphonehide").show();
         $("#tot").hide();
        $("#emailhide").show();
    });
        $("#cancelnama").click(function(){
        $("#name").hide();
        $("#namahide").show();
    });

});

</script>
    <!-- jQuery Version 1.11.1 -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
