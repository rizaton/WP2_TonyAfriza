<html>

<head>
    <title>Di-Lemas</title>
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
            <form action="<?= base_url('/login'); ?>" method="post">
                <table>
                    <tr>
                        <th colspan="3">
                            <h3>Login</h3>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3" style="color: red;">
                            <?= $message;  ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>:</td>
                        <td>
                            <input type="text" name="user" id="user">
                        </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>:</td>
                        <td>
                            <input type="password" name="pass" id="pass">
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
    </div>
</body>

</html>