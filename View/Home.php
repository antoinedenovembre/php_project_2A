<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php_project_2A</title>
    <link rel="stylesheet" type="text/css" href="View/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="View/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" type="text/css" href="View/assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="View/assets/fonts/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: var(--bs-gray-800);color: var(--bs-green);">
        <div class="container"><a class="navbar-brand" href="#">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form>
                <a class="btn btn-light action-button" role="button" style="background: var(--bs-green);" href="index.php?action=login">Se connecter</a>
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
    <div class="container fixed-bottom">
        <div class="row">
            <div class="col">
                <nav class="d-xxl-flex justify-content-xxl-center" style="background: transparent;">
                    <ul class="pagination">
	                    <?php
		                    if (isset($page) && isset($nbpage)) {
			                    if ($page === 1 && $nbpage === 1) {

				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>';

			                    } else if ($page < 4) {

				                    if ($page !== 1) {
					                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page - 1 , '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
				                    }
				                    if ($nbpage < 8) {
					                    for ($i = 1; $i < 8; $i++) {
						                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
					                    }
				                    } else {
					                    for ($i = 1; $i < 6; $i++) {
						                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
					                    }
					                    echo '<li class="page-item">...</li>';
					                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $nbpage . '">' . $nbpage . '</a></li>';
				                    }
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=2" aria-label="Next"><span aria-hidden="true">»</span></a></li>';

			                    } else if ($page > $nbpage - 4) {

				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=5" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
				                    if ($nbpage < 8) {
					                    for ($i = 1; $i < 8; $i++) {
						                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
					                    }
				                    } else {
					                    echo '<li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>';
					                    echo '<li class="page-item">...</li>';
					                    for ($i = $nbpage - 4; $i <= $nbpage; $i++) {
						                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
					                    }
				                    } if ($page !== $nbpage) {
					                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page + 1 , '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
				                    }

			                    } else {
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page - 1 , '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>';
				                    echo '<li class="page-item">...</li>';
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page - 1 , '">' , $page - 1 , '</a></li>';
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page , '">' , $page, '</a></li>';
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page + 1 , '">' , $page + 1 , '</a></li>';
				                    echo '<li class="page-item">...</li>';
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $nbpage , '">' , $nbpage, '</a></li>';
				                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' , $page + 1 , '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
			                    }
		                    }
	                    ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>