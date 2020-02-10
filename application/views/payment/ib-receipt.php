    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Start Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title"><i class="fa fa-gear"></i> Internet Banking Payment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-right"><img src="<?php echo BASE_URL ?>assets/images/logo.png" alt="Eleven" style="height: 30px;"></h4>
                                        
                                    </div>
                                    <div class="pull-right">
                                        <h4>Payment Receipt # 
                                            <strong><?php echo $data[0]['id'] ?></strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="pull-left m-t-30">
                                            <address>
                                              <strong>Eleven Solutions Sdn Bhd</strong><br>
                                              8-01, The AmpWalk,<br>South Block, 218,<br>Jalan Ampang, 55000 Kuala Lumpur
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Payment Date: </strong> <?php echo $data[0]['payment_date'] ?></p>
                                            <p><strong>Payment Time: </strong> <?php echo $data[0]['payment_time'] ?></p>
                                            <p class="m-t-10"><strong>Payment Status: </strong> <span class="label label-pink"><?php echo $data[0]['status'] ?></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><?php echo strtoupper($data[0]['payment_type']) ?></td>
                                                        <td>
                                                            <p>Payment for <?php echo strtoupper($data[0]['payment_type']) ?><br>
                                                            Payment mode: <?php echo $data[0]['payment_mode'] ?><br>
                                                            Transaction ID: <?php echo $data[0]['transaction_id'] ?><br>
                                                            Online Banking payment details:</p>
                                                            <ul id="details">
                                                                <li>Transaction Status: <?php echo $data[0]['status'] ?></li>
                                                            <?php
                                                                $eps = unserialize($data[0]['remarks']);
                                                                foreach ($eps as $key => $value) {
                                                                    if(in_array($key, array('PAYMENT_DATETIME', 'AMOUNT', 'PAYMENT_TRANS_ID', 'MERCHANT_ORDER_NO', 'BUYER_BANK'))) echo "<li>".ucfirst($key).": ".$value."</li>";
                                                                }
                                                            ?>
                                                            </ul>
                                                        </td>
                                                        <td>1</td>
                                                        <td>RM <?php echo number_format($data[0]['amount'],2) ?></td>
                                                        <td>RM <?php echo number_format($data[0]['amount'],2) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td>Sub-total</td>
                                                        <td><?php echo number_format($data[0]['amount'],2) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td>Discount</td>
                                                        <td>0.00%</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td>GST</td>
                                                        <td>0.00%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px">
                                    <div class="col-md-3 col-md-offset-9">
                                        <hr>
                                        <h3 class="text-right">RM <?php echo number_format($data[0]['amount'],2) ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="#" id="back" class="btn btn-primary waves-effect waves-light">Return</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div> <!-- container -->                 
        </div> <!-- content -->

        <footer class="footer text-right">
            2019 &copy; <?php echo COMPANY ?>
        </footer>

    </div>