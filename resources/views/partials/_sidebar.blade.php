 <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="{{ asset('dist/img/user4-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Rimawanti Fauzyah</a>
        </div> -->
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- <li class="nav-item">
            <a href="{{url('/')}}" class="{{Request::is('/') ? "nav-link active" : "nav-link"}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
               <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/produk')}}" class="{{ Request::segment(1) === 'produk' ? "nav-link active" : "nav-link"}}">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Informasi Produk
              </p>
            </a>
          </li> -->
          <li class="{{ Request::segment(1) === 'simulasi' ? "nav-item has-treeview menu-open" : "nav-item has-treeview"}}">
            <a class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Simulasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/simulasi/nikah')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'nikah'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menikah</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{url('/simulasi/pinjam')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'pinjam'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nikah Sekarang</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('/simulasi/pendidikan')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'pendidikan'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/simulasi/rumah')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'rumah'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rumah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/simulasi/kendaraan')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'kendaraan'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kendaraan</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{url('/simulasi/travel')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'travel'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Travelling</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('/simulasi/haji_umroh')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'haji_umroh'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Haji</p>
                </a>
              </li>
              <!--  <li class="nav-item">
                <a href="{{url('/simulasi/pinjam')}}" class="{{ Request::segment(1) === 'simulasi' && Request::segment(2) === 'pinjam'  ? "nav-link active" : "nav-link"}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Others</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="{{url('/profile')}}" class="{{ Request::segment(1) === 'profille' ? "nav-link active" : "nav-link"}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/laporan')}}" class="{{ Request::segment(1) === 'laporan' ? "nav-link active" : "nav-link"}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/contact')}}" class="{{ Request::segment(1) === 'contact' ? "nav-link active" : "nav-link"}}">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Contact
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->