<?php

namespace App\Http\Controllers;
use App\lapangan;
use App\fasor;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

use App\owner;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Input;
use DB;

class OwnerController extends Controller
{
    public function UploadLapangan(Request $request)
    {  
        if(Auth::guest()){
            return redirect('/');
        }
        $iat=Auth::user()->id;
        $terpakai = DB::select("SELECT fasor.NAMA_FASOR,fasor.ID_FASOR
        FROM fasor,owner
        where fasor.ID_FASOR=owner.ID_FASOR and owner=$iat");
      //  $test = \App\fasor::find($flight->ID_FASOR);
       //return $terpakai;
        //;
        //echo $test;
        $j="0";
       $items = \App\jenislap::pluck('NAMA_JENIS_LAP','NAMA_JENIS_LAP');
       return view('insertlap',['items' => $items,'fasors' => $terpakai]);
    	
    }

    public function TambahFasor(Request $request)
    {  
        $a=1;    
        
    }
    public function Tambah(Request $request)
    {      

        $maxfsr = \App\fasor::max('ID_FASOR');
        $max = \App\lapangan::max('ID_LAP');
        $max++;
        $fasor      = $request->fasor;
    	$tai		= "babi";
    	$lapangan 	= $request->file('file');
    	
    	$filename 	= $lapangan->getClientOriginalName();
        $location   = "uploads/foto/fasor/$fasor";
    	$sukses		= $lapangan->move($location, $filename);

    


        $source     =  
        $submit                 = new lapangan;
        $submit->ID_LAP         = $max;
        $submit->NAMA_LAP       = $request->namalap;
        $submit->NAMA_JENIS_LAP = $request->lapangan;
        $submit->UKURAN_PANJANG = $request->panjang;
        $submit->UKURAN_LEBAR   = $request->lebar;
        $submit->HARGA          = $request->harga;
        $submit->ID_FASOR       = $request->fasor;
        $submit->foto          = "$location/$filename";
        $submit->save();
       
        //return "$max";
      return $submit->foto;
    }
}
