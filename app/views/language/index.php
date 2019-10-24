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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tetapan</a></li>
                                    <li class="breadcrumb-item active">Bahasa</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Tetapan Bahasa</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

    			<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="header-title">Senarai Terjemahan</h4>
                                <div class="text-sm-right">
                                    <div class="btn-group pull-right m-t-15">
                                        <a href="<?php echo BASE_URL ?>language/add" class="btn btn-info waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-plus-circle mr-1"></i> Tambah terjemahan baru</a>
                                        <a href="#" id="regenerate-language" class="btn btn-danger waves-effect waves-light mb-2"><i class="mdi mdi-reload mr-1"></i> Hasilkan fail bahasa terkini</a>
                                    </div>
                                </div>

                                <table id="datatable" class="table table-striped dt-responsive nowrap">
    								<thead>
    									<tr>
                                            <th>Slug</th>
    										<th>Bahasa</th>
                                            <th>Kandungan</th>
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

                