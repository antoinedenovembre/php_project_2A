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
        <div class="container"><a class="navbar-brand" href="index.php">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form action="index.php?action=search" method="POST" class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                    <div class="d-flex align-items-center">
                        <label class="form-label d-flex mb-0" for="search-field"></label>
                        <i class="fa fa-search"></i><input class="form-control search-field" type="text" id="search-field" name="stringSearch">
                    </div>
                </form>
                <ul class="list-inline-item list-inline m-0 p-0">
                    <?php if (isset($admin)) {
                        echo '<li class="list-inline-item">';
                        echo '<a class="btn btn-light action-button" role="button" style="background: var(--bs-green);" href="index.php?action=listRSS">Feeds</a>';
                        echo '</li>';
                    } ?>
                    <li class="list-inline-item">
                        <a class="btn btn-light action-button" role="button" style="background: var(--bs-green);" href="index.php?action=<?php if (isset($admin)) {
		                    echo "logOut";
	                    } else {
		                    echo "loginPage";
	                    }?>">
		                    <?php if (isset($admin)) {
			                    echo 'Se déconnecter';
		                    } else {
			                    echo 'Se connecter';
		                    } ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5 pl-5 pr-5 mt-5">
        <div class="btn-group" role="group" aria-label="Basic example">
            <?php
                function order(string $order) : string
                {
                    return match ($order) {
                        "desc" => "&order=asc",
                        default => "&order=desc",
                    };
                }

                function typeSelected(string $myType, string $type, $order) : string
                {
                    if ($myType === $type) {
                        return match($order) {
                            "desc"=>"fa fa-angle-down",
                            default=>"fa fa-angle-up",};
                    }

                    return "";
                }

                if(isset($order, $type, $page) && !empty($tabNews)) {
                    echo '<button onclick="location.href=\'index.php?action=findNews&type=date';
                    echo order($order) . "&page=$page" . '\'" type="button" class="btn btn-light">date';
                    echo '<i class="'.typeSelected("date", $type, $order).'"></i></button>';

                    echo '<button onclick="location.href=\'index.php?action=findNews&type=websiteUrl';
                    echo order($order) . "&page=$page" . '\'" type="button" class="btn btn-light">website';
                    echo '<i class="'.typeSelected("website", $type, $order).'"></i></button>';

                    echo '<button onclick="location.href=\'index.php?action=findNews&type=title';
                    echo order($order) . "&page=$page" . '\'" type="button" class="btn btn-light">title';
                    echo '<i class="'.typeSelected("title", $type, $order).'"></i></button>';
                }
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
                            function liRef(string $type, string $order) : string
                            {
                                return '<a class="page-link" href="index.php?action=findNews&type=' . $type . '&order=' . $order . '&page=';
                            }

                            function displayPage(int $pos, int $page, string $type, $order) : void
                            {
                                if ($pos === $page) {
                                    echo '<li class="page-item active">' . liRef($type, $order) . $pos . '">' . $pos . '</a></li>';
                                } else {
                                    echo '<li class="page-item">' . liRef($type, $order) . $pos . '">' . $pos . '</a></li>';
                                }
                            }

		                    if (isset($page, $nbPage, $order, $type)) {
                                if ($nbPage <= 1) {
                                    echo '<li class="page-item active">1</li>';
                                } else {
                                    if ($page !== 1) {
                                        echo '<li class="page-item">' . liRef($type, $order) . $page - 1, '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                                    }
                                    if ($nbPage < 8) {
                                        for ($i = 1; $i <= $nbPage; ++$i) {
                                            displayPage($i, $page, $type, $order);
                                        }
                                    } else if ($page < 4) {
                                        for ($i = 1; $i <= 5; ++$i) {
                                            displayPage($i, $page, $type, $order);
                                        }
                                        echo '<li class="page-item">...</li>';
                                        echo '<li class="page-item">' . liRef($type, $order) . $nbPage . '">' . $nbPage . '</a></li>';
                                    } else if ($page > $nbPage - 3) {
                                        echo '<li class="page-item">' . liRef($type, $order) . '">1</a></li>';
                                        echo '<li class="page-item">...</li>';
                                        for ($i = $nbPage - 4; $i <= $nbPage; ++$i) {
                                            displayPage($i, $page, $type, $order);
                                        }
                                    } else {
                                        echo '<li class="page-item">' . liRef($type, $order) .  '">1</a></li>';
                                        echo '<li class="page-item">...</li>';
                                        for ($i = $page - 1; $i <= $page + 1; ++$i) {
                                            displayPage($i, $page, $type, $order);
                                        }
                                        echo '<li class="page-item">...</li>';
                                        echo '<li class="page-item">' . liRef($type, $order) . $nbPage . '">' . $nbPage . '</a></li>';
                                    }

                                    if ($page !== $nbPage) {
                                        echo '<li class="page-item">' . liRef($type, $order) . $page + 1, '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
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