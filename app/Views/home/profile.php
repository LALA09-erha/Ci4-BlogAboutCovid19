<?= $this->extend('layout/admin'); ?>

<?= $this->section('main'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row w-100" style="width: 100%;">
                <div class="pd-ltr-20 xs-pd-20-10 mb-5" style="width: 100%;">
                    <div class="pd-20 card-box height-100-p" style="width: 100%;">
                        <div class="profile-photo">
                            <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                                    class="fa fa-pencil"></i></a>
                            <img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                <img id="image" src="vendors/images/photo2.jpg" alt="Picture">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center h5 mb-0"><?= $users['username']; ?></h5>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Account Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    <p><?= $users['email']; ?></p>
                                </li>
                                <li>
                                    <span>Role:</span>
                                    <p><?= $users['role']; ?></p>
                                </li>
                                <li>
                                    <span>User Name:</span>
                                    <p><?= $users['username']; ?></p>

                                </li>
                                <li>
                                    <span>Password:</span>
                                    <p><?= $users['password']; ?></p>
                                </li>
                                <li>
                                    <span>Createt At:</span>
                                    <p><?= $users['created_at']; ?></p>
                                </li>
                                <li>
                                    <span>Updated At:</span>
                                    <p><?= $users['updated_at']; ?></p>
                                </li>
                            </ul>
                            <a href="/edit?id=<?= $users['id']; ?>" class="btn btn-outline-primary m-1 btn-sm"><i
                                    class="dw dw-edit2"></i>
                                Edit</a>
                            <a href="/hapus/<?= $users['id']; ?>" class="btn btn-outline-danger m-1 btn-sm"
                                onclick="return confirm('Are You Sure to Delete?')"><i class="dw dw-delete-3"></i>
                                Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>