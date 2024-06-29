<html>

<head>
    <title>Tampil Biodata</title>
</head>

<body>
    <center>
        <table>
            <tr>
                <th colspan="3">
                    Tampil Biodata
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <th>NIM</th>
                <th>:</th>
                <td>
                    <?= $nim; ?>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <?= $nama; ?>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <?= $alamat; ?>
                </td>
            </tr>
            <tr>
                <td>Hobby</td>
                <td>:</td>
                <td>
                    <?= $hobby; ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <?= $email; ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <a href="
                        <?= base_url('/'); ?>
                        ">
                        Kembali
                    </a>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>