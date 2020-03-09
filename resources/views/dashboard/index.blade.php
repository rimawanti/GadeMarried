<!DOCTYPE html>
<html>

<head> </head>
<title> Beranda </title>

@extends('partials.layout') @section('content')
<div class="row">
    <!-- <div class="col-md-1">
          </div> -->
    <div class="col-lg-10">
        <div class="info-box bg-warning">
            <!-- <span class="info-box-icon col-md-2">
              <div class="icon">
                <i class="fas fa-chart-pie fa-4x"></i>
              </div></i>
            </span> -->

            <div class="info-box-content col-md-3 col-md-10">
                <span class="info-box-text"><h2 align="center">Saldo Tabungan Emas</h2></span>
                <span class="info-box-number" align="center">25 gram</span>
                <p align="center">Rp17.600.000,00</p>

                <div class="progress" align="center" style="height: 20px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="inner" align="center">
                    <h2>25% dari 100%</h2>

                </div>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
   
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- <section class="content"> -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">

            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content" align="center">
                        <span class="info-box-text">Harga Jual Emas</span>
                        <span class="info-box-number">Rp7.040,00 </span>
                        <span>per 0,01 gram</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box" align="center">
                    <span class="info-box-icon bg-danger"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Harga Beli Emas</span>
                        <span class="info-box-number">Rp6.820,00 </span>
                        <span>per 0,01 gram</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

    </div>

    @endsection

</html>