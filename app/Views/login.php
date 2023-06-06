<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body class="login">
    <div class="notFound" data-flashdata=""></div>
    <div class="login-box">
        <h2 class="login-title">Login</h2>
        <form class="login-form" action="/auth" method="post">
            <div class="login-control">
                <label class="login-label" for="username">Username:</label>
                <i class="fa-sharp fa-solid fa-user login-icon"></i>
                <input class="login-input" type="text" id="username" name="username" placeholder="Input Username" required>
            </div>
            <div class="login-control">
                <label class="login-label" for="password">Password:</label>
                <i class="fa-sharp fa-solid fa-lock login-icon"></i>
                <input class="login-input" type="password" id="password" name="password" placeholder="Input Password" required>
            </div>
            <div class="login-control">
                <input class="login-submit" type="submit" value="Login">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>
</body>

</html>