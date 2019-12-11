<!DOCTYPE html>
<html>
<head> </head>
<title> Produk | Daftar </title> 


@extends('partials.layout')

@section('content')
  <div class="row">
  		<div class="col-md-1">
  		</div>
          <!-- left column -->
          <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Silahkan isi form pendaftaran program Gade Married <b>NIKAH NANTI</b> berikut</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/profile')}}">
                <div class="card-body">
                  <div class="form-group">
                    <label >Masukkan jumlah tabungan</label>
                    <input type="number" step=0.01 class="form-control" placeholder="Nomor rekening tabungan emas">
                  </div>
                  <div class="form-group">
                    <label>Masukkan jangka waktu tabungan</label>
                    <input type="number" step=0.01 class="form-control" placeholder="Nomor rekening tabungan emas">
                  </div>
                  <div class="form-group">
                    <label>Masukkan nomor rekening Tabungan emas anda</label>
                    <input type="text" class="form-control" placeholder="Nomor rekening tabungan emas">
                  </div>
                   <div class="form-group">
                    <label>Masukkan nomor KTP anda</label>
                    <input type="text" class="form-control" placeholder="Nomor KTP anda">
                  </div>
                  
                  <div class="form-group">
                    <label>Upload dokumen KTP</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <!-- <span class="input-group-text" id="">Upload</span> -->
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Upload Foto Anda</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                       <!--  <span class="input-group-text" id="">Upload</span> -->
                      </div>
                    </div>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Saya setuju dengan syarat dan ketentuan yang berlaku sesuai dengan program Pegadaian</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>

@endsection

</html>