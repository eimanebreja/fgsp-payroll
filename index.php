<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FGSP Payroll</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <div class="pc">

        <nav>
            <div class="nav-area">
                <div class="nav-content">
                    <a class="title" href="#">Feemo Global Solutions Philippines</a>
                </div>
            </div>
        </nav>
        <section>
            <div class="login-section">
                <div class="login-area">
                    <h1>Log In</h1>
                    <form method="POST" action="login.php">
                        <div class="form-section">
                            <div class="input-text">
                                Username
                            </div>
                            <div class="input-field">
                                <input type="text" name="username" placeholder="Enter your username...">
                            </div>

                            <div class="input-text input-pad">
                                Password
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" placeholder="Enter your password...">
                            </div>

                            <div class="btn-area">
                                <button id="login-btn" class="btn" name="login" disabled="disabled">LOGIN</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <div class="sp">
        <div class="title-support">
            <h1>
                Accessory Not Supported
            </h1>
            <p>This accessory is not supported by this mobile view.</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/payroll.js"></script>


    <script>
    (function() {
        $('form input').change(function() {

            var empty = false;
            $('form  input').each(function() {
                console.log($(this).val());
                if ($(this).val() == '') {
                    empty = true;
                }
            });
            if (empty) {
                $('#login-btn').attr('disabled', 'disabled');
            } else {
                $('#login-btn').removeAttr('disabled');
            }
        });
    })()
    </script>




</body>

</html>