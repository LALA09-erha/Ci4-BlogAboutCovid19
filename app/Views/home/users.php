<?= $this->extend('layout/admin'); ?>

<?= $this->section('main'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Table Simple</h4>
                </div>
                <div class="pb-20 table-responsive-xl">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif ?>
                    <table id="example" class="table table-responsive w-100 d-block d-md-table position-relative"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Role</th>
                                <th>UserName</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $user['role']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['password']; ?></td>
                                <td>
                                    <a href="/profile?id=<?= $user['id']; ?>"
                                        class="btn btn-outline-primary m-1 btn-sm"><i class="dw dw-edit2"></i>
                                        Detail</a>
                                    <!-- <a href="/hapus/<?= $user['id']; ?>" class="btn btn-outline-danger m-1 btn-sm"
                                        onclick="return confirm('Are You Sure to Delete?')"><i
                                            class="dw dw-delete-3"></i>
                                        Delete</a> -->
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>


        <?= $this->endSection(); ?>