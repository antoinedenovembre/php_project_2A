<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php_project_2A</title>
    <link rel="stylesheet" href="View/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="View/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="View/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="View/assets/css/LinkedIn-like-Profile-Box.css">
    <link rel="stylesheet" href="View/assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="View/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="View/assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="View/assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: var(--bs-gray-800);color: var(--bs-green);">
        <div class="container"><a class="navbar-brand" href="index.php">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form>
            </div><i class="icon ion-ios-locked-outline" style="width: 40px;height: 40px;justify-content: center;display: flex;align-items: center;"></i>
        </div>
    </nav>
    <!-- selected checkboxes counter -->
    <script>
        function checkboxes()
        {
            let inputElems = document.getElementsByTagName("input"),
                count = 0;

            for (let i=0; i < inputElems.length; i++) {
                if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
                    count++;
                }
                document.getElementById('boxesChecked').innerHTML = count.toString() + " selected";
            }
        }

        function feedsSelected()
        {
            let urls = document.getElementsByClassName("links"),
                inputElems = document.getElementsByTagName("input"),
                selected = [], checkboxes = [];

            for (let i = 0; i < inputElems.length; i++) {
                if (inputElems[i].type === "checkbox") {
                    checkboxes.push(inputElems[i]);
                }
            }

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked === true) {
                    selected.push(i, urls[i].getAttribute("href"));
                }
            }
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="m-4">
                    <div class="float-start">
                        <a href="index.php?action=addRSSPage" class="btn btn-success btn-sm rounded" type="button" data-placement="top" title="Add"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="float-end">
                        <ul class="list-inline">
                            <li class="list-inline-item mr-0">
                                <a id="boxesChecked">0 selected</a>
                                <a id="json-data"></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="index.php?action=delSelectRSS" class="btn btn-danger btn-sm rounded" type="button" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <ul class="list-group mt-3">
				    <?php
					    if (isset($tabFeeds) && !empty($tabFeeds)) {
						    foreach ($tabFeeds as $feed) {
							    echo    '<li class="list-group-item list-group-item-dark">
                                    <ul class="list-inline mr-4">
                                        <li class="list-inline-item">
                                            <input onclick="feedsSelected();" type="checkbox">
                                            <a><strong>' . $feed->getTitle() . '</strong></a>
                                            <a> --- Lien : </a>
                                            <a class="links" href="' . $feed->getUrl() . '">' . $feed->getUrl() . '</a>
                                        </li>
                                        <ul class="list-inline-item list-inline mr-0">
                                            <li class="list-inline-item">
                                                <a href="index.php?action=modifRSSPage&feed=' . $feed->getUrl() . '&title=' . $feed->getTitle() . '" class="btn btn-success btn-sm rounded" type="button" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="index.php?action=deleteRSS&feed=' . $feed->getUrl() . '" class="btn btn-danger btn-sm rounded" type="button" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                            </li>
                                        </ul>
                                    </ul>
                                </li>';
						    }
					    } else {
						    echo '<h1>PAS DE FLUX</h1>';
					    }
				    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container fixed-bottom">
        <div class="row">
            <div class="col">
                <nav class="d-xxl-flex justify-content-xxl-center" style="background: transparent;">
                    <ul class="pagination">
					    <?php
						    if (isset($page, $nbPage)) {
							    if ($nbPage <= 1) {
								    echo '<li class="page-item">1</li>';
							    } else {
								    if ($page !== 1) {
									    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=', $page - 1, '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
								    }
								    if ($nbPage < 8) {
									    for ($i = 1; $i <= $nbPage; ++$i) {
										    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $i . '">' . $i . '</a></li>';
									    }
								    } else if ($page < 4) {
									    for ($i = 1; $i <= 5; ++$i) {
										    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $i . '">' . $i . '</a></li>';
									    }
									    echo '<li class="page-item">...</li>';
									    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $nbPage . '">' . $nbPage . '</a></li>';
								    } else if ($page > $nbPage - 3) {
									    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=1">1</a></li>';
									    echo '<li class="page-item">...</li>';
									    for ($i = $nbPage - 4; $i <= $nbPage; ++$i) {
										    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $i . '">' . $i . '</a></li>';
									    }
								    } else {
									    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=1">1</a></li>';
									    echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
									    for ($i = $page - 2; $i <= $page + 2; ++$i) {
										    echo '<li class="page-item"><a class="page-link" href="index.php?action=findNews&page=' . $i . '">' . $i . '</a></li>';
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