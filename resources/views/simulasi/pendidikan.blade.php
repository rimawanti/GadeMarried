<!DOCTYPE html>
<html>
<head> <meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css"> 
  #hitungulang, #rekom{
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
                  <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>PENDIDIKAN</b></h1>
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
               <form action="#" method="post" class="form-horizontal">
               	{!! csrf_field() !!}
               	 <div class="card-body">
                  <div class="form-group row row">
                    <label for="InputName" class="col-sm-2 col-form-label">Nama </label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" id="InputName" placeholder="Masukkan Nama Anda">
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
                    <input type="text" step="0.01" class="form-control" id="InputGaji" name="InputGaji" placeholder="Enter gaji" value=2000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputPAUD" class="col-sm-2 col-form-label">Biaya Sekolah PAUD saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputPAUD" name="InputPAUD" placeholder="Enter biaya PAUD" value=10000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputTK" class="col-sm-2 col-form-label">Biaya Sekolah TK saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputTK" name="InputTK" placeholder="Enter biaya TK" value=12500000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSD" class="col-sm-2 col-form-label">Biaya Sekolah SD saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputSD" name="InputSD" placeholder="Enter biaya SD" value=27000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSMP" class="col-sm-2 col-form-label">Biaya Sekolah SMP saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputSMP" name="InputSMP" placeholder="Enter biaya SMP" value=30000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSMA" class="col-sm-2 col-form-label">Biaya Sekolah SMA saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputSMA" name="InputSMA" placeholder="Enter biaya SMA" value=32000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputUniv" class="col-sm-2 col-form-label">Biaya Universitas saat ini:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputUniv" name="InputUniv" placeholder="Enter biaya Universitas" value=40000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputWaktu" class="col-sm-2 col-form-label">Jangka waktu menabung (tahun):</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputWaktu" name="InputWaktu" placeholder="Enter waktu menabung" value=1>
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
                <input type="button" value="Hitung Ulang" onClick="window.location.reload();" id="hitungulang" class="btn btn-danger">
                </div>
                </div>
              </div>
            </div>
          </div>
            </div>
 </div>
@endsection
</html>