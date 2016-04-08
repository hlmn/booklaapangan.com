                    
                    <strong>Email Lama : </strong>{{Auth::user()->email}}
                   
                    <form action="changeemail" method="POST">
                    
                    <label>Masukkan Email Baru</label>
                    <input type="email" class="form-control" style="width: 50%" name="email" placeholder="Email "></input><br>
                    


                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Submit" name="test"  style="float: left;" class="btn btn-primary">
                </form>   <br><br>

                   