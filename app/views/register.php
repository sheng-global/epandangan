	    <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <!-- LOGO -->
                                    <a href="<?php echo BASE_URL ?>" class="logo text-center">
                                        <span class="logo-lg">
                                            <span class="logo-lg-text-dark">epandangan <i class="dripicons-message"></i></span>
                                        </span>
                                        <span class="logo-sm">
                                            <span class="logo-sm-text-dark"><i class="dripicons-message"></i></span>
                                        </span>
                                    </a>
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                                        <style type="text/css">.fill{fill:#f1556c;}</style>
                                        <path class="fill" d="M18 14.45v6.55h-16v-12h6.743l1.978-2h-10.721v16h20v-10.573l-2 2.023zm1.473-10.615l1.707 1.707-9.281 9.378-2.23.472.512-2.169 9.292-9.388zm-.008-2.835l-11.104 11.216-1.361 5.784 5.898-1.248 11.103-11.218-4.536-4.534z"/>
                                    </svg>
                                    <p class="text-muted mb-4 mt-3" data-tag="register-info"></p>
                                </div>

                                <form method="post" action="<?php echo BASE_URL ?>auth/process_register">

                                    <div class="form-group mb-3">
                                        <label for="username" data-tag="username"></label>
                                        <input class="form-control" name="username" type="email" required="" placeholder="Alamat e-mail">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="fullname" data-tag="fullname"></label>
                                        <input class="form-control" name="fullname" type="text" required="" placeholder="Nama penuh">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password" data-tag="password"></label>
                                        <input class="form-control" name="password" type="password" required="" placeholder="Kata laluan">
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                        <label class="custom-control-label" for="checkbox-signup">Saya terima <a href="javascript: void(0);" class="text-dark">Terma dan Syarat</a></label>
                                    </div>

                                    <div class="form-group pt-1 text-center">
                                        <button class="btn btn-info" type="submit" name="submit" data-tag="register"></button>
                                    </div>
                                    <input type="hidden" name="redirect" id="redirect">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white-50">Sudah mempunyai akaun? <a href="<?php echo BASE_URL ?>auth" class="text-white ml-1"><b>Log Masuk</b></a></p>
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->