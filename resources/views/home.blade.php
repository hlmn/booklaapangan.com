<!DOCTYPE html>
<html lang="en">
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

}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BookLapangan</title>

    <!-- Bootstrap Core CSS -->
    {{ Html::style('css/bootstrap.min.css') }}
            {{ Html::style('datepicker/css/datepicker.css') }}
            {{ Html::style('css/1-col-portfolio.css') }}

     

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
                <ul class="nav navbar-nav left">
                    @if (Auth::guest())
                        <li><a href="{{ url('/signin') }}">Login</a></li>
                        <li><a href="{{ url('/signup') }}">Register</a></li>
                    @else
                     <li><a href="/logout">Logout</a></li>
                     <li><a href="/upload">HELLO! {{Auth::user()->email}}</a></li>
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
  <div class="col-lg-12">
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
                                {{ Form::text('tgl', null, ['class' => 'form-control','id' => 'dp1']) }}
                            </div>
                            <div class="col-md-2">
                              <label for="ex1">Jam Mulai Bermain</label>
                              <input type="text" class="form-control" name="start">
                            </div>
                            <div class="col-md-2">
                              <label for="ex1">Jam Selesai Bermain</label>
                              <input type="text" class="form-control" name="end">
                            </div>                            
                            <div class="col-md-2">
                              <label for="ex1">Jenis Lapangan</label>
                          
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
        


        <!-- /.row -->

       
        <!-- Pagination -->
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; BookLapangan 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
<script src="datepicker/js/bootstrap-datepicker.js"></script>

   <script>
var monster = {
  set: function(name, value, days, path, secure) {
    var date = new Date(),
      expires = '',
      type = typeof(value),
      valueToUse = '',
      secureFlag = '';
    path = path || "/";
    if (days) {
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    if (type === "object" && type !== "undefined") {
      if (!("JSON" in window)) throw "Bummer, your browser doesn't support JSON parsing.";
      valueToUse = encodeURIComponent(JSON.stringify({
        v: value
      }));
    }
    else {
      valueToUse = encodeURIComponent(value);
    }
    if (secure) {
      secureFlag = "; secure";
    }
    document.cookie = name + "=" + valueToUse + expires + "; path=" + path + secureFlag;
  },
  get: function(name) {
    var nameEQ = name + "=",
      ca = document.cookie.split(';'),
      value = '',
      firstChar = '',
      parsed = {};
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) {
        value = decodeURIComponent(c.substring(nameEQ.length, c.length));
        firstChar = value.substring(0, 1);
        if (firstChar == "{") {
          try {
            parsed = JSON.parse(value);
            if ("v" in parsed) return parsed.v;
          }
          catch (e) {
            return value;
          }
        }
        if (value == "undefined") return undefined;
        return value;
      }
    }
    return null;
  }
};
if (!monster.get('cookieConsent')) {
  var cookieConsentAct = function() {
      document.getElementById('cookieConsent').style.display = 'none';
      monster.set('cookieConsent', 1, 360, '/');
    };
  document.getElementById('cookieConsent').style.display = 'block';
  var cookieConsentEl = document.getElementById('cookieConsentAgree');
  if (cookieConsentEl.addEventListener) {
    cookieConsentEl.addEventListener('click', cookieConsentAct, false);
  }
  else if (cookieConsentEl.attachEvent) {
    cookieConsentEl.attachEvent("onclick", cookieConsentAct);
  }
  else {
    cookieConsentEl["onclick"] = cookieConsentAct;
  }
}
</script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/jquery.js"></script>
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
  <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#dp2').datepicker();
      $('#dp3').datepicker();
      $('#dp3').datepicker();
      $('#dpYears').datepicker();
      $('#dpMonths').datepicker();
      
      
      var startDate = new Date(2012,1,20);
      var endDate = new Date(2012,1,25);
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('The start date can not be greater then the end date');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });
      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
          }
          $('#dp5').datepicker('hide');
        });

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
    });
  </script>

    <!-- jQuery -->
 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
    