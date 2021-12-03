<?= $this->extend('layout/form'); ?>

<?= $this->section('main'); ?>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= base_url('/') ?>">
                    <img src="vendors/images/uni.png" width="60px" alt="">
                    <h1 style="color: hotpink;">UNICORN</h1>
                </a>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/register-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="register-box bg-white box-shadow border-radius-10">
                        <div class="wizard-content">
                            <form class="tab-wizard2 wizard-circle wizard"
                                action="/Admin/Users/update?id=<?= $users['id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <h5>Change account data</h5>
                                <section>
                                    <div class="form-wrap max-width-600 mx-auto">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Email*</label>
                                            <div class="col-sm-8">
                                                <input type="email"
                                                    class="form-control <?= ($valid->hasError('email')) ? 'is-invalid' : ''; ?>"
                                                    id="email" name="email" value="<?= $users['email']; ?>"
                                                    onchange="lala()">
                                                <div class="invalid-feedback">
                                                    <?= $valid->getError('email'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Role*</label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    class="form-control <?= ($valid->hasError('role')) ? 'is-invalid' : ''; ?>"
                                                    id="role" name="role" value="<?= $users['role']; ?>"
                                                    onchange="lala()">
                                                <div class="invalid-feedback">
                                                    <?= $valid->getError('role'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Username*</label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    class="form-control <?= ($valid->hasError('username')) ? 'is-invalid' : ''; ?>"
                                                    id="username" name="username" value="<?= $users['username']; ?>"
                                                    onchange="lala()">
                                                <div class="invalid-feedback">
                                                    <?= $valid->getError('username'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password"
                                                    class="form-control <?= ($valid->hasError('password')) ? 'is-invalid' : ''; ?>"
                                                    id="password" name="password" value="<?= $users['password']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $valid->getError('password'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                            <div class="col-sm-8">
                                                <input type="password"
                                                    class="form-control <?= ($valid->hasError('password')) ? 'is-invalid' : ''; ?>"
                                                    id="password2" name="password2" value="<?= $users['password']; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $valid->getError('password'); ?>
                                                </div>
                                                <?php if (session()->getFlashdata('pesan')) : ?>
                                                <div class="alert alert-danger position-relative mt-4" role="alert"
                                                    style="text-align: center;">
                                                    <?= session()->getFlashdata('pesan'); ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 2 -->

                                <!-- Step 4 -->
                                <h5>Overview Information</h5>
                                <section>
                                    <div class="form-wrap max-width-600 mx-auto">
                                        <ul class="register-info">
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-4 weight-600">Email</div>
                                                    <div class="col-sm-8" id="emailcek"><?= $users['email']; ?></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-4 weight-600">Username</div>
                                                    <div class="col-sm-8" id="usercek"><?= $users['username']; ?></div>
                                                </div>
                                            </li>

                                        </ul>
                                        <div class="custom-control custom-checkbox mt-4">
                                            <input type="checkbox" class="custom-control-input" id="cek" name="cek">
                                            <label class="custom-control-label" for="cek">I have read and
                                                agreed to the terms of services and privacy policy</label>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>