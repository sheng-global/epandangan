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
                                    <li class="nav-item" data-target-form="#first">
                                        <a href="#first" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                            <i class="mdi mdi-account-circle mr-1"></i>
                                            <span class="d-none d-sm-inline"><span data-tag="part"></span> A</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#second">
                                        <a href="#second" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline"><span data-tag="part"></span> B</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-target-form="#third">
                                        <a href="#third" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><span data-tag="part"></span> C</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-0 b-0">

                                    <div class="tab-pane active show" id="first">
                                        <h4 class="sub-header" data-tag="maklumat-peribadi"></h4>

                                        <form method="post" id="borang-pskl" data-parsley-validate="" enctype="multipart/form-data" action="<?php echo BASE_URL ?>borang/add_pskl" class="borang-pskl">
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
                                        <h4 class="sub-header">Pengesahan Kehadiran ke Sesi Pendengaran Pandangan Awam</h4>
                                        <div class="form-group">
                                            <p><span data-tag="soalan-kehadiran"></span> <span class="text-danger">*</span></p>

                                            <div class="radio mb-1 radio-success form-check-inline">
                                                <input type="radio" name="hadir" id="ya" value="Ya" required="">
                                                <label for="ya" data-tag="hadir-ya"></label>
                                            </div>
                                            <div class="radio radio-danger form-check-inline">
                                                <input type="radio" name="hadir" id="tidak" value="Tidak">
                                                <label for="tidak" data-tag="hadir-tidak"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="third">

                                        <div class="card mb-1">

                                            <div class="card-header">
                                                <h5 class="m-0">Bentuk dan Kandungan Dokumen</h5>
                                            </div>

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="komen_bentuk_kandungan">Pandangan/Cadangan <span class="text-danger">*</span></label>
                                                    <textarea id="komen_bentuk_kandungan" class="form-control" name="komen_bentuk_kandungan" rows="5" placeholder="Sila nyatakan" required=""></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card mb-1">

                                            <div class="card-header">
                                                <h5 class="m-0">Matlamat <span id="matlamat_title"></span></h5>
                                            </div>
                                    
                                            <div class="card-body">

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="matlamat_1">Matlamat <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="matlamat[]" id="matlamat_1">
                                                            <option value="">- Pilih -</option>
                                                            <?php foreach ($matlamat as $value): ?>
                                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="halatuju_1">Halatuju <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="halatuju[]" id="halatuju_1">
                                                            <option value="">- Pilih -</option>
                                                            <?php foreach ($halatuju as $value): ?>
                                                            <option value="<?php echo $value['id'] ?>" class="<?php echo $value['matlamat_id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="tindakan_1">Tindakan <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="tindakan[]" id="tindakan_1">
                                                            <option value="">- Pilih -</option>
                                                            <?php foreach ($tindakan as $value): ?>
                                                            <option value="<?php echo $value['id'] ?>" class="<?php echo $value['halatuju_id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div id="borang_pandangan_1">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="cadangan_1">Pandangan/Cadangan <span class="text-danger">*</span></label>
                                                            <textarea id="cadangan_1" class="form-control" name="cadangan[]" rows="5" placeholder="Contoh: Selaraskan Syarat Nyata" required=""></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="justifikasi_1">Justifikasi <span class="text-danger">*</span></label>
                                                            <textarea id="justifikasi_1" class="form-control" name="justifikasi[]" rows="5"placeholder="Contoh: Selaraskan Syarat Nyata" required=""></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <button type="button" class="btn btn-warning" id="btnAdd1">Tambah</button>
                                                    </div>
                                                </div>

                                                <div id="borang_matlamat_2">

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="matlamat_2">Matlamat <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="matlamat[]" id="matlamat_2">
                                                                <option value="">- Pilih -</option>
                                                                <?php foreach ($matlamat as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="halatuju_2">Halatuju <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="halatuju[]" id="halatuju_2">
                                                                <option value="">- Pilih -</option>
                                                                <?php foreach ($halatuju as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>" class="<?php echo $value['matlamat_id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="tindakan_2">Tindakan <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="tindakan[]" id="tindakan_2">
                                                                <option value="">- Pilih -</option>
                                                                <?php foreach ($tindakan as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>" class="<?php echo $value['halatuju_id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div id="borang_pandangan_2">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="cadangan_2">Pandangan/Cadangan <span class="text-danger">*</span></label>
                                                                <textarea id="cadangan_2" class="form-control" name="cadangan[]" rows="5" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="justifikasi_2">Justifikasi <span class="text-danger">*</span></label>
                                                                <textarea id="justifikasi_2" class="form-control" name="justifikasi[]" rows="5"placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <button type="button" class="btn btn-warning" id="btnAdd2">Tambah</button>
                                                            <button type="button" class="btn btn-danger" id="btnDel2">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="borang_matlamat_3">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="matlamat_3">Matlamat <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="matlamat[]" id="matlamat_3">
                                                                <option value="">- Pilih -</option>
                                                                <?php foreach ($matlamat as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="halatuju_3">Halatuju <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="halatuju[]" id="halatuju_3">
                                                                <option value="">- Pilih -</option>
                                                                <?php foreach ($halatuju as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>" class="<?php echo $value['matlamat_id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="tindakan_3">Tindakan <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="tindakan[]" id="tindakan_3">
                                                                <option value="">- Pilih -</option>
                                                                <?php foreach ($tindakan as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>" class="<?php echo $value['halatuju_id'] ?>"><?php echo $value['tajuk'] ?></option>
                                                            <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="borang_pandangan_3">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="cadangan_3">Pandangan/Cadangan <span class="text-danger">*</span></label>
                                                                <textarea id="cadangan_3" class="form-control" name="cadangan[]" rows="5" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="justifikasi_3">Justifikasi <span class="text-danger">*</span></label>
                                                                <textarea id="justifikasi_3" class="form-control" name="justifikasi[]" rows="5"placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <button type="button" class="btn btn-danger" id="btnDel3">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>

                                        <div class="card mb-1">
                                            <div class="card-header">
                                                <h5 class="m-0">Lain-Lain</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="komen_lain_lain">Pandangan/Cadangan <span class="text-danger">*</span></label>
                                                    <textarea id="komen_lain_lain" class="form-control" name="komen_lain_lain" rows="5" placeholder="Sila nyatakan"></textarea>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <div class="form-group mb-0">
                                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                                    <input type="submit" class="btn btn-success" name="submit" value="Hantar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </form>

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
                                        <li>Setiap individu/kumpulan diberi pilihan untuk menghadiri atau tidak ke sesi Pendengaran Pandangan Awam. Sila tandakan pilihan anda.</li>
                                    </ol>
                                </p>

                                <h5 class="card-title">Bahagian C</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Sila gunakan ruang yang telah disediakan untuk memberi pandangan.</li>
                                        <li>Pandangan awam perlulah berkaitan dengan kandungan Draf Pelan Struktur Kuala Lumpur 2040 sahaja.</li>
                                        <li>Pandangan awam mestilah berasaskan kepada keperluan masyarakat umum dan tidak kepada kepentingan individu.</li> 
                                        <li>Pandangan awam secara bertulis sahaja yang akan didengar dan dipertimbangkan oleh Jawatankuasa Pendengaran Pandangan Awam.</li>
                                        <li>Anda boleh menghantar 3 pandangan berkaitan sesebuah tindakan. Jika anda ingin menghantar lebih dari 3 pandangan, sila hantar dalam borang yang baru.</li>
                                    </ol>
                                </p>
                                <div class="alert alert-info" role="alert">
                                    <i class="mdi mdi-alert-circle-outline mr-2"></i> Maklumat lanjut mengenai Draf Pelan Struktur Kuala Lumpur 2040 boleh diperoleh dengan menghubungi talian 03–2617 9544 / 9545 / 9546 (Seksyen Perancangan Pelan Tempatan, Jabatan Perancangan Bandaraya).
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="mdi mdi-alert-outline mr-2"></i>
                                    Borang yang telah lengkap diisi hendaklah dihantar sebelum atau pada 17 Mac 2020 (Selasa)
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