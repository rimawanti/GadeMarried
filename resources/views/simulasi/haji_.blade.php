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
<script>


</script>
@extends('partials.layout') @section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h1 class="card-title">LAKUKAN SIMULASI PROGRAM <b>HAJIiiiiiiii</b></h1>
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
                        <div class="form-group row row">
                            <label for="InputJangka" class="col-sm-2 col-form-label">Rencana ibadah haji (dalam tahun)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="InputJangka" name="InputJangka" value="1">
                            </div>
                        </div>
                        <div class="form-group row row">
                            <label for="InputJangka" class="col-sm-2 col-form-label">Jumlah jamaah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="InputJamaah" name="InputJamaah" value="1">
                            </div>
                        </div>
                        <div class="form-group row row">
                            <label for="InputPilihan" class="col-sm-2 col-form-label">Pilihan program haji</label>
                            <div class="col-sm-10">
                                {{ Form::radio('status','0',true,array('id' => 'statusRegular','class'=>'')) }} Regular {{ Form::radio('status','1',false,array('id' => 'statusONH','class'=>'')) }} ONH Plus
                            </div>
                        </div>
                        <div class="form-group row row">
                            <label for="InputSaku" class="col-sm-2 col-form-label">Uang saku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="InputanSaku" name="InputSaku" value="5000000" >
                            </div>
                        </div>
                        <div class="form-group row row">
                            <label for="InputJangka" class="col-sm-2 col-form-label">Vaksin meningitis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="InputanVaksin" name="InputVaksin" value="305000">
                            </div>
                        </div>
                        <div class="form-group row row">
                            <label for="InputJangka" class="col-sm-2 col-form-label">Dana Darurat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="InputanDana" name="InputOleh" value="5000000">
                            </div>
                        </div>
                        <div class="form-group row row">
                            <label for="InputJangka" class="col-sm-2 col-form-label">Oleh-oleh</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="InputanOleh" name="InputOleh" value="3000000">
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
                <p id="nilai"> Silahkan masukan data yang ada pada field disamping untuk menampilkan hasil.</p>
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
                             <a href="{{url('/simulasi/haji_umroh')}}"><input type="button" value="Hitung Ulang" id="hitungulang" class="btn btn-danger"></a>
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
                  url: '{{url("simulasi/haji/hitung")}}',
                  method: 'POST',
                  data: { 
                    "_token" : CSRF_TOKEN,
                    "InputOleh" : $('#InputanOleh').val(),
                    "InputVaksin" : $('#InputanVaksin').val(),
                    "InputSaku" : $('#InputanSaku').val(),
                    "InputProgram" : $("input[name='status']:checked").val(),
                    "InputTenor" : $('#InputTenor').val(),
                    "InputJamaah" : $('#InputJamaah').val(),
                    "InputGaji" : $('#InputanGaji').val(),
                    "InputDana" : $('#InputanDana').val(),
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
                      $('#total').text("Biaya haji dan kelengkapannya menjadi "+data.total+" dalam "+data.years+"tahun");

                      var url = document.location.href+"?tab=finished";//+data.cicilan;
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