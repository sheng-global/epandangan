        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <?php echo getenv('FOOTER') ?>
                    </div>
                    <div class="col-md-4 text-right">
                        <form action="<?php echo BASE_URL ?>language/setLocale" method="post">
                            <select name="language">
                                <option value="en"<?php if( $_COOKIE["language"] == "en" ) { echo " selected"; } ?>>English</option>
                                <option value="my"<?php if( $_COOKIE["language"] == "my" ) { echo " selected"; } ?>>Bahasa Melayu</option>
                            </select>
                            <input type="submit" value="Select Language" class="btn btn-success btn-xs">
                        </form>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
             
        <!-- base  -->
        <script src="<?php echo BASE_URL; ?>assets/js/vendor.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/cookie.js"></script>

        <script type="text/javascript">

            // Global back button
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