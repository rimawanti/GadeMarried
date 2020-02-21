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
                  <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>KENDARAAN</b></h1>
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
                    <label for="InputKendaraan" class="col-sm-2 col-form-label" >Tipe Kendaraan</label>
                     <div class="col-sm-10">
                        <select id="InputKendaraan" class="form-control">
                          <option value="0">Mobil</option>
                          <option value="1">Motor</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row row">
                    <label for="InputHarga" class="col-sm-2 col-form-label" >Harga OTR</label>
                    <div class="col-sm-10">
                   	<input type="text" class="form-control" id="InputanHarga" name="InputHarga" placeholder="Dalam rupiah" value=1>
                	  </div>
                  </div>
                  <div class="form-group row">
                    <label for="InputBiayaSurat" class="col-sm-2 col-form-label">Biaya Surat Kendaraan</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaSurat" name="InputBiayaSurat" placeholder="Enter biaya" value=2000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputBiayaAsuransi" class="col-sm-2 col-form-label">Biaya Asuransi Kendaraan:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanBiayaAsuransi" name="InputBiayaAsuransi" placeholder="Enter biaya Asuransi" value=10000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputAdministrasi" class="col-sm-2 col-form-label">Biaya Administrasi:</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanAdministrasi" name="InputAdministrasi" placeholder="Enter biaya Adminstrasi" value=12500000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="PenghasilanPerbulan" class="col-sm-2 col-form-label">Penghasilan Perbulan (total):</label>
                    <div class="col-sm-10">
                    <input type="text" step="0.01" class="form-control" id="InputanGaji" name="InputGaji" placeholder="Enter penghasilan perbulan" value=27000000>
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