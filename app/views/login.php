	<body onload="load()">	
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
                <div class="panel-heading">
                    <h3 class="text-center"> <span data-tag="login-to"></span> <strong class="text-custom"><?php echo SITE_TITLE ?></strong></h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="post" action="<?php echo BASE_URL ?>auth/process_login">

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="username" type="text" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" name="remember-me">
                                    <label for="checkbox-signup"><span data-tag="remember-me"></span></label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" name="submit"><span data-tag="login"></span></button>
                            </div>
                        </div>
                        <input type="hidden" name="redirect" id="redirect">
                        <input type="hidden" name="token" value="<?php echo $token ?>">
                    </form>
                </div>
            </div>
            
        </div>