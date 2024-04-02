<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Anggota</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $userModels = new \App\Models\UserModel();
                                $totalUser = $userModels->whereUser(['role_id' => 1])->countAllResults();
                                echo $totalUser;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user/members'); ?>">
                                <i class="fas fa-users fa-3x text-warning"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Stok Buku Terdaftar
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = new \App\Models\BookModel;
                                $total = $where->total(
                                    'stock',
                                    '`stock` != 0'
                                );
                                echo $total;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('book'); ?>">
                                <i class="fas fa-book fa-3x text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Buku yang dipinjam
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = new \App\Models\BookModel;
                                $total = $where->total(
                                    'borrowed',
                                    '`borrowed` != 0'
                                );
                                echo $total;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user'); ?>">
                                <i class="fas fa-user-tag fa-3x text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                                Buku yang dibooking
                            </div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = new \App\Models\BookModel;
                                $total = $where->total(
                                    'booked',
                                    '`booked` != 0'
                                );
                                echo $total;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user'); ?>">
                                <i class="fas fa-shopping-cart fa-3x text-danger"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- row table-->
    <div class="row">
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-users text-primary mt-2 ">
                    Data User
                </span>
                <a class="text-danger" href="<?= base_url('user/user_data'); ?>">
                    <i class="fas fa-search mt-2 float-right">
                        Tampilkan
                    </i>
                </a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Aktif</th>
                        <th>Member Sejak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($members as $m) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $m['name']; ?></td>
                            <td><?= $m['email']; ?></td>
                            <td><?= $m['role_id']; ?></td>
                            <td><?= $m['is_active']; ?></td>
                            <td><?= date('Y', $m['input_date']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-book text-warning mt-2">
                    Data Buku
                </span>
                <a href="<?= base_url('book'); ?>">
                    <i class="fas fa-search text-primary mt-2 float-right">
                        Tampilkan
                    </i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($book as $b) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $b['book_title']; ?></td>
                                <td><?= $b['author']; ?></td>
                                <td><?= $b['publisher']; ?></td>
                                <td><?= $b['publish_year']; ?></td>
                                <td><?= $b['isbn']; ?></td>
                                <td><?= $b['stock']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of row table-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->