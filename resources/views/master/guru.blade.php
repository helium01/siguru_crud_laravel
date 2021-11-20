@include('tmp.headercss')
    <title>data guru || admin</title>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/guru"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Data Guru</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/sekolah"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Data Sekolah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/kelurahan"
                                aria-expanded="false">
                                <i class="fa fa-font" aria-hidden="true"></i>
                                <span class="hide-menu">Data Kelurahan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/kecamatan"
                                aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="hide-menu">Data Kecamatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/pengguna"
                                aria-expanded="false">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span class="hide-menu">Data Pengguna</span>
                            </a>
                        </li>
                        
                        <li class="text-center p-20 upgrade-btn">
                            <a href="/logout"
                                class="btn d-grid btn-danger text-white" >
                                Keluar</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="/logout" 
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">keluar
                                </a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <div class="row">
            <div class="white-box col-md-12 col-lg-12 col-sm-12">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Data Guru</h3>
                                <a class="btn btn-primary" href="/cetakguru"> cetak data</a>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                <a class="btn btn-primary" href="#form">tambah data | </a>
            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">NIP</th>
                                            <th class="border-top-0">Nama</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">email</th>
                                            <th class="border-top-0">TTL</th>
                                            <th class="border-top-0">Jabatan</th>
                                            <th class="border-top-0">Sekolah</th>
                                            <th class="border-top-0">opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($guru as $g)
                                        <tr>
                                            <td>{{$g->id_guru}}</td>
                                            <td class="txt-oflo">{{$g->nip}}</td>
                                            <td>{{$g->id_pengguna}}</td>
                                            <td class="txt-oflo">{{$g->alamat}}</td>
                                            <td><span class="text-success">{{$g->email}}</span></td>
                                            <td><span class="text-success">{{$g->ttl}}</span></td>
                                            <td><span class="text-success">{{$g->jabatan}}</span></td>
                                            <td><span class="text-success">{{$g->id_sekolah}}</span></td>
                                            <td><span class="text-success">
                                            <a class="btn btn-primary" href="/guru/edit/{{$g->id_guru}}">edit</a>
                                            <a class="btn btn-danger" href="/guru/del/{{$g->id_guru}}">hapus</a>
                                            </span></td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12" id="form">
            <form action="/guru/upload" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input name="nip" type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">id_pengguna</label>
                    <select name="id_pengguna" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($pengguna as $p)
                    <option value="{{$p->id_pengguna}}">{{$p->id_pengguna}} || {{$p->nama_pengguna}}</option>
                    @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">pastikan email anda benar.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">TTL</label>
                    <input name="ttl" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">jabatan</label>
                    <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">id_sekolah</label>
                    <select name="id_sekolah" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($sekolah as $s)
                    <option value="{{$s->id_sekolah}}">{{$s->id_sekolah}} || {{$s->nama_sekolah}}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('tmp.js')