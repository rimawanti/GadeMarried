<!DOCTYPE html>
<html>
<head> <meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css"> #hitungulang, #rekom{
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
                  <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>NIKAH SEKARANG</b></h1>
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
                 <form  method="post" class="form-horizontal">
                  {!! csrf_field() !!}
                   <div class="card-body">
                    <div class="form-group row row">
                      <label for="InputName" class="col-sm-2 col-form-label">Nama dan Nama Pasangan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="InputName" placeholder="Enter Nama Pasangan">
                      </div>
                    </div>
                    <div class="form-group row row">
                      <label for="InputJangka" class="col-sm-2 col-form-label">Rencana cicilan (dalam tahun)</label>
                      <div class="col-sm-10">
                      <input type="number" class="form-control" id="InputJangka" name="InputJangka" placeholder="Dalam tahun" value="1">
                    </div>
                    </div>
                    <div class="form-group row row">
                      <label for="InputPinjaman" class="col-sm-2 col-form-label">Dana Pinjaman Pernikahan</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="InputPinjaman" name="InputPinjaman" placeholder="Enter dana pernikahan" value="30000000">
                    </div>

                    </div>
                    <div class="form-group row">
                      <label for="InputGaji" class="col-sm-2 col-form-label">Penghasilan per bulan (total)</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="InputGaji" name="InputGaji" placeholder="Enter gaji" value="3000000">
                    </div>
                    </div>
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="Check1">
                      <label class="form-check-label" for="Check1">Check me out</label>
                    </div>-->

                  </div> <!-- /.card-body -->

                  <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary">HITUNG</button> -->
                  </div>
                  <div class="d-flex flex-row justify-content-end">
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
                  <h3 class="lead" id="nama_pasangan">HASIL SIMULASI</h3>
                  <!-- <a href="{{url('/produk')}}">Info produk</a> -->
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    
                  </p>

                <div class="position-relative mb-4">
                  <div class="container"> 
                    <!-- <img src="GM Logo.png" alt="GM2"
                         class="img-circle" alt="Responsive Image" 
                         width="307" height="240" />  -->
                          <h4 id="nilai"> Silahkan masukan data yang ada pada field disamping untuk menampilkan hasil.</h4>
                          <input type="button" class="btn btn-primary" id="rekom">
                          <h6 id="ket"><strong></strong></h6>
                         <h5 id="sewamodal"> </h5>
                         <p id="query_time"><i></i></p>
                </div>
                <div class="d-flex flex-row justify-content-end">
                <input type="button" value="Hitung Ulang" onClick="window.location.reload();" id="hitungulang" class="btn btn-danger">
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
<script type="text/javascript">
  $(function(){
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var isEmpty = false;

       $('#btn-todo').on("click",function() {
         $.ajax({
                   url: 'hitungPinjaman',
                  method: 'POST',
                  data: { 
                    "_token" : CSRF_TOKEN,
                    "pinjaman" : $('#InputPinjaman').val(),
                    "jangka" : $('#InputJangka').val(),
                    "gaji" : $('#InputGaji').val(),
          
                  },
                  success: function(data)
                  {
                      var data= $.parseJSON(data);
                      // document.getElementById("loader-no-spin").style.display = "none";
                      // document.getElementById("loader").style.display = "none"; 
                      // $('#simpan').show();
                      //alert(data.nilai)
                      document.getElementById("rekom").style.display = "block"; 
                      // $('#simpan').show();
                      //alert(data.nilai)
                      if(data.rekom == 0){
                         $('#rekom').val("Belum direkomendasikan");
                         $('#rekom').css({'class': 'btn btn-danger btn-block'});
                         $('#ket').text("Pilih jangka waktu yang lebih panjang sesuai penghasilan anda");
                         $('#ket').css({'color': '#e31a0b'});
                      }
                      if(data.rekom == 1){
                         $('#rekom').val("Direkomendasikan");
                         $('#ket').text("Silahkan daftar produk sekarang!!");
                         $('#ket').css({'color': 'blue'});
                      }
                      $('#nama_pasangan').text("Hasil Simulasi "+ $('#InputName').val());
                      $('#nilai').text("Biaya cicilan per bulan Rp"+data.cicilan);
                      $('#nilai').css({'color': '#e31a0b'});
                      $('#sewamodal').text("Sewa modal= "+data.sewamodal);
                      $('#query_time').text("Calculating tooks "+data.time+" seconds");
                     
                  }
         }); 
       });
  });
</script>

</html>