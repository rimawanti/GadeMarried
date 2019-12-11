<!DOCTYPE html>
<html>
<head> </head>
<title> Profile </title> 


@extends('partials.layout')

@section('content')
  <div class="row">
          <div class="col-lg-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Rimawanti Fauzyah</h3>

                <p class="text-muted text-center">rima@gmail.com</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>CIF: </b> <a class="float-right">1015xxxxxx</a>
                  </li>
                  <li class="list-group-item">
                    <b>Saldo Emas</b> <a class="float-right">2 gr</a>
                  </li>
                   <li class="list-group-item">
                     <a href="{{url('/login')}}" class="btn btn-success"><b>Status program : pending </b></a>
                  </li>
                </ul>
               
                <a href="{{url('/login')}}" class="btn btn-danger btn-block"><b>Logout</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"</a>Data Nasabah</li><li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Portofolio</a></li> <li class="nav-item"><a class="nav-link" href="#settings2" data-toggle="tab"</a>Ubah Password</li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">                    
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">  
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                   
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <div>
                          <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#" class="btn btn-success btn-flat btn-sm">Produk Yang Terdaftar</a></h3>
                            <div class="timeline-body">
                             Gade Married : Nikah Nanti
                            </div>
                          </div>
                        </div>
                  
                     
                      <div>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i>2019-10-12</span>
                          <h3 class="timeline-header"><a href="#" class="btn btn-warning btn-flat btn-sm">Saldo Tabungan Emas</a></h3>
                          <div class="timeline-body">
                            <p><b>14075196xxxxxxx</b></p>
                            Saldo 2 gram
                          </div>
                        </div>
                      </div>

                      <div>
                          <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#" class="btn btn-info btn-flat btn-sm">Total Pinjaman Emas</a></h3>
                            <div class="timeline-body">
                              10 gram
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName" placeholder="" value="Rimawanti Fauzyah">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="" value="rima@gmail.com" readonly="readonly">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName" placeholder="" value="08822xxxxx">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="" value="Rimawanti" readonly="readonly">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="" value="Surabaya"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings2">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Ketik Ulang Kata Sandi Baru</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Proses</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
  </div>

@endsection

</html>