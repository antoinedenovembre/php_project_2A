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
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search fixed-top" style="background: var(--bs-gray-800);color: var(--bs-green);">
        <div class="container"><a class="navbar-brand" href="#">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form action="index.php?action=search" method="POST" class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="text" id="search-field" name="stringSearch"></div>
                </form>
                <a class="btn btn-light action-button" role="button" style="background: var(--bs-green);" href="index.php?action=loginPage">Se connecter</a>
            </div>
        </div>
    </nav>
    <div class="container pt-5 pl-5 pr-5 mt-5">
        <div class="btn-group" role="group" aria-label="Basic example">
            <?php
                function order(string $order) : string
                {
                    return match ($order) {
                        "asc" => "&order=desc",
                        default => "&order=asc",
                    };
                }

                function typeSelected(string $myType, string $type, $order) : string
                {
                    if ($myType === $type) {
                        return match($order) {
                            "asc"=>"fa fa-angle-up",
                            default=>"fa fa-angle-down",};
                    }

                    return "";
                }
                echo '<button onclick="location.href=\'index.php?action=orderBy&type=date';
                if (isset($order)) {
                    echo order($order);
                }
                echo '\'" type="button" class="btn btn-light">date ';

                if (isset($type, $order)) {
                    echo '<i class="'.typeSelected("date", $type, $order).'"></i>';
                }
                echo '</button>';

                echo '<button onclick="location.href=\'index.php?action=orderBy&type=website';
                if (isset($order)) {
                    echo order($order);
                }
                echo '\'" type="button" class="btn btn-light">website ';

                if (isset($type, $order)) {
                    echo '<i class="'.typeSelected("date", $type, $order).'"></i>';
                }
                echo '</button>';

                echo '<button onclick="location.href=\'index.php?action=orderBy&type=title';
                if (isset($order)) {
                    echo order($order);
                }
                echo '\'" type="button" class="btn btn-light">title ';

                if (isset($type, $order)) {
                    echo '<i class="'.typeSelected("date", $type, $order).'"></i>';
                }
                echo '</button>';
            ?>
        </div>
    </div>
    <div class="container p-2">
        <ul class="list-group mb-5">
	        <?php
		        if (!empty($tabNews)) {
			        foreach ($tabNews as $news) {
				        echo    '<li class="list-group-item list-group-item-dark">
                                    <a href="' . $news->getWebsiteUrl() . '">' . $news->getWebsite() . '</a>
                                    <a> - </a>
                                    <a href="' . $news->getUrl() . '">' . $news->getTitle() . '</a>
                                    <p>' . $news->getDesc() . '</p>
                                    <p>' . $news->getDate() . '</p>
                                </li>';
			        }
		        } else {
			        echo '<h1>PAS DE NEWS</h1>';
		        }
	        ?>
        </ul>
    </div>
    <div class="container fixed-bottom">
        <div class="row">
            <div class="col">
                <nav class="d-xxl-flex justify-content-xxl-center" style="background: transparent;">
                    <ul class="pagination">
	                    <?php
                            function displayPage(int $pos, int $page) : void
                            {
                                if ($pos === $page) {
                                    echo '<li class="page-item active"><a class="page-link" href="index.php?action=findNews&page=' . $page . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $pos . '">' . $pos . '</a></li>';
                                }
                            }

		                    if (isset($page, $nbPage)) {
                                if ($nbPage <= 1) {
                                    echo '<li class="page-item active">1</li>';
                                } else {
                                    if ($page !== 1) {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=', $page - 1, '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                                    }
                                    if ($nbPage < 8) {
                                        for ($i = 1; $i <= $nbPage; ++$i) {
                                            displayPage($i, $page);
                                        }
                                    } else if ($page < 4) {
                                        for ($i = 1; $i <= 5; ++$i) {
                                            displayPage($i, $page);
                                        }
                                        echo '<li class="page-item">...</li>';
                                        echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $nbPage . '">' . $nbPage . '</a></li>';
                                    } else if ($page > $nbPage - 3) {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=1">1</a></li>';
                                        echo '<li class="page-item">...</li>';
                                        for ($i = $nbPage - 4; $i <= $nbPage; ++$i) {
                                            displayPage($i, $page);
                                        }
                                    } else {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=1">1</a></li>';
                                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                                        for ($i = $page - 2; $i <= $page + 2; ++$i) {
                                            displayPage($i, $page);
                                        }
                                        echo '<li class="page-item">...</li>';
                                        echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $nbPage . '">' . $nbPage . '</a></li>';
                                    }

                                    if ($page !== $nbPage) {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=', $page + 1, '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                                    }
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