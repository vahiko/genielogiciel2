<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Circuit</title>

    <link rel="stylesheet" href="../assetsIvan/css/hover-min.css">
    <link rel="stylesheet" href="../assetsIvan/css/animate.css">
    <link rel="stylesheet" href="../assetsIvan/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../assetsIvan/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assetsIvan/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assetsIvan/css/Article-Clean.css">
    <link rel="stylesheet" href="../assetsIvan/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="../assetsIvan/css/Article-List.css">
    <link rel="stylesheet" href="../assetsIvan/css/Footer-Basic.css">
    <link rel="stylesheet" href="../assetsIvan/css/Footer-Clean.css">
    <link rel="stylesheet" href="../assetsIvan/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="../assetsIvan/css/styles.css">

    <script src="../ControllerIvan/AdminControllerIvan/_Query.js"></script>
    <script src="../ControllerIvan/AdminControllerIvan/View.js"></script>
    <script src="../libs/jquery-3.4.1.min.js"></script>


</head>
<body onload="DetailCircuit();">
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <div class="container"><img src="../assetsIvan/img/travel-icon.png" style="width: 30px;height: 30px;margin-right: 5px;"><a class="navbar-brand" href="#"><strong>Northern Star Travel</strong></a><a href="#"><i class="icon ion-android-call" style="margin-right: 10px;"></i>1-800-885-8555</a>
        <select
            style="margin: 5px;">
            <option value="12" selected="">FR</option>
            <option value="13">EN</option>
            <option value="14">ES</option>
        </select><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#">First Item</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Second Item</a></li>
                <li class="nav-item" role="presentation"></li>
            </ul><span class="navbar-text actions"> <a class="login" href="#" style="/*display: block;*/"><i class="icon-login"></i>&nbsp;Log In</a><a class="btn btn-light action-button" role="button" href="#">Sign Up</a></span></div>
    </div>
</nav>
<main>
    <div class="container border border-primary rounded-lg animated zoomInRight" style="padding: 10px;">
        <!--Ajouter un circuit-->
        <section id="ajouter_circuit" class="animated zoomInRight"></section>
        <!--Ajouter un etape-->
        <section id="ajouter_etape">
            <button class="btn btn-success" type="button" style="margin-top: 5px;">Ajouter un étape</button>
            <h3>Étape 1 - Tata</h3>
            <div class="btn-toolbar" style="margin-bottom: 10px;">
                <div class="btn-group" role="group"><button class="btn btn-warning" type="button">Modifier</button><button class="btn btn-danger" type="button">Supprimer</button></div>
                <div class="btn-group" role="group"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card" style="padding: 10px;"><img class="card-img-top w-100 d-block" src="building.jpg"></div>
                </div>
                <div class="col-8">
                    <p>Paragraph fds fsdf fdsf fdsf sdf fdsf sdf sdfs d</p>
                </div>
            </div>
        </section>
        <!--Ajouter un jour-->
        <section id="ajouter_jour">
            <button class="btn btn-success" type="button" style="margin: 5px;">Ajouter un jour</button>
            <div class="border border-primary rounded-lg" style="margin-left: 30px;width: 70%;">
                <div style="padding: 5px;">
                    <div class="row">
                        <div class="col"><span style="padding: 5px;font-size: 20px;">Jour 1</span></div>
                        <div class="col" style="text-align: right;margin-right: 5px;"><span style="padding: 5px;background-color: greenyellow;font-size: 20px;">1000$</span></div>
                    </div>
                    <div class="btn-toolbar">
                        <div class="btn-group" role="group"><button class="btn btn-warning" type="button">Modifier</button><button class="btn btn-danger" type="button">Supprimer</button><button class="btn btn-primary" type="button">Détaillé</button></div>
                    </div>
                    <div></div>
                </div>
            </div>
        </section>
    </div>
</main>
</body>
</html>