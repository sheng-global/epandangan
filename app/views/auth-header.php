<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title><?php echo SITE_TITLE ?></title>

        <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>assets/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <?php
        if(isset($css)){
            foreach ($css as $css_inc){
                echo '<link rel="stylesheet" href="'.BASE_URL.$css_inc.'" type="text/css">';
                echo "\n\t\t";
            }
        }

        if(isset($css_url)){
            foreach ($css_url as $css_inc_url){
                echo '<link rel="stylesheet" href="'.$css_inc_url.'" type="text/css">';
                echo "\n\t\t";
            }
        }

        if(isset($custom_css)){
            echo $custom_css;
            echo "\n\t";
        }
        ?>

        <script src="<?php echo BASE_URL; ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/translate.js"></script>
        <script>
        var currentLng = "<?php echo $_SESSION['lang'] ?>";
        function load(){
            var translate = new Translate();
            var attributeName = 'data-tag';
            translate.init(attributeName, currentLng);
            translate.process();
        }
        </script>
	</head>