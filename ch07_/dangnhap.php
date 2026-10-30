<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="dangnhap.css">
</head>
<body>
    <h1>Đăng Nhập</h1>
    <form action="dangnhap_xuly.php" method="post">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember</label>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="login" value="Login"></td>
                <td><input type="submit" name="cancel" value="Cancel"></td>
            </tr>
        </table>
    </form>
</body>
</html>
