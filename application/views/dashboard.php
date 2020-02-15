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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title"><span data-tag="dashboard-welcome"></span>, <?php echo $_SESSION['full_name'] ?></h4>
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
                            <a href="<?php echo BASE_URL ?>borang/pandangan/ptkl" class="btn btn-primary btn-rounded mb-3"><i class="mdi mdi-plus"></i> Borang Draf Perubahan 1 PBRKL 2020</a>
                            <a href="<?php echo BASE_URL ?>borang/pandangan/ptkl-2" class="btn btn-success btn-rounded mb-3"><i class="mdi mdi-plus"></i> Borang Draf Perubahan 2 PBRKL 2020</a>
                            <a href="<?php echo BASE_URL ?>borang/pandangan/pskl" class="btn btn-info btn-rounded mb-3"><i class="mdi mdi-plus"></i> Borang Draf PSKL 2040</a>

                            <h4>Senarai borang Pandangan Awam Draf Perubahan 1 PBRKL 2020</h4>
                            <table class="table-bordered table table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th data-tag="no-pandangan"></th>
                                        <th data-tag="tarikh-terima"></th>
                                        <th data-tag="kehadiran"></th>
                                        <th data-tag="kategori"></th>
                                        <th data-tag="tindakan"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ptkl as $value): ?>
                                    <tr>
                                        <td>PBRKL2020/DRAF/1/<?php echo $value['borang_id'] ?></td>
                                        <td><?php echo $value['tarikh_terima'] ?></td>
                                        <td><?php echo $value['hadir'] ?></td>
                                        <td><?php echo $value['kategori'] ?></td>
                                        <td><a href="<?php echo BASE_URL ?>borang/papar_ptkl/<?php echo $value['borang_id'] ?>" class="btn btn-xs btn-primary" data-tag="papar"></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h4>Senarai borang Pandangan Awam Draf Perubahan 2 PBRKL 2020</h4>
                            <table class="table-bordered table table-hover">
                                <thead>
                                    <tr class="bg-success text-white">
                                        <th data-tag="no-pandangan"></th>
                                        <th data-tag="tarikh-terima"></th>
                                        <th data-tag="kehadiran"></th>
                                        <th data-tag="kategori"></th>
                                        <th data-tag="tindakan"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ptkl2 as $value): ?>
                                    <tr>
                                        <td>PBRKL2020/DRAF/2/<?php echo $value['borang_id'] ?></td>
                                        <td><?php echo $value['tarikh_terima'] ?></td>
                                        <td><?php echo $value['hadir'] ?></td>
                                        <td><?php echo $value['kategori'] ?></td>
                                        <td><a href="<?php echo BASE_URL ?>borang/papar_ptkl_2/<?php echo $value['borang_id'] ?>" class="btn btn-xs btn-success" data-tag="papar"></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h4>Senarai borang Pandangan Awam Draf PSKL 2040</h4>
                            <table class="table-bordered table table-hover">
                                <thead>
                                    <tr class="bg-info text-white">
                                        <th data-tag="no-pandangan"></th>
                                        <th data-tag="tarikh-terima"></th>
                                        <th data-tag="kehadiran"></th>
                                        <th data-tag="kategori"></th>
                                        <th data-tag="tindakan"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pskl as $value): ?>
                                    <tr>
                                        <td>PSKL2040/DRAF/<?php echo $value['borang_id'] ?></td>
                                        <td><?php echo $value['tarikh_terima'] ?></td>
                                        <td><?php echo $value['hadir'] ?></td>
                                        <td><?php echo $value['kategori'] ?></td>
                                        <td><a href="<?php echo BASE_URL ?>borang/papar_pskl/<?php echo $value['borang_id'] ?>" class="btn btn-xs btn-info" data-tag="papar"></a></td>
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
