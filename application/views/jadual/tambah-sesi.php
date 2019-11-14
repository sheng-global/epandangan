        <!-- ============================================================== -->
        <!-- Start right Content here -->
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jadual</a></li>
                                    <li class="breadcrumb-item active">Tambah Sesi</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Tambah Sesi Pendengaran</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card-box">
                        	<form method="post" action="<?php echo BASE_URL ?>jadual/createSesi" id="borang-sesi" data-parsley-validate="">
								<div class="form-group">
                                    <label for="lokasi">Pilih Lokasi <span class="text-danger">*</span></label>
                                    <select class="form-control" name="lokasi_id" id="lokasi"></select>
                                </div>
                                <div class="form-group">
                                    <label for="zon">Pilih Zon Strategik <span class="text-danger">*</span></label>
                                    <select class="form-control" name="zon_id" id="zon"></select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Pilih Tarikh</label>
                                        <input type="text" id="datepicker" class="form-control" placeholder="October 9, 2018" name="tarikh">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Dari</label>
                                        <input type="text" class="form-control timepicker" name="masa_mula" placeholder="masa mula">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Hingga</label>
                                        <input type="text" class="form-control timepicker" name="masa_tamat" placeholder="masa tamat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan/Nota</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-box">
                                <div class="form-group">
                                    <label for="chairman">Pengerusi</label>
                                    <input type="text" name="chairman" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="ajk1">AJK 1</label>
                                    <input type="text" name="ajk_1" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="ajk2">AJK 2</label>
                                    <input type="text" name="ajk_2" class="form-control">
                                </div>
                                <input type="hidden" name="token" value="<?php echo $token ?>">
								<button type="submit" class="btn btn-info waves-effect waves-light m-b-5" name="submit">Simpan</button>
								<button class="btn btn-warning waves-effect waves-light m-b-5" id="back">Batal</button>
							</form>
                        </div>
                    </div>

                </div> <!-- End Row -->
                           
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->