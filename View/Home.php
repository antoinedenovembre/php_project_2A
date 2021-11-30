<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php_project_2A</title>
    <style>
        <?php
            include 'assets/bootstrap/css/bootstrap.min.css';
            include 'assets/css/Navigation-with-Search.css';
            include 'assets/css/styles.css';
//            include 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css';

        ?>
    </style>
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: var(--bs-gray-800);color: var(--bs-green);">
        <div class="container"><a class="navbar-brand" href="#">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form>
                <a class="btn btn-light action-button" role="button" style="background: var(--bs-green);">Se connecter</a>
            </div>
        </div>
    </nav>
    <?php
        if (isset($tabNews) && !empty($tabNews)) {
            foreach ($tabNews as $news) {
                echo '<div class="row">
                            <h1>' . $news->getTitre() . '</h1>
                        </div>';
            }
        } else {
            echo '<h1>VIDE</h1>';
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="d-xxl-flex justify-content-xxl-center" style="background: transparent;">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>