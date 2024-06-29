<html>

<head>
    <title>Form Biodata</title>
</head>

<body>
    <center>
        <form action="<?= base_url('/cetak'); ?>" method="post">
            <table>
                <tr>
                    <th colspan="3">
                        Form Input Biodata
                    </th>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="nim" id="nim">
                    </td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama" id="nama">
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
                    <th>Hobby</th>
                    <td>:</td>
                    <td>
                        <select name="hobby" id="hobby">
                            <option value="">Pilih Hobby</option>
                            <option value="Memancing Ikan">Memancing ikan</option>
                            <option value="Membaca Buku">Membaca buku</option>
                            <option value="Menonton Film">Menonton Film</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="Simpan">
                        <input formaction="<?= base_url('/batal');  ?>" type="button" value="Batal">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>