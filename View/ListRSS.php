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
        function updateCount {
            document.getElementById("boxesChecked").innerHTML = document.querySelector('input:checked').length;
        }
    </script>
    <div class="container mt-4">
        <ul class="ml-4 list-inline">
            <li class="list-inline-item">
                <a id="boxesChecked"></a>
            </li>
            <li class="list-inline-item">
                <button href="index.php?action=addRSS" class="btn btn-success btn-sm rounded-0" type="button" data-placement="top" title="Add"><i class="fa fa-plus"></i></button>
            </li>
        </ul>
    </div>
    <div class="container">
        <ul class="list-group mt-3">
		    <?php
			    if (isset($tabRSS) && !empty($tabRSS)) {
				    foreach ($tabRSS as $feed) {
					    echo    '<li class="list-group-item list-group-item-dark">
                                    <input type="checkbox">
                                    <a>' . $feed->getTitle() . '</a>
                                    <a> --- Lien : ' . $feed->getUrl() . '</a>
                                    <ul class="list-inline mr-4">
                                        <li class="list-inline-item">
                                            <button href="index.php?action=modifRSS&feed=' . $feed->getUrl() . '" class="btn btn-success btn-sm rounded-0" type="button" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                        </li>
                                        <li class="list-inline-item">
                                            <button href="index.php?action=deleteRSS&feed=' . $feed->getUrl() . '" class="btn btn-danger btn-sm rounded-0" type="button" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        </li>
                                    </ul>
                                </li>';
				    }
			    } else {
				    echo '<h1>PAS DE FLUX</h1>';
			    }
		    ?>
        </ul>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>