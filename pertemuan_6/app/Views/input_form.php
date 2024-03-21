<html>

<head>
    <title>Form Menu</title>
    <style>
        .t1 {
            width: 75%;
        }

        .t1 table,
        .t1 td,
        .t1 th {
            border: 1px solid;
        }

        .t1 table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <center>
        <h2>
            Digital Learning Management System (Di-Lemas)
        </h2>
    </center>
    <center>
        <p style="color: red;;">
            <?= $message ?>
        </p>
    </center>
    <hr>
    <div class="form" style="padding-top: 1.2rem;">
        <center>
            <form action="<?= base_url('form/create'); ?>" method="post">
                <table>
                    <tr>
                        <th colspan="3">
                            Form tambah data siswa
                        </th>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Kode siswa</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="kode" id="kode">
                        </td>
                    </tr>
                    <tr>
                        <th>NIS</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="nis" id="nis">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" id="nama">
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="kelas" id="kelas">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="tanggal_lahir" id="tanggal_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Tempat lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="tempat_lahir" id="tempat_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="alamat" id="alamat">
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki">
                            <label for="laki_laki">Laki-Laki</label>
                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>:</td>
                        <td>
                            <select name="agama" id="agama">
                                <option value="">--Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Protestans">Protestan</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" value="Submit">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
        <hr>
        <center>
            <div class="t1">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Siswa</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas Siswa</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($students as $s) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $s['studentid']; ?></td>
                                <td><?= $s['nis']; ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['kelas']; ?></td>
                                <td><?= $s['tanggal_lahir']; ?></td>
                                <td><?= $s['tempat_lahir']; ?></td>
                                <td><?= $s['alamat']; ?></td>
                                <td><?= $s['jenis_kelamin']; ?></td>
                                <td><?= $s['agama']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </center>
        <hr>
        <center>
            <form action="<?= base_url('form/update'); ?>" method="post">
                <table>
                    <tr>
                        <th colspan="3">
                            Form update data siswa
                        </th>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Kode siswa</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="kode" id="kode">
                        </td>
                    </tr>
                    <tr>
                        <th>NIS</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="nis" id="nis">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" id="nama">
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="kelas" id="kelas">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="tanggal_lahir" id="tanggal_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Tempat lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="tempat_lahir" id="tempat_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="alamat" id="alamat">
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki">
                            <label for="laki_laki">Laki-Laki</label>
                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>:</td>
                        <td>
                            <select name="agama" id="agama">
                                <option value="">--Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Protestans">Protestan</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" value="Submit">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
        <hr>
        <center>
            <form action="<?= base_url('form/delete'); ?>" method="post">
                <table>
                    <tr>
                        <th colspan="3">
                            Delete data siswa
                        </th>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Kode siswa</th>
                        <th>:</th>
                        <td>
                            <input type="text" name="d_kode" id="kode">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" value="delete">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
    <div class="simple_padding" style="padding-bottom: 5rem;"></div>
</body>

</html>