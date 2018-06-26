<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>assets/img/basic/favicon.ico" type="image/x-icon">
    <title>KP - Admin</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="<?php echo base_url();?>assets/img/dummy/u5.png" alt="">
                        <h3 class="mt-2">Welcome Back</h3>
                        <p id="message-login" class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff waiting
                            for you</p>
                    </div>
                    <form id="form-login" action="<?php echo base_url();?>dashboard">
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input id="email" type="text" class="form-control form-control-lg"
                                   placeholder="Email Address">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input id="password" type="text" class="form-control form-control-lg"
                                   placeholder="Password">
                        </div>
                        <input type="submit" id="btn-submit" class="btn btn-success btn-lg btn-block" value="Log In">
                        <p class="forget-pass">Have you forgot your username or password ?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!--/#app -->
<script src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#form-login').submit (function() {
        email = $("#email").val();
        password = $("#password").val();
        is_valid = false;
        if (email && password) {
            if(!isEmail(email)) {
                // test : passed
                $("#message-login").text('Invalid Email Address!')        

                // test : failed
                //$("#message-login").text('Failed!')        
            } else {
                is_valid = true;
            }
        } else {
            // test : passed
            $("#message-login").text('Email Address / Password can not be blank!')        

            // test : failed
            //$("#message-login").text('Email Address / Password mandatory!')        
        }
        console.log('is_valid = ' + is_valid);

        //result = failed if commented
        if(is_valid)
            return true;
        //result = passed 
        return false;
    });
})

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
</script>

</body>
</html>