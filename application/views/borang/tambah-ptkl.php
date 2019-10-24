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
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>"><?php echo SITE_TITLE ?></a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Borang</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pandangan Awam</a></li>
                                    <li class="breadcrumb-item active">PBRKL 2020 (Perubahan 1)</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Borang Pandangan Awam Draf Perubahan PBRKL 2020 (Perubahan 1)</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

    			<div class="row">
                    <div class="col-md-8">
                        <div class="card-box">
                            <h4 class="header-title">Bahagian A</h4>
                            <p class="sub-header">Maklumat Peribadi/Individu</p>

                            <div class="alert alert-warning d-none fade show">
                                <h4>Ralat!</h4>
                                <p class="mb-0">Terdapat kesalahan dalam pengisian borang anda. Sila semak dan isi dengan betul.</p>
                            </div>

                            <div class="alert alert-info d-none fade show">
                                <h4>Berjaya!</h4>
                                <p class="mb-0">Borang anda telah lengkap diisi.</p>
                            </div>

                            <form method="post" id="borang-ptkl" data-parsley-validate="" enctype="multipart/form-data" action="<?php echo BASE_URL ?>borang/add_ptkl">

                                <div class="form-row">
                                    <div class="form-group col-md-9">
                                        <label for="nama_penuh">Nama Penuh <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama_penuh" id="nama_penuh" value="<?php echo @$profile[0]['nama_penuh'] ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ic_passport">No. IC/Passport <span class="text-danger">*</span></label>
                                        <input type="text" id="ic_passport" class="form-control" name="ic_passport" required="" data-parsley-type="alphanum" data-parsley-maxlength="12" data-parsley-minlength="6" value="<?php echo @$profile[0]['ic_passport'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <p>Kategori <span class="text-danger">*</span></p>

                                    <div class="radio mb-1 radio-info form-check-inline">
                                        <input type="radio" name="kategori" id="individu" value="Individu">
                                        <label for="individu">
                                            Individu
                                        </label>
                                    </div>
                                    <div class="radio radio-info form-check-inline">
                                        <input type="radio" name="kategori" id="organisasi" value="Organisasi" required="">
                                        <label for="organisasi">
                                            Agensi/Organisasi
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row hidden" id="row-organisasi">
                                    <div class="form-group col-md-9">
                                        <label for="nama_organisasi">Nama Agensi/Organisasi</label>
                                        <input type="text" class="form-control" name="nama_organisasi" id="nama_organisasi">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jumlah_nama">Jumlah nama</label>
                                        <input type="number" id="jumlah_nama" class="form-control" name="jumlah_nama" data-parsley-type="number" value="1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required="" value="<?php echo @$profile[0]['alamat'] ?>">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="poskod">Poskod <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="poskod" id="poskod" required="" data-parsley-type="number" data-parsley-minlength="5" value="<?php echo @$profile[0]['psokod'] ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="telefon_rumah">Telefon (Rumah)</label>
                                        <input type="text" class="form-control" name="telefon_rumah" id="telefon_rumah" value="<?php echo @$profile[0]['telefon_rumah'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="telefon_pejabat">Telefon (Pejabat)</label>
                                        <input type="text" class="form-control" name="telefon_pejabat" id="telefon_pejabat" value="<?php echo @$profile[0]['telefon_pejabat'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="telefon_bimbit">Telefon (Bimbit) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="telefon_bimbit" id="telefon_bimbit" required="" value="<?php echo @$profile[0]['telefon_bimbit'] ?>">
                                    </div>
                                </div>

                                <h4 class="header-title">Lampiran A</h4>
                                <p class="sub-header">Muat naik memorandum</p>
                                <div class="form-group">
                                    <input type="file" name="lampiran_a" data-parsley-max-file-size="2000">
                                </div>
                                <div class="alert alert-info">Saiz lampiran mestilah kurang dari 2 MB. Format yang diterima adalah PDF dan imej (PNG,JPG)</div>

                                <h4 class="header-title">Bahagian B</h4>
                                <p class="sub-header">Pengesahan Kehadiran ke Mesyuarat Jawatankuasa Pendengaran & Pandangan Awam</p>

                                <div class="form-group">
                                    <p>Adakah anda ingin menyampaikan sendiri secara lisan pandangan / maklumbalas di dalam Sesi Pendengaran Pandangan Awam? <span class="text-danger">*</span></p>

                                    <div class="radio mb-1 radio-success form-check-inline">
                                        <input type="radio" name="hadir" id="ya" value="Ya">
                                        <label for="ya">
                                            Hadir dan didengari
                                        </label>
                                    </div>
                                    <div class="radio radio-danger form-check-inline">
                                        <input type="radio" name="hadir" id="tidak" value="Tidak" required="">
                                        <label for="tidak">
                                            Tidak hadir
                                        </label>
                                    </div>
                                </div>

                                <h4 class="header-title">Bahagian C</h4>
                                <p class="sub-header">Pandangan Awam dan Cadangan Penambahbaikan</p>

                                <div class="form-group">
                                    <label for="cadangan">Cadangan Penambahbaikan</label>
                                    <textarea id="cadangan" class="form-control" name="cadangan" rows="10" placeholder="Contoh: Tukar zon gunatanah mengikut Syarat Nyata"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="pandangan_awam">Pandangan Awam <span class="text-danger">*</span></label>
                                    <textarea id="pandangan_awam" class="form-control" name="pandangan_awam" rows="10" data-parsley-trigger="keyup" data-parsley-minlength="200" data-parsley-validation-threshold="100" placeholder="Contoh: Selaraskan Syarat Nyata"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="peta_indeks">Peta Indeks <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="peta_indeks" id="peta_indeks" required="" data-parsley-type="number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_lot">No. Lot <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="no_lot" id="no_lot" required="" data-parsley-type="number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="muka_surat">Muka Surat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="muka_surat" id="muka_surat" required="" data-parsley-type="number">
                                    </div>
                                </div>

                                <h4 class="header-title">Lampiran C</h4>
                                <p class="sub-header">Muat naik gambar berkaitan pandangan awam</p>
                                <div class="form-group">
                                    <input type="file" name="lampiran_c" data-parsley-max-file-size="2000">
                                </div>
                                <div class="alert alert-info">Saiz lampiran mestilah kurang dari 2MB. Format yang diterima adalah PDF dan imej (PNG,JPG)</div>

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
                                        <li>Jika anda menghantar memorandum, sila muat naik memorandum berkenaan dalam ruangan <strong class="text-dark">Lampiran A</strong></li>
                                    </ol>
                                </p>

                                <h5 class="card-title">Bahagian B</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Setiap Individu/kumpulan diberi pilihan untuk menghadiri atau tidak ke Jawatankuasa Pendengaran Pandangan Awam. Sila tandakan pilihan anda.</li>
                                        <li>Jika anda mewakili Agensi/Organisasi, hanya 3 orang wakil akan dijemput ke sesi pendengaran awam ini.</li>
                                    </ol>
                                </p>

                                <h5 class="card-title">Bahagian C</h5>
                                <p class="card-text">
                                    <ol>
                                        <li>Sila gunakan ruang yang telah disediakan.</li>
                                        <li>Sila sertakan gambar-gambar berkaitan dengan tapak dan persekitaran (jika perlu). Muat naik lampiran anda dalam ruangan <strong class="text-dark">Lampiran C</strong></li>
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