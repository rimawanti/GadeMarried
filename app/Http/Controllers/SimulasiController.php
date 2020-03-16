<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

        echo $response->getStatusCode(); // 200
        echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        // Send an asynchronous request.
        // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });

        // $promise->wait();
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
        $target = $request->input('InputTarget');
        $cif = $request->input('InputCIF');
        $array = array();
        $code = 500;

        $future = new DateTime($target);
        $now = new DateTime(date("Y-m-d"));
        $jangka_tahun = $future->diff($now);
        $jangka = $jangka_tahun->y;

        if($jangka==0){
            $jangka=1;
        }

        $jumlah = $catering + $wo + $dekor + $mua + $pra + $venue + ($souvenir*$undangan) + ($undangan*$undanganavg);
        //echo $jangka;
        $cicilan = ($jumlah+($jumlah*0.2*$jangka))/($jangka*12);
         //echo $cicilan;
        $annual_total= $jumlah+($jumlah*0.2*$jangka);


        $array[0] = 'CA004'; //kategori
        $array[1] = $annual_total; //total
        $array[2] = $cicilan; //cicilan
        $array[3] = $cif; //cif
        $array[4] = $target; //target

        //$code=$this->sendtoDreamBox($array);

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

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'status send'=>$code,'cif'=>$cif,'jangka'=>$jangka,'cat'=>'CA004','target'=>$target,'total_'=>$annual_total,'cicilan_'=>$cicilan));
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
        $target = $request->input('InputTarget');
        $cif = $request->input('InputCIF');
        $array = array();
        $code = 500;


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

        $array[0] = 'CA003'; //kategori
        $array[1] = $ftotal; //total
        $array[2] = $cicilan; //cicilan
        $array[3] = $cif; //cif
        $array[4] = $target; //target

        //$code = $this->sendtoDreamBox($array);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$years,'status send'=>$code,'cif'=>$cif,'target'=>$target,'total_'=>$ftotal,'cicilan_'=>$cicilan,'cat'=>$array[0]));
        return $datas;

        //return redirect()->route('simulasi.nilai',array($cicilan_));
    }
    public function hitungHaji(Request $request)
    {
        $start = microtime(true);
        $biaya = 35000000; $kenaikan = 5000000;
        $total = 0; $rekom=1; $cif = 1234567889;
        $dana = $this->removeComma($request->input('InputDana'));
        $program = $request->input('InputProgram');
        $vaksin = $this->removeComma($request->input('InputVaksin'));
        $saku  = $this->removeComma($request->input('InputSaku'));
        $jemaah = $request->input('InputJamaah');
        $oleh = $this->removeComma($request->input('InputOleh'));
        $jangka= $request->input('InputJangka'); //date_format($jangka,"Y-m-d");
        $gaji= $this->removeComma($request->input('InputGaji'));
        $target = $request->input('InputTarget');
        $cif = $request->input('InputCIF');
        $array = array();
        $code = 500;

        $future = new DateTime($target);
        $now = new DateTime(date("Y-m-d"));
        $jangka_tahun = $future->diff($now);
        $jangka = $jangka_tahun->y;

        if($jangka==0){
            $jangka=1;
        }

        // $this->console_log("dana: ".$dana."proggram: ".$program."vaksin: ".$vaksin."saku: ".$saku."jemaah: ".$jemaah."oleh: ".$oleh."jangka: ".$jangka."gaji: ".$gaji); die();

        $dateMinusOneYear = date("Y-m-d", strtotime("-1 year", strtotime($jangka)));

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

        $array[0] = 'CA001'; //kategori
        $array[1] = $total; //total
        $array[2] = $cicilan; //cicilan
        $array[3] = $cif; //cif
        $array[4] = $target; //target

        //$code = $this->sendtoDreamBox($array);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$jangka,'success send'=>$code,'target'=>$target,'cif'=>$cif,'total_'=>$total,'cat'=>$array[0],'cicilan_'=>$cicilan));

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
        $target = $request->input('InputTarget');
        $cif = $request->input('InputCIF');
        $array = array();
        $code = 500;
        
        if($lokasi == 1){
            $tidakpajak = 80000000;
        } else if($lokasi == 2){
            $tidakpajak = 60000000;
        } else if ($lokasi == 3){
            $tidakpajak = 60000000;
        } 
        $future = new DateTime($target);
        $now = new DateTime(date("Y-m-d"));
        $jangka_tahun = $future->diff($now);
        $jangka = $jangka_tahun->y;

        if($jangka==0){
            $jangka=1;
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

        $array[0] = 'CA002'; //kategori
        $array[1] = $total; //total
        $array[2] = $cicilan; //cicilan
        $array[3] = $cif; //cif
        $array[4] = $target; //target

        //$code = $this->sendtoDreamBox($array);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$jangka,'lokasi'=>$lokasi,'status send'=>$code,'cif'=>$cif,'target'=>$target,'cicilan_'=>$cicilan,'total_'=>$total,'cat'=>$array[0]));
        return $datas;
    }
    public function hitungKendaraan(Request $request){
        $start = microtime(true);
        $i = 0.03; /*suku bunga -> inflasi*/
        $total = 0; $rekom=1; $biaya =0;
        $asuransi = 0.02;
        
        $harga = $this->removeComma($request->input('InputHarga'));
        $isAsuransi = $request->input('InputAsuransi');
        //$admin = $this->removeComma($request->input('InputAdmin'));
        $tipe   =  $request->input('InputTipe');
        $jangka = $request->input('InputJangka');
        $gaji   = $this->removeComma($request->input('InputGaji'));
        $target = $request->input('InputTarget');
        $cif = $request->input('InputCIF');
        $array = array();
        $code = 500;

        $future = new DateTime($target);
        $now = new DateTime(date("Y-m-d"));
        $jangka_tahun = $future->diff($now);
        $jangka = $jangka_tahun->y;

        if($jangka==0){
            $jangka=1;
        }

        if($tipe == 0){ //jika motor
            $biaya = ($harga * pow((1+$i),$jangka)) + 500000;
        }
        else{ //jika mobil
            $biaya = ($harga * pow((1+$i),$jangka)) + 1000000;
        }
        
        $total = $biaya;

        if($isAsuransi == 1){
                $biaya = $biaya + ($asuransi*$biaya);
        }
        
        //$this->console_log("biaya: ".$biaya."total: ".$total); die();

        $cicilan = $biaya/($jangka*12);
        
        if($cicilan >= (0.3*$gaji)){
            $rekom = 0;
        }
        //calculate query times
        $time_elapsed_secs = microtime(true) - $start;
        $time_elapsed_secs = number_format($time_elapsed_secs, 4, '.', '');

        $total_ = number_format($biaya,2);
        $cicilan_ = number_format($cicilan,2);

        $array[0] = 'CA005'; //kategori
        $array[1] = $biaya; //total
        $array[2] = $cicilan; //cicilan
        $array[3] = $cif; //cif
        $array[4] = $target; //target

        //$code = $this->sendtoDreamBox($array);

        $datas = json_encode(array('cicilan'=>$cicilan_,'total' => $total_,'time'=>$time_elapsed_secs,'rekom'=>$rekom,'years'=>$jangka,'status send'=>$code,'cif'=>$cif,'target'=>$target,'total_'=>$total,'cat'=>$array[0],'cicilan_'=>$cicilan));
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
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function sendtoDreamBox(Request $request){
        // $cat = $arr[0];
        // $total = $arr[1];
        // $cicilan = $arr[2];
        // $cif = $arr[3];
        // $target = $arr[4];

        $cat = $request->input('cat');
        $total = $request->input('total');
        $cicilan = $request->input('cicilan');
        $cif = $request->input('CIF');
        $target = $request->input('target');;

        $client = new \GuzzleHttp\Client();
        //$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

        $url = "http://mydreambox.herokuapp.com/dreambox/integration";
   
        $myBody['cif'] = $cif;
        $myBody['id_kategori'] = $cat;
        $myBody['dana'] = $total;
        $myBody['target'] = $target;
        $myBody['tabungan_per_bulan'] = $cicilan;

        $data = json_encode($myBody);


        //$request = $client->post($url,  ['body'=>$myBody]);
        $request = $client->post($url, ['body'=>$data]);
     

        //echo 'cif: '.$cif.'target: '.$target.'total: '.$total.'cat: '.$cat;      
        //return $request->getStatusCode(); 
        //echo $request->getStatusCode(); 
        echo $request->getBody(); 

        $datas = json_encode(array('responseCode'=>$request->getStatusCode(),'body'=>$request->getBody()));

        return $datas;
        //die();
        //echo $response->getStatusCode(); // 200
        //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        //echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

    }

}
