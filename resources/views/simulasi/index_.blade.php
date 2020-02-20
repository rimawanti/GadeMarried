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
                  <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>MENIKAH</b></h1>
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
               <form action="getHitungNikah" method="post" class="form-horizontal">
               	{!! csrf_field() !!}
               	 <div class="card-body">
                  <div class="form-group row row">
                    <label for="InputName" class="col-sm-2 col-form-label">Nama dan Nama Pasangan</label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" id="InputName" placeholder="Enter Nama Pasangan">
                    </div>
                  </div>
                  <div class="form-group row row">
                    <label for="InputJangka" class="col-sm-2 col-form-label" >Rencana pernikahan (dalam tahun)</label>
                    <div class="col-sm-10">
                   	<input type="text" class="form-control" id="InputJangka" name="InputJangka" placeholder="Dalam tahun" value=1>
                	</div>
                  </div>
                  <div class="form-group row row">
                    <label for="InputPra" class="col-sm-2 col-form-label">Dana pra wedding</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="InputanPra" name="InputPra" placeholder="Enter dana pernikahan" value=1000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputSouvenir" class="col-sm-2 col-form-label">Dana souvenir (per undangan)</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="InputanSouvenir" name="InputSouvenir" placeholder="Enter dana souvenir" value=5000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputUndangan" class="col-sm-2 col-form-label">Banyak Undangan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="InputUndangan" name="InputUndangan" placeholder="Enter dana undangan" value=100>
               	 	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputCatering" class="col-sm-2 col-form-label">Biaya Catering</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="InputanCatering" name="InputCatering" placeholder="Enter dana catering" value=10000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputMUA" class="col-sm-2 col-form-label">Biaya MUA</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="InputanMUA" name="InputMUA" placeholder="Enter dana MUA" value=1000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputVenue" class="col-sm-2 col-form-label">Biaya Gedung/Rumah</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="InputanVenue" name="InputVenue" placeholder="Enter dana Venue" value=10000000>
               		</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputVendor" class="col-sm-2 col-form-label">Biaya Wedding/Event Organizer</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="InputanVendor" name="InputVendor" placeholder="Enter dana WO" value=1000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputDekor" class="col-sm-2 col-form-label">Biaya Dekorasi</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="InputanDekor" name="InputDekor" placeholder="Enter Dekorasi" value=10000000>
                	</div>
                  </div>
                  <div class="form-group row">
                    <label for="InputGaji" class="col-sm-2 col-form-label">Penghasilan per bulan (total)</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="InputanGaji" name="InputGaji" placeholder="Enter gaji" value=2000000>
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
                    <a href="{{url('/simulasi/nikah')}}"><input type="button" value="Hitung Ulang" id="hitungulang" class="btn btn-danger"></a>
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

       $('#btn-todo').on("click",function(e) {
        e.preventDefault();
         $.ajax({
                  url: '{{url("simulasi/nikah/hitung")}}',
                  method: 'POST',
                  data: { 
                    "_token" : CSRF_TOKEN,
                    "catering" : $('#InputanCatering').val(),
                    "vendor" : $('#InputanVendor').val(),
                    "dekor" : $('#InputanDekor').val(),
                    "mua" : $('#InputanMUA').val(),
                    "pra" : $('#InputanPra').val(),
                    "venue" : $('#InputanVenue').val(),
                    "gaji" : $('#InputanGaji').val(),
                    "souvenir" : $('#InputanSouvenir').val(),
                    "undangan" : $('#InputUndangan').val(),
                    "jangka" : $('#InputJangka').val(),

                  },
                  success: function(data)
                  {
                      var data= $.parseJSON(data);
                      //window.location.href = "nilai/"+data.cicilan;
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
                      $('#total').text("Biaya pernikahan diprediksikan menjadi "+data.total);

                      var url = document.location.href+"/"+data.cicilan;
                      // document.location = url;
                      window.history.replaceState(null, null, url);
                  }
         }); 
       });
  });
</script>

</html>