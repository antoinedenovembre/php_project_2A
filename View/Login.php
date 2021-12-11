<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php_project_2A</title>
    <link rel="stylesheet" href="View/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="View/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="View/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="View/assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="View/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="View/assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="View/assets/css/styles.css">
</head>

<body class="overflow-hidden">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: var(--bs-gray-800);color: var(--bs-green);">
        <div class="container">
            <a class="navbar-brand" href="index.php">AutoNews</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger text-center" role="alert">
                    <strong>Users or password is not correct</strong>
                  </div>';
        }
    ?>
    <section class="login-dark">
        <form action="index.php?action=login" method="post">
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="mb-3">
                <label>
                    <input class="form-control" type="text" name="username" placeholder="Username" value="<?php if (isset($username)) {echo $username;} ?>">
                </label>
            </div>
            <div class="mb-3">
                <label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </label>
            </div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Se connecter</button></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>