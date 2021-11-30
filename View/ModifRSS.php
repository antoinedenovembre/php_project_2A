<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>php_project_2A</title>
    <link rel="stylesheet" href="View/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
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
        <div class="container"><a class="navbar-brand" href="#">AutoNews</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="me-auto search-form" target="_self" style="background: transparent;color: rgb(255,255,255);">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form>
            </div><i class="icon ion-ios-locked-outline" style="width: 40px;height: 40px;justify-content: center;display: flex;align-items: center;"></i>
        </div>
    </nav>
    <section class="newsletter-subscribe">
        <div class="container" style="padding: 25px;">
            <div class="intro">
                <h2 class="text-center">Modifier un flux RSS</h2>
                <p class="text-center">Collez ci-dessous un nouveau lien de flux RSS et ajoutez-le</p>
            </div>
            <form class="d-flex justify-content-center flex-wrap" method="post">
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="title" placeholder="Titre du flux">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="email" name="link" placeholder="Lien du flux RSS">
                    </label></div>
                <div class="mb-3"><button class="btn btn-primary" type="submit">Soumettre</button></div>
            </form>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>