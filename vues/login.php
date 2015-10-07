<?php
include('./header.php'); 
?>

<body style="background:url('./../assets/images/background-login.jpg') 50% 50% no-repeat;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:15%; padding:0 80px;">
            <form>
                <h1 style="color:#FFF">Login Form</h1>
                <div style="padding:15px;">
                    <input type="text" class="form-control" placeholder="Username" required="" />
                </div>
                <div style="padding:15px;">
                    <input type="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div style="text-align:center;">
                    <a class="btn btn-default submit" href="index.html">Log in</a>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

</body>

</html>