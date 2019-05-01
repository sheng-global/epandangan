        </div>
        <!-- END wrapper -->

        <script>var resizefunc = [];</script>

        <!-- jQuery  -->
        <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>

        <!-- Password -->
        <script src="<?php echo BASE_URL; ?>assets/plugins/password/hideShowPassword.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/password.js"></script>

        <!-- sweet alert  -->
        <script src="<?php echo BASE_URL; ?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/pages/jquery.sweet-alert2.init.js"></script>

        <!-- Page specific -->
        <script src="<?php echo BASE_URL; ?>assets/js/base.js"></script>
        
        <?php

        if(isset($js)){
            foreach ($js as $js_inc){
                echo '<script src="'.BASE_URL.$js_inc.'"></script>';
                echo "\n\t\t";
            }
        }

        if(isset($js_url)){
            foreach ($js_url as $js_inc){
                echo '<script src="'.$js_inc.'"></script>';
                echo "\n\t\t";
            }
        }

        if(isset($custom_js)){
            echo $custom_js;
            echo "\n\t";
        }

        ?>
    </body>
</html>