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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" data-tag="site-title"></a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jadual</a></li>
                                    <li class="breadcrumb-item active">Senarai Sesi</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Senarai Sesi Pendengaran</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

    			<div class="row">
                    <div class="col-12">
                        <div class="text-sm-right">
                            <div class="btn-group pull-right m-t-15">
                                <a href="<?php echo BASE_URL ?>jadual/addSesi" class="btn btn-info waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-plus-circle mr-1"></i> Tambah Jadual</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <table id="datatable" class="table table-striped dt-responsive nowrap">
    								<thead>
    									<tr>
                                            <th>id</th>
                                            <th>Lokasi</th>
    										<th>Zon</th>
                                            <th>Tarikh</th>
                                            <th>Masa</th>
                                            <th>Pengerusi</th>
                                            <th>AJK 1</th>
                                            <th>AJK 2</th>
                                            <th>Tindakan</th>
    									</tr>
    								</thead>
    							</table>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

                