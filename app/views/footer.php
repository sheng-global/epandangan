        </div>
        <!-- END wrapper -->   
             
        <!-- base  -->
        <script src="<?php echo BASE_URL; ?>assets/js/vendor.min.js"></script>

        <!-- Page specific -->
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

        <script src="<?php echo BASE_URL; ?>assets/js/app.min.js"></script>
    </body>
</html>