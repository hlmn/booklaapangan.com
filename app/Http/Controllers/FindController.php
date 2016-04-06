<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\customers;
use App\fasilitas;
use App\fasor;
use App\jenislap;
use App\lapangan;
use App\menawarkan;
use Validator;
use DB;

class FindController extends Controller
{
    public function CariFasor(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');
        $date       = date("Y-m-d");
        $time       = date("H:i:s");        
        if ($request->tgl == $date ){
        $date       = date("Y-m-d");
    

        $validator = Validator::make($request->all(), [
            'tgl' => "required|date_format:Y-m-d",
            'start' =>  "required|date_format:H:i:s|after:$time",
            'end' =>  "required|date_format:H:i:s|after:start"
        ], [
            'tgl.date_format'       => 'Tanggal yang anda masukkan tidak sesuai format. Contoh: 2016-03-14',
            'start.date_format'     => 'Format jam salah, Contoh: 18:00:00' ,
            'end.date_format'       => 'Format jam salah, Contoh: 18:00:00',
            'tgl.required'          => 'Anda belum memasukkan tanggal',
            'start.required'         => 'Anda belum memasukkan jam bermain',
            'end.required'          => 'Anda belum memasukkan jam selesai'

        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
    

        }

        $validator = Validator::make($request->all(), [
            'tgl' => 'required|date_format:Y-m-d|after:today',
            'start' =>  "required|date_format:H:i:s",
            'end' =>  "required|date_format:H:i:s|after:start"
        ], [
            'tgl.date_format'       => 'Tanggal yang anda masukkan tidak sesuai format. Contoh: 2016-03-14',
            'start.date_format'     => 'Format jam salah, Contoh: 18:00:00' ,
            'end.date_format'       => 'Format jam salah, Contoh: 18:00:00',
            'tgl.required'          => 'Anda belum memasukkan tanggal',
            'start.required'         => 'Anda belum memasukkan jam bermain',
            'end.required'          => 'Anda belum memasukkan jam selesai'

            
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $tgl = $request->input('tgl');
        $kota = $request->input('kota');
        $start = $request->input('start');
        $end = $request->input('end');
        $lapangan = $request->input('lapangan');
        $jenis = $request->input('jenis');
        //$test=$end-$start;
        //echo $test;
        $items = \App\jenislap::pluck('NAMA_JENIS_LAP','NAMA_JENIS_LAP');

       $terpakai = DB::select("select lapangan.ID_LAP from lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.KOTA_FASOR='$kota' and fasor.ID_FASOR=lapangan.ID_FASOR;");
       if ($terpakai == null){
        $terpakai ="1";
        $results = DB::select("select lapangan.foto, fasor.NAMA_FASOR,fasor.ID_FASOR from fasor,lapangan where ID_LAP not in (select lapangan.ID_LAP from lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.KOTA_FASOR='$kota' and fasor.ID_FASOR=lapangan.ID_FASOR)and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' group by fasor.NAMA_FASOR;");
       
       // echo "select fasor.NAMA_FASOR, harga,fasor.ID_FASOR from fasor,lapangan where ID_LAP not in (select lapangan.ID_LAP from lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.KOTA_FASOR='$kota' and fasor.ID_FASOR=lapangan.ID_FASOR)and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' group by fasor.NAMA_FASOR;";
        return view('hasil',['tgl' => $tgl,'kota' => $kota,'start' => $start,'lapangan' => $lapangan,'results' => $results, 'items' => $items, 'end' => $end,'terpakai' => $terpakai]);
       }


        return view('hasil',['tgl' => $tgl,'kota' => $kota,'start' => $start,'lapangan' => $lapangan, 'items' => $items, 'end'=> $end,'terpakai' => $terpakai]);

    }

    public function Index(Request $request)
    {       
        $jumlah= \App\lapangan::where('foto', '!=', 'NULL')->count();;
       
        $foto=\App\lapangan::where('foto', '!=', 'NULL')->get();
        $items = \App\jenislap::pluck('NAMA_JENIS_LAP','NAMA_JENIS_LAP');
        return view('tai',['items' => $items,'lapangans' => $foto, 'jumlah' => $jumlah]);
    
    }
    public function ShowLap($id_fasor,$tgl,$start,$end,$lapangan)
    {   
        
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'id_ID.UTF-8','id_ID');
        //setlocale(LC_TIME,'fr_FR');
        $hari= strftime("%A",strtotime("$tgl"));
        //setlocale(LC_TIME,'id_ID');
       //echo $hari;
 
        $tests=DB::select("
select lapangan.ID_LAP,harga.id_harga,jam.ID_JAM,harga.NAMA_HARGA,jam.MULAI,jam.SELESAI,harga.HARGA,hari.nama_hari from harga,punya_harga,hargajam,hari,fasor,lapangan,jam where ID_LAP not in (select lapangan.ID_LAP from harga,punya_harga, lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.id_fasor='$id_fasor' and fasor.ID_FASOR=lapangan.ID_FASOR and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA)and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA and harga.ID_HARGA=hargajam.ID_HARGA and hargajam.HARI=hari.ID_HARI and punya_harga.id_harga=hargajam.ID_HARGA and hargajam.ID_JAM=jam.ID_JAM and hari.nama_hari='$hari' and lapangan.ID_FASOR='$id_fasor';");
//echo "select lapangan.ID_LAP,harga.id_harga,jam.ID_JAM,harga.NAMA_HARGA,jam.MULAI,jam.SELESAI,harga.HARGA,hari.nama_hari from harga,punya_harga,hargajam,hari,fasor,lapangan,jam where ID_LAP not in (select lapangan.ID_LAP from harga,punya_harga, lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.id_fasor='$id_fasor' and fasor.ID_FASOR=lapangan.ID_FASOR and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA)and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA and harga.ID_HARGA=hargajam.ID_HARGA and hargajam.HARI=hari.ID_HARI and punya_harga.id_harga=hargajam.ID_HARGA and hargajam.ID_JAM=jam.ID_JAM and hari.nama_hari='$hari';";
      /*  echo "select lapangan.ID_LAP,harga.id_harga,jam.ID_JAM,harga.NAMA_HARGA,jam.MULAI,jam.SELESAI,harga.HARGA,hari.nama_hari from harga,punya_harga,hargajam,hari,fasor,lapangan,jam where ID_LAP not in (select lapangan.ID_LAP from harga,punya_harga, lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.id_fasor='$id_fasor' and fasor.ID_FASOR=lapangan.ID_FASOR and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA)and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA and harga.ID_HARGA=hargajam.ID_HARGA and hargajam.HARI=hari.ID_HARI and punya_harga.id_harga=hargajam.ID_HARGA and hargajam.ID_JAM=jam.ID_JAM and hari.nama_hari='$hari';        ";
////echo $tests;      
        foreach ($tests as $test) {
            //if($test->MULAI < $end && $test->SELESAI > $start )
            //{

                if( ($start < $test->MULAI && $end > $test->SELESAI)  ){
                    echo "$test->MULAI - $test->SELESAI: $test->HARGA/jam<br>";
                }
                else if ($start < $test->SELESAI && $end >$test->SELESAI){
                    echo "$start - $test->SELESAI: $test->HARGA/jam<br>";
                }
                else if($end > $test->MULAI && $start < $test->MULAI){
                    echo "$test->MULAI - $end: $test->HARGA/jam<br>";
                }
                else if ($test->MULAI < $end && $test->SELESAI > $start){
                    echo "$start - $end: $test->HARGA/jam<br>";
                }

                //else echo "$start-$end: $test->HARGA/jam<br>";
            //}
            //else echo "lebih satu harga<br>";
        }*/

        $jumlah= \App\lapangan::where('foto', '!=', 'NULL')->where('id_fasor', '=', "$id_fasor")->count();
        $fasilitas= DB::select("SELECT fasilitas.NAMA_FAS, menawarkan.ID_LAP FROM menawarkan,lapangan,fasilitas WHERE menawarkan.ID_LAP=lapangan.ID_LAP and menawarkan.ID_FAS=fasilitas.ID_FAS and lapangan.ID_FASOR='$id_fasor'"); 

        

        $nm_fsr= DB::select("SELECT DISTINCT fasor.NAMA_FASOR FROM fasor WHERE ID_FASOR='$id_fasor';");
        $show= DB::select("select lapangan.foto,lapangan.ID_LAP,lapangan.NAMA_LAP,lapangan.UKURAN_LAP,fasor.NAMA_FASOR,fasor.ID_FASOR from fasor,lapangan where ID_LAP not in (select lapangan.ID_LAP from lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.id_fasor='$id_fasor' and fasor.ID_FASOR=lapangan.ID_FASOR  and fasor.ID_FASOR='$id_fasor')and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan'  and lapangan.ID_FASOR='$id_fasor' group by lapangan.NAMA_LAP;");
       // $harga=DB::select("select lapangan.ID_LAP from harga,punya_harga,fasor,lapangan where ID_LAP not in (select lapangan.ID_LAP from harga,punya_harga, lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.id_fasor='$id_fasor' and fasor.ID_FASOR=lapangan.ID_FASOR and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA)and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' and lapangan.ID_LAP=punya_harga.id_lapangan and punya_harga.id_harga=harga.ID_HARGA group by harga.HARGA;");
        
       // echo "select lapangan.foto,lapangan.ID_LAP,lapangan.NAMA_LAP,lapangan.UKURAN_LAP,fasor.NAMA_FASOR,fasor.ID_FASOR from fasor,lapangan where ID_LAP not in (select lapangan.ID_LAP from lapangan,transaksi,fasor where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='$tgl' and (transaksi.JAM_MAIN<'$end' and transaksi.JAM_SELESAI>'$start') and lapangan.NAMA_JENIS_LAP='$lapangan' and fasor.id_fasor='$id_fasor' and fasor.ID_FASOR=lapangan.ID_FASOR  and fasor.ID_FASOR='$id_fasor')and lapangan.ID_FASOR=fasor.ID_FASOR and lapangan.NAMA_JENIS_LAP='$lapangan' group by lapangan.NAMA_LAP;";
       return view('haslap',['shows' => $show,'fasilitas' => $fasilitas, 'nm_fsrs' => $nm_fsr, 'tgl' => $tgl, 'start' => $start, 'end' => $end, 'jumlah' => $jumlah, 'prices' => $tests]);
    }
}
