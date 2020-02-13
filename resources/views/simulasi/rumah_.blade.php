<!DOCTYPE html>
<html>

<head> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style type="text/css"> 
      #hitungulang, 
      #rekom {
        display: none;
      }
  </style>
</head>
<title> Simulasi </title> 


@extends('partials.layout')

@section('content')
<div class="row">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>RUMAH</b></h1>
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
          {!! Form::open(array('class' => 'form-horizontal','files' => true)) !!}
          <!-- <form action="#" method="post" class="form-horizontal" --> 
          {!! csrf_field() !!}
          <div class="card-body">
            <div class="form-group row row">
              <label for="InputName" class="col-sm-2 col-form-label">Nama </label>
              <div class="col-sm-10">
                  {{  Form::text('InputName',null,array('class' => 'form-control','placeholder'=>'Masukkan nama')) }}
              </div>
            </div>
            <!-- <div class="form-group row row">
              <label for="PilihProvinsi" class="col-sm-2 col-form-label">Provinsi</label>
              <div class="col-sm-10">
                <select class="custom-select" id="InputProvinsi">
                  <option selected>--Pilih Provinsi--</option>
                  <option value="DKI Jakarta">DKI Jakarta</option>
                  <option value="Jawa Barat">Jawa Barat</option>
                </select>
              </div>
            </div> -->
            <!-- <div class="form-group row row">
              <label for="PilihKota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
              <div class="col-sm-10">
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>--Pilih Kota/Kabupaten--</option>
                  <option value="Jakarta Utara">Jakarta Utara</option>
                  <option value="Jakarta Timur">Jakarta Timur</option>
                  <option value="Jakarta Selatan">Jakarta Selatan</option>
                  <option value="Jakarta Barat">Jakarta Barat</option>
                  <option value="Jakarta Pusat">Jakarta Pusat</option>
                  <option value="Kepulauan Seribu">Kepulauan Seribu</option>
                </select>
              </div>
            </div> -->
            <!-- <div class="form-group row row">
              <label for="InputTanah" class="col-sm-2 col-form-label">Luas Tanah (meter persegi)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputTanah" placeholder="Enter Luas Tanah">
              </div>
            </div>
            <div class="form-group row row">
              <label for="InputBangunan" class="col-sm-2 col-form-label">Luas Bangunan (meter persegi)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputBangunan" placeholder="Enter Luas Bangunan">
              </div>
            </div> -->
            <div class="form-group row row">
              <label for="InputRumah" class="col-sm-2 col-form-label">Harga Jual Rumah </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputRumah" placeholder="Enter Harga Jual Rumah">
              </div>
            </div>
            <div class="form-group row row">
              <label for="InputTidakPajak" class="col-sm-2 col-form-label">NPOPTKP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputTidakPajak" placeholder="Enter Nilai Perolehan Objek Pajak Tidak Kena Pajak">
              </div>
            </div> -->
            <!-- <div class="form-group row row">
              <label for="InputNJOP" class="col-sm-2 col-form-label">Harga Sesuai NJOP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputNJOP" placeholder="Enter Harga Sesuai NJOP">
              </div>
            </div>
            <div class="form-group row row">
              <label for="InputNJOPTKP" class="col-sm-2 col-form-label">NJOPTKP/NPTKP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputNJOPTKP" placeholder="Enter NJOPTKP/NPTKP">
              </div>
            </div>
            <div class="form-group row row">
              <label for="InputPPnBM" class="col-sm-2 col-form-label">Pajak Pembelian Barang Mewah</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputPPnBM" placeholder="Enter Pajak Pembelian Barang Mewah">
              </div>
            </div> -->
            <!-- <div class="form-group row row">
              <label for="InputAsuransi" class="col-sm-2 col-form-label">Asuransi Kebakaran</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputAsuransi" placeholder="Enter Asuransi Kebakaran">
              </div>
            </div> -->
            <!-- <div class="form-group row row">
              <label for="InputBiayaNotaris" class="col-sm-2 col-form-label">Biaya Notaris/PPAT</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="InputBiayaNotaris" placeholder="Enter Biaya Notaris/PPAT">
              </div>
            </div> -->
            <div class="form-group row row">
              <label for="InputJangka" class="col-sm-2 col-form-label">Rencana Pembelian Rumah (dalam tahun)</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" id="InputJangka" name="InputJangka" value="1">
              </div>
            </div>
            <div class="form-group row">
              <label for="InputGaji" class="col-sm-2 col-form-label">Penghasilan per bulan (total)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="InputGaji" name="InputGaji" placeholder="Enter gaji" value=2000000>
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
          <!-- </form> -->
          {!! Form::close() !!}
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">

</script>
<script type="text/javascript" >
  $(function(){
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       var isEmpty = false;

       $('#btn-todo').on("click",function(e) {
        e.preventDefault();
         $.ajax({
                  url: '{{url("simulasi/rumah/hitung")}}',
                  method: 'POST',
                  data: { 
                    "_token" : CSRF_TOKEN,
                    "InputTanah" : $('#InputTanah').val(),
                    "InputRumah" : $('#InputRumah').val(),
                    "InputProvinsi" : $("input[name='status']:checked").val(),
                    "InputTenor" : $('#InputTenor').val(),
                    "InputGaji" : $('#InputGaji').val(),
                    "InputJangka" : $('#InputJangka').val(),
                  },
                  success: function(data)
                  {
                      var data= $.parseJSON(data);

                      document.getElementById("hitungulang").style.display = "block"; 
                      document.getElementById("rekom").style.display = "block";
                       $("#btn-todo").attr("disabled", true); 

                      if(data.rekom == 0){
                         $('#rekom').val("Belum direkomendasikan ");
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

                      $('#nilai').text("Cicilan per bulan: "+data.cicilan);
                      $('#nilai').css({'color':'#e31a0b'});
                      $('#query_time').text("Calculating tooks "+data.time+" seconds");
                      $('#total').text("Biaya beli rumah "+data.total+" dalam "+data.years+"tahun");

                      var url = document.location.href+"/"+data.cicilan;
                      // document.location = url;
                      window.history.replaceState(null, null, url);
                  },
                  error: function (response) {
                    alert("error! "+response); 
                  }
         }); 
       });
  });
</script>

</html>