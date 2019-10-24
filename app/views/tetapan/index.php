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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tetapan</a></li>
                                    <li class="breadcrumb-item active">Topik</li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo ucfirst($table) ?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

    			<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <div class="text-sm-right">
                                        <a href="#add-modal" class="btn btn-primary waves-effect waves-light mb-2" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Tambah <?php echo ucfirst($table) ?></a>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            <table id="datatable" class="table table-striped table-bordered">
								<thead>
									<tr>
                                        <th>ID</th>
										<th>Nama</th>
                                        <th>Kemaskini</th>
                                        <th>Tindakan</th>
									</tr>
								</thead>
							</table>
                        </div>
                    </div>
                </div> <!-- End Row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Add Modal -->
        <div id="add-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Tutup</span>
            </button>
            <h4 class="custom-modal-title">Tambah <?php echo ucfirst($table) ?></h4>
            <div class="custom-modal-text text-left">
                <form id="tambah-tetapan">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama <?php echo $table ?>">
                        <input type="hidden" name="table" value="<?php echo $table ?>">
                    </div>

                    <div class="text-right">
                        <button id="save" class="btn btn-success waves-effect waves-light" onclick="Custombox.modal.close();">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.modal.close();">Batal</button>
                    </div>
                </form>
            </div>
        </div>