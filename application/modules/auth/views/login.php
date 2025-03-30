<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="col-lg-4 mx-auto">
                <div class="text-center mb-4">
                    <img src="<?= base_url() ?>assets/images/medFinder.jpg" alt="logo" class="lg_div_bg">
                </div>
                <div class="text-start">
                    <h4>Let's Find Your Medicine</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                </div>
                <form class="pt-3" id="loginForm">
                    <div id="err_msg" class="text-danger mb-2"></div>
                    <div class="form-group mt-3">
                        <input type="email" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="button" onclick="login()">SIGN IN</button>
                    </div>
                    <div class="my-2 d-flex justify-content-end align-items-center">
                        <!-- <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div> -->
                        <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                    </div>
                    <!-- <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="ti-facebook me-2"></i>Connect using facebook
                                    </button>
                                </div> -->
                    <!-- <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                </div> -->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const baseurl = "<?= base_url() ?>";
</script>
<script src="<?= base_url() ?>assets/custom/js/login/login.js"></script>