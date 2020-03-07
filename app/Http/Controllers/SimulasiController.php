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

        $catering = $this->removeComma($request->input('catering'));
        $wo = $this->removeComma($request->input('vendor'));
        $dekor = $this->removeComma($request->input('dekor'));
        $mua  = $this->removeComma($request->input('mua'));
        $pra= $this->removeComma($request->input('pra'));
        $venue= $this->removeComma($request->input('venue'));
        $jangka= $this->removeComma($request->input('jangka'));
        $gaji= $this->removeComma($request->input('gaji'));
        $souvenir= $this->removeComma($request->input('souvenir'));
        $undangan= $this->removeComma($request->input('undangan'));
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
    
    public function getNilai($nilai)
    {
        return $datas = json_encode(array('status'=>'success'));
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
        // $this->validate($request, array(
        //     'category' => 'required',
        //     'InputUsia' => 'digits_between:2,5',
        // ));
        $start = microtime(true);
        $starts = array(4,6,12,15,18); //start usia tk,sd,smp,sma,kuliah
        $s = 0.15; /*suku bunga -> inflasi*/ $rekom=1; 
        $totalbiaya =0; $cicilan=0;  $ftotal =0;// f stand for future value
        $j = array();  //j stand for jarak usia
        $Biaya = array(); 

        $Biaya[0] = $this->removeComma($request->input('InputBiayaTK'));
        $Biaya[1] = $this->removeComma($request->input('InputBiayaSD'));
        $Biaya[2] = $this->removeComma($request->input('InputBiayaSMP'));
        $Biaya[3] = $this->removeComma($request->input('InputBiayaSMA'));
        $Biaya[4] = $this->removeComma($request->input('InputBiayaUniv'));

        // $this->console_log($Biaya);
        
        $iUsia = $request->input('InputUsia'); 
        $iTenor = $request->input('InputTenor'); 
        $gaji= $this->removeComma($request->input('InputGaji'));

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

        //return redirect()->route('simulasi.nilai',array($cicilan_));
    }
    public function hitungHaji(Request $request)
    {
        $start = microtime(true);
        $biaya = 35000000; $kenaikan = 5000000;
        $total = 0; $rekom=1;
        $dana = $this->removeComma($request->input('InputDana'));
        $program = $request->input('InputProgram');
        $vaksin = $this->removeComma($request->input('InputVaksin'));
        $saku  = $this->removeComma($request->input('InputSaku'));
        $jemaah = $request->input('InputJamaah');
        $oleh = $this->removeComma($request->input('InputOleh'));
        $jangka= $request->input('InputJangka');
        $gaji= $this->removeComma($request->input('InputGaji'));

        // $this->console_log("dana: ".$dana."proggram: ".$program."vaksin: ".$vaksin."saku: ".$saku."jemaah: ".$jemaah."oleh: ".$oleh."jangka: ".$jangka."gaji: ".$gaji); die();

        if($program==1){
            $biaya = 3*$biaya; 
        }
        $total = $jemaah*($dana+$vaksin+$saku+$oleh+$biaya+($kenaikan*$jangka));
        $cicilan = $total/($jangka*12);

        if($cicilan >= (0.3*$gaji)){
            $rekom = 0;
        }
        //calculate query times
        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $total_ = number_format($total,2);
        $cicilan_ = number_format($cicilan,2);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$jangka));
        return $datas;

    }
    public function hitungRumah(Request $request)
    {
        $start = microtime(true);
        $s = 0.085; /*suku bunga -> inflasi*/
        $total = 0; $rekom=1;
        $tidakpajak = 0;
        
        $lokasi = $request->input('lokasi');
        $jangka= $request->input('InputJangka');
        $gaji= $this->removeComma($request->input('InputGaji'));
        $rumah = $this->removeComma($request->input('InputRumah'));
        $finalrumah = $rumah * pow((1+$s),$jangka);
        //$tidakpajak = $this->removeComma($request->input('InputTidakPajak'));
        
        if($lokasi == 1){
            $tidakpajak = 80000000;
        } else if($lokasi == 2){
            $tidakpajak = 60000000;
        }
        
        //$tidakpajak = $this->removeComma($request->input('InputTidakPajak'));
        //$notaris = $this->removeComma($request->input('InputNotaris'));
       
        //rincian biaya notaris
        $akta = 0.01*$finalrumah; //akta jual beli 1% dari harga jual
        $baliknama = 0.01*$finalrumah; //biaya balik nama 1% dari harga jual
        $sertif = 100000; //cek sertifikat
        $bphtb = 0.05*($finalrumah-$tidakpajak); //bea perolehan hak atas tanah dan bangunan
        $notaris = $akta+$baliknama+$sertif+$bphtb;

        //$total = $notaris+($rumah+($rumah*($s*$jangka)));
        $total = $notaris+$finalrumah;
        //$total = $biaya * pow((1+$s),$jangka);
        $cicilan = $total/($jangka*12);
        
        if($cicilan >= (0.3*$gaji)){
            $rekom = 0;
        }
        //calculate query times
        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $total_ = number_format($total,2);
        $cicilan_ = number_format($cicilan,2);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$jangka,'lokasi'=>$lokasi));
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

    function removeComma($num){
        $numconv = (int)str_replace(',', '', $num);

        return $numconv;
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
