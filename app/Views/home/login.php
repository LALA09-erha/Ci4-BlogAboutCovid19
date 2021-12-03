<?= $this->extend('layout/form'); ?>

<?= $this->section('main'); ?>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= base_url('login') ?>">
                    <img src="vendors/images/uni.png" width="60px" alt="">
                    <h1 style="color: hotpink;">UNICORN</h1>
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="<?= base_url('register') ?>">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>
                        <form action="/Admin/Users/sistem" method="post">
                            <?= csrf_field(); ?>

                            <div class="input-group custom">
                                <input type="text"
                                    class="form-control form-control-lg <?= ($valid->hasError('username')) ? 'is-invalid' : ''; ?>"
                                    placeholder="Username" name="username">
                                <div class="invalid-feedback">
                                    <?= $valid->getError('username'); ?>
                                </div>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password"
                                    class="form-control form-control-lg <?= ($valid->hasError('password')) ? 'is-invalid' : ''; ?>"
                                    placeholder="**********" name="password" value="<?= old('password'); ?>">
                                <div class="invalid-feedback">
                                    <?= $valid->getError('password'); ?>
                                </div>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                            id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"
                                            for='remember'>Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="<?= base_url('/forgot') ?>">Forgot
                                            Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert" style="text-align: center;">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                    <?php endif ?>
                                    <?php if (session()->getFlashdata('warning')) : ?>
                                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                                        <?= session()->getFlashdata('warning'); ?>
                                    </div>
                                    <?php endif ?>
                                    <div class="input-group mb-0">
                                        <!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
                                        <button class="btn btn-primary btn-lg btn-block" type="submit"
                                            href="<?= base_url('/user') ?>">Sign
                                            In</button>
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="<?= base_url('register') ?>">Register To Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>