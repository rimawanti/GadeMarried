<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hitung(Request $request)
    {
        $start = microtime(true);
        //$jangka = 0;
        $rekom = 1;

        $catering = $request->input('catering');
        $wo = $request->input('vendor');
        $dekor = $request->input('dekor');
        $mua  = $request->input('mua');
        $pra= $request->input('pra');
        $venue= $request->input('venue');
        $jangka= $request->input('jangka');
        $gaji= $request->input('gaji');
        $souvenir= $request->input('souvenir');
        $undangan= $request->input('undangan');
        $undanganavg = 10000;

        $jumlah = $catering + $wo + $dekor + $mua + $pra + $venue + ($souvenir*$undangan) + ($undangan*$undanganavg);
        //echo $jangka;
        $cicilan = ($jumlah+($jumlah*0.2*$jangka))/($jangka*12);
         //echo $cicilan;
        $annual_total= $jumlah+($jumlah*0.2*$jangka);

        //calculate query times
        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $total_ = number_format($annual_total,2);
        $cicilan_ = number_format($cicilan,2);

        // rekom =0 , kurang direkomendasikan
        // rekom = 1, direkomendasikan
        if($cicilan >= (0.3*$gaji)){
            $rekom = 0;
        }

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom));
        return $datas;
    }

    public function hitungPinjaman(Request $request)
    {
        $start = microtime(true);
        $rekom = 1;

        $pinjaman = $request->input('pinjaman');
        $jangka= $request->input('jangka');
        $sewamodal = 0.03;

        if($jangka <3){
            $sewamodal = 0.05;
        }
        $gaji= $request->input('gaji');

        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $pinjamansewa = $pinjaman + ($pinjaman * $jangka * $sewamodal);
        $cicilan = $pinjamansewa / ($jangka*12);

        $cicilan_ = number_format($cicilan,2);

        // rekom =0 , kurang direkomendasikan
        // rekom = 1, direkomendasikan
        if($cicilan >= (0.3*$gaji)){
            $rekom = 0;
        }

        $datas = json_encode(array('cicilan'=>$cicilan_,'sewamodal' => ($sewamodal*100). '%','time'=>$time_elapsed_secs,'rekom' => $rekom));
        return $datas;
        
        //echo 'suksessPinjaman';
    }
     public function hitungPendidikan(Request $request)
    {
        $start = microtime(true);
        $starts = array(4,6,12,15,18); //start usia tk,sd,smp,sma,kuliah
        $s = 0.15; /*suku bunga -> inflasi*/ $rekom=1; 
        $totalbiaya =0; $cicilan=0;  $ftotal =0;// f stand for future value
        $j = array();  //j stand for jarak usia
        $Biaya = array(); 

        $Biaya[0] = $request->input('InputBiayaTK');
        $Biaya[1] = $request->input('InputBiayaSD');
        $Biaya[2] = $request->input('InputBiayaSMP');
        $Biaya[3] = $request->input('InputBiayaSMA');
        $Biaya[4] = $request->input('InputBiayaUniv');

        // $this->console_log($Biaya);
        
        $iUsia = $request->input('InputUsia'); 
        $iTenor = $request->input('InputTenor'); 
        $gaji= $request->input('InputGaji');

        for($i=0;$i<5;$i++){ //looping jarak usia
            $j[$i] = $starts[$i] - $iUsia;
            if($j[$i]<0){ $j[$i]=0; }
            if($i==4){ $years = $j[$i];}
        }
        // $this->console_log($j[1]);
        
 
        for($i=0;$i<5;$i++){ //looping future value
            $ftotal += $Biaya[$i] * pow((1+$s),$j[$i]);
        }
        for($i=0;$i<5;$i++){ //total biaya
            $totalbiaya += $Biaya[$i];
        }
        $cicilan = $totalbiaya/($iTenor*12);

        if($cicilan >= (0.3*$gaji)){
            $rekom = 0;
        }
        //calculate query times
        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $total_ = number_format($ftotal,2);
        $cicilan_ = number_format($cicilan,2);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$years));
        return $datas;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

}
