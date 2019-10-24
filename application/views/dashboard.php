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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo SITE_TITLE ?></a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Selamat datang, <?php echo $_SESSION['full_name'] ?></h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <?php if(getenv('ENVIRONMENT') == 'development'): ?>
                            <pre><?php var_dump($ptkl) ?></pre>
                            <?php endif; ?>
                            <a href="<?php echo BASE_URL ?>borang/pandangan/ptkl" id="demo-delete-row" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> Pandangan Awam</a>
                            <table id="demo-custom-toolbar" data-toggle="table"
                                   data-toolbar="#demo-delete-row"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-columns="true"
                                   data-sort-name="id"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-pagination="true" data-show-pagination-switch="true" class="table-bordered table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th data-field="id" data-sortable="true">No Pandangan</th>
                                        <th data-field="name" data-sortable="true">Tarikh Terima</th>
                                        <th data-field="date" data-sortable="true">Kehadiran</th>
                                        <th data-field="amount" data-align="center">Kategori</th>
                                        <th data-field="status" data-align="center">Tindakan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ptkl as $value): ?>
                                    <tr>
                                        <td>PBRKL2020/DRAF/<?php echo $value['borang_id'] ?></td>
                                        <td><?php echo $value['tarikh_terima'] ?></td>
                                        <td><?php echo $value['hadir'] ?></td>
                                        <td><?php echo $value['kategori'] ?></td>
                                        <td><a href="<?php echo BASE_URL ?>borang/papar_ptkl/<?php echo $value['borang_id'] ?>" class="btn btn-xs btn-primary">Papar</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
