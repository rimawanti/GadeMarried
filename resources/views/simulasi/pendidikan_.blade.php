<!DOCTYPE html>
<html>
<head> <meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css"> 
  #hitungulang, #rekom, #btn-save{
  display: none;
}
</style></head>
<title> Simulasi </title> 


@extends('partials.layout')

@section('content')
<div class="row">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>PENDIDIKAN ANAK</b></h1>
                  <!-- <a href="javascript:void(0);">Selengkapnya</a> -->
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                  </p>
                  </div>
                <!-- /.d-flex -->
                <div class="position-relative mb-4"></div>
                <div class="container"> 
                <!--- SILAHKAN EDIT DISINI --> 
               <form method="post" class="form-horizontal">
                {!! csrf_field() !!}
                 <div class="card-body">
                  <div class="form-group row row">
                    <label for="InputName" class="col-sm-2 col-form-label">Nama </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="InputName" name="InputanName" placeholder="Masukkan Nama Anda">
                    </div>
                  </div>
                  <div class="form-group row row">
                    <label for="InputUsia" class="col-sm-2 col-form-label" >Usia Anak Saat Ini (dalam tahun)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="InputUsia" name="InputUsia" placeholder="Dalam tahun" value=1>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputGaji" class="col-sm-2 col-form-label">Penghasilan per bulan (total)</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanGaji" name="InputGaji" placeholder="Enter gaji" value=2000000>
                  </div>
                  </div>
                  <div class="form-group row row">
                    <label for="InputJangka" class="col-sm-2 col-form-label" >Pilih target</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="InputTarget" name="InputTarget" placeholder="Dalam tahun" value="2020-01-31">
                  </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="InputPAUD" class="col-sm-2 col-form-label">Biaya Sekolah PAUD saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaPAUD" name="InputBiayaPAUD" placeholder="Enter biaya PAUD" value=10000000>
                  </div>
                  </div> -->
                  <div class="form-group row">
                    <label for="InputTK" class="col-sm-2 col-form-label">Biaya Sekolah TK saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaTK" name="InputBiayaTK" placeholder="Enter biaya TK" value=12500000>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSD" class="col-sm-2 col-form-label">Biaya Sekolah SD saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaSD" name="InputBiayaSD" placeholder="Enter biaya SD" value=27000000>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSMP" class="col-sm-2 col-form-label">Biaya Sekolah SMP saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaSMP" name="InputBiayaSMP" placeholder="Enter biaya SMP" value=30000000>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSMA" class="col-sm-2 col-form-label">Biaya Sekolah SMA saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaSMA" name="InputBiayaSMA" placeholder="Enter biaya SMA" value=32000000>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputUniv" class="col-sm-2 col-form-label">Biaya Universitas saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaUniv" name="InputBiayaUniv" placeholder="Enter biaya Universitas" value=40000000>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputWaktu" class="col-sm-2 col-form-label">Jangka waktu menabung (tahun):</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputTenor" name="InputTenor" placeholder="Enter waktu menabung" value=1>
                  </div>
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Check1">
                    <label class="form-check-label" for="Check1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary">HITUNG</button> -->
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <!-- <input type="submit" class="btn btn-primary" value="HITUNG"> -->
                 <input type="button" class="btn btn-primary" value="HITUNG" id="btn-todo">
                </div>
              </form>
                </div> 
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-2">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="lead" id="nama_pasangan"><strong>HASIL SIMULASI</strong></h3>
                  <!-- <a href="{{url('/produk')}}">Info produk</a> -->
                </div>
              </div>
              <div class="card-body">
                    <p id="nilai" > Silahkan masukan data yang ada pada field disamping untuk menampilkan hasil.</p>
                         <p id="total"> </p>
                         <input type="button" class="btn btn-primary" id="rekom">
                         <h6 id="ket"><strong></strong></h6>
                         <p id="query_time"> <i></i></p>
                <div class="d-flex">

                  <p class="d-flex flex-column">
                    
                  </p>

                <div class="position-relative mb-4">
                  <div class="container"> 
                    <!-- <img src="GM Logo.png" alt="GM2"
                         class="img-circle" alt="Responsive Image" 
                         width="307" height="240" />  -->
                         
                </div>
                <div class="d-flex flex-row justify-content-end">
                    <input type="button" value="List DreamBox" onClick="window.location.reload();" id="hitungulang" class="btn btn-danger">
                    <input type="button" class="btn btn-primary success" value="SIMPAN" id="btn-save">
                </div>
                </div>
              </div>
            </div>
          </div>
            </div>
 </div>
