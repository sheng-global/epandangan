        </div>
        <!-- END wrapper -->   
             
        <!-- base  -->
        <script src="<?php echo BASE_URL; ?>assets/js/vendor.min.js"></script>

        <script type="text/javascript">// Global back button
        $('#back').bind('click', function(event){
            window.history.back();
            $(form)[0].reset();
        });
        </script>

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
        <script type="text/javascript">
            $(document).ready(function(){
                <?php if(getenv('ENVIRONMENT') == 'production'){
                    echo "$('#debug').hide()";
                } ?>
            });
        </script>
    </body>
</html>