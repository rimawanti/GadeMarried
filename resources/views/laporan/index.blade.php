<!DOCTYPE html>
<html>
<head> </head>
<title> Laporan | Index </title> 


@extends('partials.layout')

@section('content')
   <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Berikut adalah print out laporan. You can click the print button or save to your directory.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Jumlah pembayaran</th>
                      <th>Description</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>01/Okt/2019</td>
                      <td>Rp 500.000,-</td>
                      <td>success</td>
                      <td>Rp 500.000,-</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>01/Nov/2019</td>
                      <td>Rp 500.000,-</td>
                      <td>success</td>
                      <td>Rp 1.000.000,-</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>01/Nov/2019</td>
                      <td>Rp 500.000,-</td>
                      <td>success</td>
                      <td>Rp 1.500.000,-</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>01/Jan/2019</td>
                      <td>Rp 500.000,-</td>
                      <td>success</td>
                      <td>Rp 2.000.000,-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Silahkan melakukan pembayaran menggunakan pembayaran- pembayaran berikut
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 01/Jan/2021</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp 2.000.000,-</td>
                      </tr>
                      <tr>
                        <th>Sisa pembayaran:</th>
                        <td>Rp 3.000.000,-</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> -->
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->

@endsection

</html>