<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <h3 class="text-muted mb-4 mt-3">Resit Pembayaran</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Bayaran untuk Dokumen Draf PSKL 2040<br>
                                            Jenis Pembayaran: <?php echo strtoupper($data[0]['payment_mode']) ?><br>
                                            Transaction ID: <?php echo $data[0]['transaction_id'] ?><br>
                                            Keterangan perbankan internet:</p>
                                            <ul id="details">
                                                <li>Status Transaksi: <?php echo ucfirst($data[0]['status']) ?></li>
                                            <?php
                                                $eps = unserialize($data[0]['remarks']);
                                                foreach ($eps as $key => $value) {
                                                    if(in_array($key, array('PAYMENT_DATETIME', 'AMOUNT', 'PAYMENT_TRANS_ID', 'MERCHANT_ORDER_NO', 'BUYER_BANK'))) echo "<li>".ucfirst($key).": ".$value."</li>";
                                                }
                                            ?>
                                            </ul>
                                            <p>Jumlah: RM <?php echo number_format($data[0]['amount'],2) ?></p>
                                        </td>
                                    </tr>
                                    <?php if($data[0]['status'] == 'success'): ?>
                                    <tr>
                                        <td><div class="alert alert-info">Sila semak e-mail anda untuk mendapatkan pautan muat-turun dokumen ini.</div></td>
                                    </tr>
                                    <?php endif ?>
                                    <tr>
                                        <td>
                                            <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->