@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">

</script>
<script type="text/javascript" >
  $(function(){
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var isEmpty = false;
       var c = new URLSearchParams(window.location.search).get("cif");
       

       $('#btn-todo').on("click",function(e) {
        e.preventDefault();
         $.ajax({
                  url: '{{url("simulasi/pendidikan/hitung")}}',
                  method: 'POST',
                  data: { 
                    "_token" : CSRF_TOKEN,
                    "InputBiayaTK" : $('#InputanBiayaTK').val(),
                    "InputBiayaSD" : $('#InputanBiayaSD').val(),
                    "InputBiayaSMP" : $('#InputanBiayaSMP').val(),
                    "InputBiayaSMA" : $('#InputanBiayaSMA').val(),
                    "InputBiayaUniv" : $('#InputanBiayaUniv').val(),
                    "InputTenor" : $('#InputTenor').val(),
                    "InputUsia" : $('#InputUsia').val(),
                    "InputGaji" : $('#InputGaji').val(),
                    "InputTarget" : $('#InputTarget').val(),
                    "InputCIF" : c,
                  },
                  success: function(data)
                  {
                      var result= $.parseJSON(data);

                      document.getElementById("btn-save").style.display = "block"; 
                      document.getElementById("hitungulang").style.display = "block"; 
                      document.getElementById("rekom").style.display = "block";
                       $("#btn-todo").attr("disabled", true); 

                      if(result.rekom == 0){
                         $('#rekom').val("Belum direkomendasikan ");
                         $('#rekom').css({'class': 'btn btn-danger btn-block'});
                         $('#ket').text("Pilih jangka waktu yang lebih panjang sesuai penghasilan anda");
                         $('#ket').css({'color': '#e31a0b'});
                      }
                      if(result.rekom == 1){
                         $('#rekom').val("Direkomendasikan");
                         $('#ket').text("Silahkan daftar produk sekarang!!");
                         $('#ket').css({'color': 'blue'});
                      }
                      $('#nama_pasangan').text("Hasil Simulasi "+ $('#InputName').val());

                      $('#nilai').text("Cicilan per bulan: "+result.cicilan);
                      $('#nilai').css({'color':'#e31a0b'});
                      $('#query_time').text("Calculating tooks "+result.time+" seconds");
                      $('#total').text("Biaya pendidikan anak diprediksikan menjadi "+result.total+" dalam "+result.years+"tahun");
                       window.top.close();

                      //button simpan
                      $('#btn-save').on("click",function(e) {
                        e.preventDefault();
                        //AJAX
                        $.ajax({
                          url: '{{url("simulasi/sendToAPI")}}', 
                          method: 'POST',
                          data: {
                            "_token" : CSRF_TOKEN,
                            "CIF" : result.cif,
                            "cat" : result.cat,
                            "target" : result.target,
                            "cicilan" : result.cicilan_,
                            "total" : result.total_,
                          }, 
                          success: function(result){
                            var url = document.location.href+"&tab=finished";//+data.cicilan;
                          // document.location = url;
                            window.history.replaceState(null, null, url);
                            alert("Data berhasil disimpan!")
                            //window.close();
                          }
                        }); //AJAX//
                      }); //BUTTON SIMPAN//
                  },
                  error: function (response) {
                    alert("error! "+response); 
                }
         }); 
       });
  });
</script>
</html>