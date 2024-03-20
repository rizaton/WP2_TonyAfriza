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
    <hr>
    <div class="login" style="padding-top: 1.2rem;">
        <center>
            <p style="color: red;;">
                <?= $message ?>
            </p>
        </center>
        <center>
            <form action="<?= base_url('menu/create'); ?>" method="post">
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
                            <input type="text" name="c_kode" id="c_kode">
                        </td>
                    </tr>
                    <tr>
                        <th>NIS</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="c_nis" id="c_nis">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="c_nama" id="c_nama">
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="c_kelas" id="c_kelas">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="c_tanggal_lahir" id="c_tanggal_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Tempat lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="c_tempat_lahir" id="c_tempat_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="c_alamat" id="c_alamat">
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>
                            <input type="radio" name="c_jenis_kelamin" id="c_laki_laki" value="Laki-Laki">
                            <label for="laki_laki">Laki-Laki</label>
                            <input type="radio" name="c_jenis_kelamin" id="c_perempuan" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td>:</td>
                        <td>
                            <select name="c_agama" id="c_agama">
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
            <form action="<?= base_url('/update'); ?>" method="post">
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
                            <input type="text" name="u_kode" id="u_kode">
                        </td>
                    </tr>
                    <tr>
                        <th>NIS</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="u_nis" id="u_nis">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="u_nama" id="u_nama">
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas Siswa</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="u_kelas" id="u_kelas">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="u_tanggal_lahir" id="u_tanggal_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Tempat lahir</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="u_tempat_lahir" id="u_tempat_lahir">
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="u_alamat" id="u_alamat">
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td>
                            <input type="radio" name="u_jenis_kelamin" id="u_laki_laki" value="Laki-Laki">
                            <label for="laki_laki">Laki-Laki</label>
                            <input type="radio" name="u_jenis_kelamin" id="u_perempuan" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td>:</td>
                        <td>
                            <select name="u_agama" id="u_agama">
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
            <form action="<?= base_url('/delete'); ?>" method="post">
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
                            <input type="text" name="d_kode" id="d_kode">
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
    <hr>
    <center>
        <form action="<?= base_url('/logout');  ?>">
            <input type="submit" value="Logout">
        </form>
    </center>
    <div class="simple_padding" style="padding-bottom: 5rem;"></div>
</body>

</html>