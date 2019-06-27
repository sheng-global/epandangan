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
            $('#notify').on('click', function(){
                swal('Makluman','Pemilihan akan dibuka semasa hari pemilihan sahaja.', 'info');
            });
            $(document).ready(function(){
                <?php if(getenv('ENVIRONMENT') == 'production'){
                    echo "$('#debug').hide()";
                } ?>
            });
        </script>
        <script>
            // Set the date we're counting down to
            var last_update = '2019-07-03 16:30:00';
            var countDownDate = new Date(last_update).getTime();
            var distance = 0;

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                if(now > countDownDate){
                    distance = -1;
                }else{
                    // Find the distance between now and the count down date
                    distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="timer"
                    document.getElementById("timer").innerHTML = days + " hari " + minutes + " minit " + seconds + " s";
                }

                // If the count down is finished, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = '0d 0m 0s';
                }
            }, 1000);
        </script>
    </body>
</html>