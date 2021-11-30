<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>php_project_2A</title>
        <link rel="stylesheet" type="text/css" href="View/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="View/assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="View/assets/css/Navigation-with-Search.css">
        <link rel="stylesheet" type="text/css" href="View/assets/css/styles.css">
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: var(--bs-gray-800);color: var(--bs-green);">
            <div class="container"><a class="navbar-brand" href="index.php">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                        <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                    </form><a class="btn btn-light action-button" role="button" href="index.php?action=login" style="background: var(--bs-green);">Se connecter</a>
                </div>
            </div>
        </nav>
        <h1>ERROR</h1>
        <?php
            if (isset($errorArr)) {
                foreach ($errorArr as $value) {
                    echo $value;
                }
            }
        ?>
    </body>
</html>