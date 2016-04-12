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

<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>

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
                <h1>Masukkan Lapangan Mu!</h1>
                <br>
                <br>
            </div>
        </div>
                    <div class="col-md-6">
                    <div class="form1">           
                        <form action="/tambahfasor" method="POST" enctype="multipart/form-data">
                            <label>Nama Fasor</label>
                            {{ Form::text('nama_fasor', null, ['class' => 'form-control']) }} 
                            <label>Alamat</label>
                            {{ Form::text('alamat', null, ['class' => 'form-control']) }} 
                            <label>Nomor Telepon</label>
                            {{ Form::text('nama_fasor', null, ['class' => 'form-control']) }} 
                            <label>Kota</label>
                            {{ Form::text('alamat', null, ['class' => 'form-control']) }} 
                            <input type="hidden" name="_token" value="{{csrf_token()}}">     
                            <br>
                            <input type="submit" value="Submit" name="test">
                            
                        </form>

                

                

                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form1">
                
                <form action="/tambahlapangan" method="POST" enctype="multipart/form-data">
                    <label>Fasor:</label>
                <select class="form-control" name="fasor">
                    @foreach ($fasors as $fasor)
                        <option value="{{$fasor->ID_FASOR}}">{{$fasor->NAMA_FASOR}}</option>
                    @endforeach
                    
                </select>
                    <label>Nama Lapangan</label>
                    {{ Form::text('namalap', null, ['class' => 'form-control', 'placeholder' => 'Nama Lapangan']) }} 
                    <label>Jenis Lapangan</label>
                    {{ Form::select('lapangan', $items, null, ['class' => 'form-control']) }}
                                       
                    <div class="ukuran">
                     <h3>Ukuran Lapangan:</h3>
                            <div class="ibab">
                              <label>Panjang</label>
                              <input type="text" class="form-control" name="panjang">
                            </div>

                            <div class="ibab">
                              <label>Lebar</label>
                              <input type="text" class="form-control" name="lebar">
                            </div>
                            </div><br><br><br>
                    

                        

                    
                    <label>Pilih foto lapangan mu:</label>
                    <input type="file" name="file" id="fileToUpload"><br>
                    <input type="submit" value="Submit" name="submit">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>

                

                

                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form1">
                
                <form action="/hargalapangan" method="POST" enctype="multipart/form-data">
                    <label>Fasor:</label>
                <select class="form-control" name="fasor" id="fasor">
                    <option selected disabled>Pilih Fasor</option>
                    @foreach ($fasors as $fasor)
                        <option value="{{$fasor->ID_FASOR}}">{{$fasor->NAMA_FASOR}}</option>
                    @endforeach
                    
                 </select>
                 <label>Nama Harga</label>
                 <input type="text" name="namaharga" class="form-control">
                 <div class="ibab">
                 <label>Harga</label>
                 <input type="text" name="harga" class="form-control"> 
                 </div>                   
                <br>
                <br>
                <br><br>
                <input type="submit" value="Submit" name="submit">
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">

                </form>

                

                

                
            </div>
        </div>  

        <div class="col-md-6">
            <div class="form1">
                
                <form action="/hargalapangan" method="POST" enctype="multipart/form-data">
                    <label>Fasor:</label>
                <select class="form-control" name="fasor" id="fasor">
                    <option selected disabled>Pilih Fasor</option>
                    @foreach ($fasors as $fasor)
                        <option value="{{$fasor->ID_FASOR}}">{{$fasor->NAMA_FASOR}}</option>
                    @endforeach
                    
                </select>

                 <label>lapangan:</label>
                {{ Form::select('kabupaten', array(), null, array('id' => 'lapangan', 'class'=>'form-control'))  }} 

                 <label>Pilih Hari:</label>
<br><br>
                 <select id="example-getting-started" multiple="multiple">
                    @foreach ($hari as $day)
                    <option value="{{$day->id_hari}}">{{$day->nama_hari}}</option>
                    @endforeach
                 </select>
          
                <br>
                <br>
                <br><br>
                <input type="submit" value="Submit" name="submit">
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">

                </form>

                

                

                
            </div>
        </div>  


    </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {
        $('#fasor').on('change',function(){
        $.post('dropdown', {_token: "{{ csrf_token() }}",type: 'slapangan', id: $('#fasor').val()}, function(e){
            $('#lapangan').html(e);
        });
     });

});

</script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
             nonSelectedText: 'Pilih Hari'
        });
    });
</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
