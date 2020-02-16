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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo getenv('SITE_TITLE') ?></a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Borang</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">PSKL 2040</a></li>
                                    <li class="breadcrumb-item active">PSKL2040/DRAF/<?php echo $data[0]['borang_id'] ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title">PSKL2040/DRAF/<?php echo $data[0]['borang_id'] ?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-9">
                        <div class="card-box ribbon-box">
                            <div class="ribbon ribbon-primary float-right"><i class="fas fa-user"></i> <?php echo $data[0]['kategori'] ?></div>
                            <h4 class="header-title">Bahagian A: Pandangan anda terhadap Draf PSKL2040</h4>
                            <div class="ribbon-content">
                                <h4>Bentuk dan Kandungan</h4>
                                <dl class="row">
                                    <dt class="col-sm-3">Bentuk dan Kandungan</dt>
                                    <dd class="col-sm-9"><?php echo empty($data[0]['komen_bentuk_kandungan']) ? "Tiada komen" : $data[0]['komen_bentuk_kandungan'] ?></dd>

                                    <dt class="col-sm-3">Lain-lain</dt>
                                    <dd class="col-sm-9"><?php echo empty($data[0]['komen_lain_lain']) ? "Tiada komen" : $data[0]['komen_lain_lain'] ?></dd>
                                </dl>
                                <h4>Matlamat</h4>
                                <?php foreach ($matlamat as $value): ?>
                                <dl class="row">
                                    <dt class="col-sm-3">Matlamat</dt>
                                    <dd class="col-sm-9"><?php echo $value['matlamat'] ?></dd>

                                    <dt class="col-sm-3">Halatuju</dt>
                                    <dd class="col-sm-9"><?php echo $value['halatuju'] ?></dd>

                                    <dt class="col-sm-3">Tindakan</dt>
                                    <dd class="col-sm-9"><?php echo $value['tindakan'] ?></dd>

                                    <dt class="col-sm-3">Pandangan / Cadangan</dt>
                                    <dd class="col-sm-9">
                                        <p><?php echo empty($value['cadangan']) ? "Tiada komen" : $value['cadangan'] ?></p>
                                    </dd>

                                    <dt class="col-sm-3">Justifikasi</dt>
                                    <dd class="col-sm-9">
                                        <p><?php echo empty($value['justifikasi']) ? "Tiada komen" : $value['justifikasi'] ?></p>
                                    </dd>
                                </dl>
                                <?php endforeach; ?>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Bahagian B: Maklumat Peribadi</h4>
                                <dl class="row">
                                    <dt class="col-sm-3">Nama</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['nama_penuh']) ? $data[0]['nama_penuh']: '-' ?></dd>

                                    <dt class="col-sm-3">No. Kad Pengenalan/Passport</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['ic_passport']) ? $data[0]['ic_passport']: '-' ?></dd>

                                    <dt class="col-sm-3">Nama Agensi/Organisasi</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['nama_organisasi']) ? $data[0]['nama_organisasi']: '-' ?></dd>

                                    <dt class="col-sm-3">Jumlah Nama</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['jumlah_nama']) ? $data[0]['jumlah_nama']: '-' ?></dd>

                                    <dt class="col-sm-3">Alamat Surat Menyurat</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['alamat']) ? $data[0]['alamat']: '-' ?></dd>

                                    <dt class="col-sm-3">No. Telefon Rumah</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['telefon_rumah']) ? $data[0]['telefon_rumah']: '-' ?></dd>

                                    <dt class="col-sm-3">No. Telefon Pejabat</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['telefon_pejabat']) ? $data[0]['telefon_pejabat']: '-' ?></dd>

                                    <dt class="col-sm-3">No. Telefon Bimbit</dt>
                                    <dd class="col-sm-9"><?php echo ($data[0]['telefon_bimbit']) ? $data[0]['telefon_bimbit']: '-' ?></dd>
                                </dl>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                    <div class="col-lg-3">
                        <!-- Portlet card -->

                        <div class="card bg-default">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Bahagian C: Kehadiran</h5>

                                <div id="cardCollpase2" class="collapse pt-3 show">
                                    <p>Hadir ke sesi pandangan awam?</p>
                                    <span class="btn btn-primary"><?php echo ($data[0]['hadir']) ? $data[0]['hadir']: '-' ?></btn>
                                </div>
                            </div>
                        </div> <!-- end card-->

                        <div class="card bg-default d-print-none">
                            <div class="card-body">
                                <h5 class="card-title">Lampiran A (Memorandum)</h5>

                                <?php $upload = array('id' => $data[0]['borang_id']); 
                                $get = $helper->get($upload);
                                if($get) echo "<div class=\"button-list\"><a href=\"".BASE_URL."files/".$get[0]['file']."\" class=\"btn btn-blue\"><span class=\"btn-label\"><i class=\"fas fa-file-pdf\"></i></span>Lampiran #</a></div>";
                                else echo "Tiada lampiran."; ?>

                            </div>
                        </div> <!-- end card-->

                        <?php if($_SESSION['permission'] != 'user'): ?>
                        <div class="card bg-dark">
                            <div class="card-body">
                                <h5 class="card-title mb-0 text-white">UNTUK KEGUNAAN PEJABAT</h5>

                                <div id="cardCollpase2" class="collapse pt-3 show">
                                    <table class="table table-borderless text-white">
                                        <tr>
                                            <td>Tarikh Terima</td>
                                            <td><?php echo ($data[0]['tarikh_terima']) ? $data[0]['tarikh_terima']: '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kehadiran</td>
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hadir-ya" name="hadir" class="custom-control-input" <?php echo ($data[0]['hadir'] == 'Ya') ? "checked": '' ?>>
                                                    <label class="custom-control-label" for="hadir-ya">Ya</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hadir-tidak" name="hadir" class="custom-control-input" <?php echo ($data[0]['hadir'] == 'Tidak') ? "checked": '' ?>>
                                                    <label class="custom-control-label" for="hadir-tidak">Tidak</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pegawai Key-in</td>
                                            <td><?php echo ($data[0]['pegawai_id']) ? $data[0]['pegawai_id']: 'Tiada' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tarikh Key-in</td>
                                            <td><?php echo ($data[0]['tarikh_key_in']) ? $data[0]['tarikh_key_in']: 'Tiada' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-print-none">
                                <button class="btn btn-secondary" id="back">Kembali</button>
                                <button class="btn btn-warning" id="tindakan" data-toggle="modal" data-target="#tindakan-modal">Tindakan</button>
                                <a class="btn btn-info" href="javascript:window.print()">Cetak</a>
                            </div>
                        </div> <!-- end card-->
                        <?php endif; ?>

                    </div>
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- Start modal tindakan -->
        <div id="tindakan-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tindakan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="topik" class="control-label">Topik</label>
                                    <input type="text" class="form-control" id="topik" value="">
                                </div>
                                <div class="form-group">
                                    <label for="zon" class="control-label">Zon Strategik</label>
                                    <input type="text" class="form-control" id="zon" value="">
                                </div>
                                <div class="form-group">
                                    <label for="sektor" class="control-label">Sektor</label>
                                    <input type="text" class="form-control" id="sektor" value="">
                                </div>
                                <div class="form-group">
                                    <label for="sesi" class="control-label">Sesi Pendengaran</label>
                                    <input type="text" class="form-control" id="sesi" value="">
                                </div>
                                <input type="hidden" id="id" value="<?php echo $data[0]['borang_id'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-info waves-effect waves-light" data-dismiss="modal">Simpan</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->