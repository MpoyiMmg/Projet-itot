<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>LogIn</title>
    </head>
    <body>
        <div style="width: 50%; padding: 10px" class="container">

            <form action="login_validation" method="post">
                <p class="h3 text-center mb-4">Sign in</p>
                <div style="margin-bottom: 5%" class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label for="defaultForm-email">username</label>
                    <input type="text" name="username" id="defaultForm-email" class="form-control">
                </div>
            
                <div style="margin-bottom: 10px" class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <label for="defaultForm-pass">Your password</label>
                    <input type="password" name="password" id="defaultForm-pass" class="form-control">
                </div>
            
                <div class="text-center">
                    <button type="submit" style="background-color: rgb(30,90,93); color: white; font-weight: bold" class="btn col-md-12">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>