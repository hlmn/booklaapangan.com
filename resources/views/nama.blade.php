                    <strong>Nama Lama : </strong>{{Auth::user()->name}}
                   
                    <form action="changename" method="POST">
                    
                    <label>Masukkan Nama Baru</label>
                    <input type="text" class="form-control" style="width: 50%" name="nama" placeholder="Nama"></input><br>
                    


                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Submit" name="test"  style="float: left;" class="btn btn-primary">
                </form>   <br><br>

                   