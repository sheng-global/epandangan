        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" data-tag="site-title"></a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" data-tag="borang"></a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" data-tag="pandangan-awam"></a></li>
                                    <li class="breadcrumb-item active" data-tag="borang-pskl"></li>
                                </ol>
                            </div>
                            <h4 class="page-title" data-tag="borang-pskl"></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

    			<div class="row">
                    <div class="col-md-8">
                        <div class="card-box">

                            <h4 class="header-title mb-3">Borang Pandangan Awam</h4>

                            <div class="alert alert-warning d-none fade show">
                                <h4 data-tag="ralat">Ralat!</h4>
                                <p class="mb-0" data-tag="ralat-keterangan">Terdapat kesalahan dalam pengisian borang anda. Sila semak dan isi dengan betul.</p>
                            </div>

                            <div class="alert alert-info d-none fade show">
                                <h4 data-tag="berjaya">Berjaya!</h4>
                                <p class="mb-0" data-tag="berjaya-keterangan">Borang anda telah lengkap diisi.</p>
                            </div>

                            <div id="rootwizard">
                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                    <li class="nav-item" data-target-form="#accountForm">
                                        <a href="#first" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                            <i class="mdi mdi-account-circle mr-1"></i>
                                            <span class="d-none d-sm-inline"><span data-tag="part"></span> A</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#profileForm">
                                        <a href="#second" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline"><span data-tag="part"></span> B</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#otherForm">
                                        <a href="#third" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><span data-tag="part"></span> C</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-0 b-0">

                                    <div class="tab-pane active show" id="first">
                                        <h4 class="sub-header" data-tag="maklumat-peribadi"></h4>

                                        <form method="post" id="borang-pskl" data-parsley-validate="" enctype="multipart/form-data" action="<?php echo BASE_URL ?>borang/add_pskl">
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="nama_penuh"><span data-tag="nama-penuh"></span> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="nama_penuh" id="nama_penuh" value="<?php echo @$profile[0]['nama_penuh'] ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="ic_passport"><span data-tag="no-ic"></span> <span class="text-danger">*</span></label>
                                                    <input type="text" id="ic_passport" class="form-control" name="ic_passport" required="" data-parsley-type="alphanum" data-parsley-maxlength="12" data-parsley-minlength="6" value="<?php echo @$profile[0]['ic_passport'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <p><span data-tag="kategori"></span> <span class="text-danger">*</span></p>

                                                <div class="radio mb-1 radio-info form-check-inline">
                                                    <input type="radio" name="kategori" id="individu" value="Individu">
                                                    <label for="individu" data-tag="individu"></label>
                                                </div>
                                                <div class="radio radio-info form-check-inline">
                                                    <input type="radio" name="kategori" id="organisasi" value="Organisasi" required="">
                                                    <label for="organisasi" data-tag="organisasi"></label>
                                                </div>
                                            </div>

                                            <div class="form-row hidden" id="row-organisasi">
                                                <div class="form-group col-md-9">
                                                    <label for="nama_organisasi" data-tag="nama-organisasi"></label>
                                                    <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="jumlah_nama" data-tag="jumlah-nama"></label>
                                                    <input type="number" id="jumlah_nama" class="form-control" name="jumlah_nama" data-parsley-type="number" value="1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat"><span data-tag="alamat"></span> <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" required="" value="<?php echo @$profile[0]['alamat'] ?>">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="poskod"><span data-tag="poskod"></span> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="poskod" id="poskod" required="" data-parsley-type="number" data-parsley-minlength="5" value="<?php echo @$profile[0]['poskod'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="telefon_rumah" data-tag="telefon-rumah"></label>
                                                    <input type="text" class="form-control" name="telefon_rumah" id="telefon_rumah" value="<?php echo @$profile[0]['telefon_rumah'] ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="telefon_pejabat" data-tag="telefon-pejabat"></label>
                                                    <input type="text" class="form-control" name="telefon_pejabat" id="telefon_pejabat" value="<?php echo @$profile[0]['telefon_pejabat'] ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="telefon_bimbit"><span data-tag="telefon-bimbit"></span> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="telefon_bimbit" id="telefon_bimbit" required="" value="<?php echo @$profile[0]['telefon_bimbit'] ?>">
                                                </div>
                                            </div>
                                        
                                    </div>

                                    <div class="tab-pane fade" id="second">
                                        <h4 class="sub-header" data-tag="pengesahan-kehadiran"></h4>
                                        <div class="form-group">
                                            <p><span data-tag="soalan-kehadiran"></span> <span class="text-danger">*</span></p>

                                            <div class="radio mb-1 radio-success form-check-inline">
                                                <input type="radio" name="hadir" id="ya" value="Ya">
                                                <label for="ya" data-tag="hadir-ya"></label>
                                            </div>
                                            <div class="radio radio-danger form-check-inline">
                                                <input type="radio" name="hadir" id="tidak" value="Tidak" required="">
                                                <label for="tidak" data-tag="hadir-tidak"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="third">

                                        <div id="accordion" class="mb-3">
                                            <div class="card mb-1">

                                                <div class="card-header" id="heading00">
                                                    <h5 class="m-0">
                                                        <a class="text-dark collapsed" data-toggle="collapse" href="#collapse00" aria-expanded="true">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Bab 1: Pelan Struktur Kuala Lumpur
                                                        </a>
                                                    </h5>
                                                </div>

                                                <div id="collapse00" class="collapse" aria-labelledby="heading00" data-parent="#accordion" style="">
                                                    <div class="card-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="pandangan_awam_bab_1">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                <textarea id="pandangan_awam_bab_1" class="form-control" name="pandangan_awam_bab_1" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="justifikasi_bab_1">Justifikasi <span class="text-danger">*</span></label>
                                                                <textarea id="justifikasi_bab_1" class="form-control" name="justifikasi_bab_1" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="card mb-1">

                                                <div class="card-header" id="heading01">
                                                    <h5 class="m-0">
                                                        <a class="text-dark collapsed" data-toggle="collapse" href="#collapse01" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Bab 2: Kuala Lumpur Bandar Untuk Semua
                                                        </a>
                                                    </h5>
                                                </div>
                                    
                                                <div id="collapse01" class="collapse" aria-labelledby="heading01" data-parent="#accordion" style="">
                                                    <div class="card-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-1">

                                                <div class="card-header" id="headingOne">
                                                    <h5 class="m-0">
                                                        <a class="text-dark collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Matlamat 1: Inovatif dan Produktif (IP)
                                                        </a>
                                                    </h5>
                                                </div>
                                    
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                                    <div class="card-body">
                                                        <div id="matlamat-1">
                                                            <h6 class="sub-header">Hala Tuju Strategik IP 1: Pertumbuhan Ekonomi Bandar yang Berdaya Saing (IP 1.1, IP 1.2, IP 1.3)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik IP 2: Persekitaran Kerja dan Niaga yang Kondusif (IP 2.1, IP 2.2, IP 2.3, IP 2.4)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik IP 3: Pemangkin Pertumbuhan Ekonomi Wilayah yang Dinamik dan Kukuh (IP 3.1, IP 3.2, IP 3.3)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-1">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="m-0">
                                                        <a class="text-dark" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Matlamat 2: Inklusif dan Saksama (IS)
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div id="matlamat-2">
                                                            <h6 class="sub-header">Hala Tuju Strategik IS 1: Perumahan untuk Semua Golongan Penduduk (IS 1.1, IS 1.2, IS 1.3, IS 1.4)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik IS 2: Kejiranan yang Berkualiti, Kondusif dan Menggalakkan Interaksi Sosial (IS 2.1, IS 2.2, IS 2.3, IS 2.4, IS 2.5)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-1">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="m-0">
                                                        <a class="text-dark collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Matlamat 3: Sihat dan Vibrant (SV)
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                                    <div class="card-body">
                                                        <div id="matlamat-3">

                                                            <h6 class="sub-header">Hala Tuju Strategik SV 1: Pembangunan Bandar yang Mengintegrasikan Alam Semula Jadi (SV 1.1, SV 1.2, SV 1.3)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik SV 2: Persekitaran Bandar yang Menarik dan Kreatif (SV 2.1, SV 2.2, SV 2.3)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik SV 3: Rangkaian Hijau dan Warisan Bandar (SV 3.1, SV 3.2, SV 3.3, SV 3.4)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik SV 4: Tadbir Urus Hijau yang Efektif (SV 4.1, SV 4.2, SV 4.3)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-1">
                                                <div class="card-header" id="headingFour">
                                                    <h5 class="m-0">
                                                        <a class="text-dark" data-toggle="collapse" href="#collapseFour" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Matlamat 4: Pintar Iklim dan Rendah Karbon (PR)
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseFour" class="collapse show" aria-labelledby="collapseFour" data-parent="#accordion" style="">
                                                    <div class="card-body">
                                                        <div id="matlamat-4">

                                                            <h6 class="sub-header">Hala Tuju Strategik PR 1: aya Tahan Terhadap Bencana Alam dan Perubahan Iklim (PR 1.1)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik PR 2: Kecekapan Pengurusan Sumber Bandar (PR 2.1, PR 2.2, PR 2.3, PR 2.4, PR 2.5)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik PR 3: Kecekapan dalam Pengurangan Perlepasan Karbon (PR 3.1, PR 3.2, PR 3.3, PR 3.4)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                            <h6 class="sub-header">Hala Tuju Strategik PR 4: Pembangunan Komuniti yang Rendah Karbon (PR 4.1, PR 4.2, PR 4.3, PR 4.4)</h6>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="pandangan_awam_bab_2">Pandangan Awam/Cadangan <span class="text-danger">*</span></label>
                                                                    <textarea id="pandangan_awam_bab_2" class="form-control" name="pandangan_awam_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="justifikasi_bab_2">Justifikasi <span class="text-danger">*</span></label>
                                                                    <textarea id="justifikasi_bab_2" class="form-control" name="justifikasi_bab_2" rows="5" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-1">
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="m-0">
                                                        <a class="text-dark" data-toggle="collapse" href="#collapseFive" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Matlamat 5 <span class="text-danger">*</span>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseFive" class="collapse show" aria-labelledby="collapseFive" data-parent="#accordion" style="">
                                                    <div class="card-body">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-1">
                                                <div class="card-header" id="headingSix">
                                                    <h5 class="m-0">
                                                        <a class="text-dark" data-toggle="collapse" href="#collapseSix" aria-expanded="false">
                                                            <i class="mdi mdi-help-circle mr-1 text-primary"></i> 
                                                            Matlamat 6 <span class="text-danger">*</span>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseSix" class="collapse show" aria-labelledby="collapseSix" data-parent="#accordion" style="">
                                                    <div class="card-body">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <input type="hidden" name="token" value="<?php echo $token ?>">
                                            <input type="submit" class="btn btn-warning" id="save" value="Simpan">
                                            <input type="submit" class="btn btn-success" name="submit" value="Hantar">
                                        </div>

                                    </form>
                                    </div>

                                    <ul class="list-inline wizard mb-0">
                                        <li class="previous list-inline-item"><a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                        </li>
                                        <li class="next list-inline-item float-right"><a href="javascript: void(0);" class="btn btn-secondary">Next</a></li>
                                    </ul>

                                </div> <!-- tab-content -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Panduan Mengisi Borang Pandangan Awam</h4>

                                <p class="card-text">Ruangan bertanda (<span class="text-danger">*</span>) adalah ruangan wajib diisi.</p>
                                
                                <h5 class="card-title">Bahagian A</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Sila isikan maklumat dengan lengkap.</li>
                                        <li>Sila masukkan nombor kad pengenalan anda dalam format 12 digit pada bahagian No. IC/Passport (tanpa simbol -)</li>
                                        <li>Pilih kategori samada <strong class="text-dark">Individu</strong> bagi perseorangan atau <strong class="text-dark">Agensi/Organisasi</strong> bagi wakil kepada kumpulan, persatuan, NGO atau syarikat.</li>
                                        <li>Jika anda mewakili <strong class="text-dark">Agensi/Organisasi</strong> dan menghantar memorandum, sila masukkan jumlah nama tandatangan memorandum berkenaan dalam ruangan <strong class="text-dark">Jumlah nama</strong></li>
                                        <li>Jika anda menghantar memorandum, sila muat naik memorandum berkenaan dalam ruangan <strong class="text-dark">Lampiran 1</strong></li>
                                    </ol>
                                </p>

                                <h5 class="card-title">Bahagian B</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Setiap individu/kumpulan diberi pilihan untuk menghadiri atau tidak ke Jawatankuasa Pendengaran Pandangan Awam. Sila tandakan pilihan anda.</li>
                                    </ol>
                                </p>

                                <h5 class="card-title">Bahagian C</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Sila gunakan ruang yang telah disediakan untuk memberi pandangan.</li>
                                        <li>Pandangan awam perlulah berkaitan dengan kandungan Draf Pelan Struktur Kuala Lumpur 2040 sahaja.</li>
                                        <li>Pandangan awam mestilah berasaskan kepada keperluan masyarakat umum dan tidak kepada kepentingan individu.</li> 
                                        <li>Pandangan awam secara bertulis sahaja yang akan didengar dan dipertimbangkan oleh Jawatankuasa Pendengaran Pandangan Awam.</li>
                                    </ol>
                                </p>
                                <div class="alert alert-info" role="alert">
                                    <i class="mdi mdi-alert-circle-outline mr-2"></i> Maklumat lanjut mengenai Draf Pelan Struktur Kuala Lumpur 2040 boleh diperoleh dengan menghubungi talian 03 – 2617 9512 / 9519 (Seksyen Perancangan Pelan Tempatan, Jabatan Perancangan Bandaraya).
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="mdi mdi-alert-outline mr-2"></i>
                                    <p>Borang yang telah lengkap diisi hendaklah dihantar sebelum 17 Mac 2020 (Selasa)</p>
                                    <div data-countdown="2020/03/17"></div>
                                </div>
                                
                            </div>
                        </div> <!-- end card-box-->
                    </div>
                </div> <!-- End Row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->