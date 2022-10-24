<?php

echo $this->extend('layout/template');
echo $this->section('page-content');


?>

<div class="container pt-5 pl-5">
    <div class="row">
        <div class="col-lg-11">
            <h2 class="ml-3">User List</h2>
            <a href="<?= base_url('register') ?>" class="btn btn-success mt-2 ml-3">Tambah User</a>
            <table class="table table-hover mt-3 text-sm">
                <thead>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Unit Kerja</th>
                    <th>Jabatan</th>
                    <th>No Handphone</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user->fullname; ?></td>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->unit_kerja; ?></td>
                            <td><?= $user->jabatan; ?></td>
                            <td><?= $user->telpon; ?></td>
                            <td><a href="<?= base_url('/user/' . $user->userid); ?>"><?= $user->name; ?></a></td>
                            <td>
                                <form action="<?= base_url('/user/' . $user->userid); ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-circle btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus User" onclick="return confirm('Anda Yakin Akan Menghapus User Ini?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>