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
                                    <li class="breadcrumb-item active" data-tag="borang-ptkl"></li>
                                </ol>
                            </div>
                            <h4 class="page-title" data-tag="borang-ptkl"></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

    			<div class="row">
                    <div class="col-md-8">
                        <div class="card-box">
                            <h4 class="header-title"><span data-tag="part"></span> A</h4>
                            <p class="sub-header" data-tag="maklumat-peribadi"></p>

                            <div class="alert alert-warning d-none fade show">
                                <h4 data-tag="ralat">Ralat!</h4>
                                <p class="mb-0" data-tag="ralat-keterangan">Terdapat kesalahan dalam pengisian borang anda. Sila semak dan isi dengan betul.</p>
                            </div>

                            <div class="alert alert-info d-none fade show">
                                <h4 data-tag="berjaya">Berjaya!</h4>
                                <p class="mb-0" data-tag="berjaya-keterangan">Borang anda telah lengkap diisi.</p>
                            </div>

                            <form method="post" id="borang-ptkl" data-parsley-validate="" enctype="multipart/form-data" action="<?php echo BASE_URL ?>borang/add_ptkl">

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
                                        <input type="text" class="form-control" name="poskod" id="poskod" required="" data-parsley-type="number" data-parsley-minlength="5" value="<?php echo @$profile[0]['psokod'] ?>">
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

                                <h4 class="header-title"><span data-tag="part"></span> B</h4>
                                <p class="sub-header" data-tag="pengesahan-kehadiran"></p>

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

                                <h4 class="header-title"><span data-tag="part"></span> C</h4>
                                <p class="sub-header" data-tag="part-c-description"></p>

                                <div class="form-group">
                                    <label for="pandangan_awam"><span data-tag="pandangan-awam"></span> <span class="text-danger">*</span></label>
                                    <textarea id="pandangan_awam" class="form-control" name="pandangan_awam" rows="10" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="cadangan" data-tag="cadangan-penambahbaikan"></label>
                                    <textarea id="cadangan" class="form-control" name="cadangan" rows="10" placeholder="Contoh: Tukar zon gunatanah mengikut Syarat Nyata"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="peta_indeks"><span data-tag="peta-indeks"></span> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="peta_indeks" id="peta_indeks" required="" data-parsley-type="number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_lot"><span data-tag="no-lot"></span> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_lot" id="no_lot" required="" data-parsley-type="number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="muka_surat"><span data-tag="muka-surat"></span> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="muka_surat" id="muka_surat" required="" data-parsley-type="number">
                                    </div>
                                </div>

                                <h4 class="header-title"><span data-tag="lampiran"></span> 1</h4>
                                <p class="sub-header" data-tag="muatnaik-memorandum"></p>
                                <div class="form-group">
                                    <input type="file" name="lampiran_a" data-parsley-max-file-size="2000">
                                </div>
                                <div class="alert alert-info" data-tag="alert-lampiran"></div>

                                <h4 class="header-title"><span data-tag="lampiran"></span> 2</h4>
                                <p class="sub-header" data-tag="muatnaik-lampiran-2"></p>
                                <div class="form-group">
                                    <input type="file" name="lampiran_c" data-parsley-max-file-size="2000">
                                </div>
                                <div class="alert alert-info" data-tag="alert-lampiran"></div>

                                <div class="form-group mb-0">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                    <input type="submit" class="btn btn-warning" id="save" value="Simpan">
                                    <input type="submit" class="btn btn-success" name="submit" value="Hantar">
                                </div>

                            </form>
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
                                        <li>Setiap Individu/kumpulan diberi pilihan untuk menghadiri atau tidak ke Jawatankuasa Pendengaran Pandangan Awam. Sila tandakan pilihan anda.</li>
                                    </ol>
                                </p>

                                <h5 class="card-title">Bahagian C</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Sila gunakan ruang yang telah disediakan untuk memberi pandangan.</li>
                                        <li>Sila sertakan gambar-gambar berkaitan dengan tapak dan persekitaran (jika perlu). Muat naik lampiran anda dalam ruangan <strong class="text-dark">Lampiran 2</strong></li>
                                        <li>Pandangan awam perlulah berkaitan dengan kandungan Draf Perubahan PBRKL 2020 sahaja.</li>
                                        <li>Pandangan awam mestilah berasaskan kepada keperluan masyarakat umum dan tidak kepada kepentingan individu.</li> 
                                        <li>Pandangan awam secara bertulis sahaja yang akan didengar dan dipertimbangkan oleh Jawatankuasa Pendengaran Pandangan Awam.</li>
                                    </ol>
                                </p>
                                <div class="alert alert-info" role="alert">
                                    <i class="mdi mdi-alert-circle-outline mr-2"></i> Maklumat lanjut mengenai Draf Perubahan PBRKL2020 (Perubahan 1) boleh diperoleh dengan menghubungi talian 03 – 2617 9512 / 9519 (Seksyen Perancangan Pelan Tempatan, Jabatan Perancangan Bandaraya).
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="mdi mdi-alert-outline mr-2"></i>
                                    <p>Borang yang telah lengkap diisi hendaklah dihantar sebelum 14 Nov 2019 (Khamis)</p>
                                    <div data-countdown="2019/11/14"></div>
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