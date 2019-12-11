<!DOCTYPE html>
<html>
<head> </head>
<title> Produk | Index </title> 


@extends('partials.layout')

@section('content')
<div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Nikah Nanti</h3>
                  <a href="javascript:void(0);">Selengkapnya</a>
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
                   
                  <img src="img/GM-Logo.jpg" alt="GM1"
                       class="img-circle" alt="Responsive Image" 
                       width="307" height="240" /> 
                       <p> Produk Pegadaian berupa tabungan emas berjangka yang besaran dan jangka waktu angsurannya dapat disesuaikan dengan kebutuhan nasabah. Dapatkan berbagai macam keuntungan mulai dari gratis cetak emas hingga gratis mahar!</p>
                </div> 
                <div class="d-flex flex-row justify-content-end">
                <a href="{{url('/produk/daftarTabungan')}}"><input type="button" class="btn btn-primary" value="daftar"></a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Nikah Sekarang</h3>
                  <a href="javascript:void(0);">Selengkapnya</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    
                  </p>

                <div class="position-relative mb-4">
                  <div class="container"> 
                    <img src="img/GM-Logo.jpg" alt="GM2"
                         class="img-circle" alt="Responsive Image" 
                         width="307" height="240" /> 
                         <p> Memperoleh dana pinjaman untuk pembiayaan pernikahan yang dapat diangsur hingga 3 tahun dengan jaminan berupa tabungan emas dengan minimum saldo yang ditentukan.</p>
                </div>
                <div class="d-flex flex-row justify-content-end">
                <a href="{{url('/produk/daftar')}}"><input type="button" value="daftar" class="btn btn-primary"></a>
                </div>
                </div>
              </div>
            </div>
          </div>
            </div>
 </div>

@endsection

</html>