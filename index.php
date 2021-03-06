<html lang="fr">

<!-- EPSI - I4 2015/2016 -->

<head>

    <meta charset="utf-8">
    <meta name="description" content="Livre audio">
    <title>Livre audio</title>
    
    <!-- Viewport -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/livres.js"></script>
    <script type="text/javascript" src="assets/js/user.js"></script>
    <script type="text/javascript" src="assets/js/scripts.js"></script>
    
</head>
<body>
    <!-- Loader -->

    <div id="spinner">
        <img src="assets/images/logo-wk-icon.png" />
    </div>
    
    <div id="header"></div>
    <div class="row" id="row-login">
        <div id="menu"></div>
        <span id="audio"></span>
        <div id="content"></div> 
    </div>
</body>
</html>

<script>
    
window.onload= function () {
    testConnexion();
};

</script>
