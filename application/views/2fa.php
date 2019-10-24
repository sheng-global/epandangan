    <body>
		<div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img text-center">
                    <img src="<?php echo BASE_URL ?>assets/images/logo.png" alt="logo">
                </div> 

                <div class="panel-body text-center">
                    <h4>Two-Factor Authentication</h4>
                    <pre><?php echo $_SESSION['authy_id'] ?></pre>
                    <form class="form-horizontal m-t-20" action="<?php echo BASE_URL ?>auth/otp" method="post">
                        <div class="input-group m-t-10">
                            <input id="otp" name="otp" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>
                            </span>
                        </div>
                    </form>
                    <h5>Can't get the token working? You need to verify your email address. Check your email for instruction.</h5>
                </div>                
            </div>
        </div>