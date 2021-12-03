<?= $this->extend('layout/form'); ?>

<?= $this->section('main'); ?>

<body>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= base_url('/login') ?>">
                    <img src="vendors/images/uni.png" width="60px" alt="">
                    <h1 style="color: hotpink;">UNICORN</h1>
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="<?= base_url('/login') ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="vendors/images/forgot-password.png" alt="">
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Forgot Password</h2>
                        </div>
                        <h6 class="mb-20">Enter your email address to reset your password</h6>
                        <form action="Admin/Users/confirm" method="post">
                            <?= csrf_field(); ?>
                            <div class="input-group custom">
                                <input type="email"
                                    class="form-control <?= ($valid->hasError('email')) ? 'is-invalid' : ''; ?>"
                                    id="email" name="email" value="<?= old('email'); ?>" placeholder="Email">
                                <div class="invalid-feedback">
                                    <?= $valid->getError('email'); ?>
                                </div>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <?php if (session()->getFlashdata('warning')) : ?>
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                <?= session()->getFlashdata('warning'); ?>
                            </div>
                            <?php endif ?>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" href='#finish'>Submit</button>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="font-16 weight-600 text-center" data-color="#707373">OR</div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="<?= base_url('/login') ?>">Login</a>
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