<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Online Voting System</title>
</head>

<body class="home-bg">
    <?php include "header.php"; ?>
    <main>
        <div class="form-container">
            <h3 class="welcome-msg">Login</h3>
            <form action="login-script.php" method="POST">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" class="input-field" name="name" placeholder="Username/Email" />
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input type="password" class="input-field" name="pwd" placeholder="Password" id="pwd-input" />
                    <span class="pwd-visibility" onclick="visibility()">
                        <i id="visible" class="fa fa-eye"></i>
                        <i id="hidden" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <select class="form-select m-auto" name="login-role" aria-label="Default select example">
                    <option selected>Choose a role</option>
                    <option value="Candidate">Candidate</option>
                    <option value="Voter">Voter</option>
                    <option value="Admin">Admin</option>
                </select>
                <div class="register">
                    <a href="signup.php">Register Now</a>
                    <a href="resetpwd.php">Forgot Password?</a>
                </div>
                <button class="login-btn" type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </main>

    <script>
        function visibility() {
            var click = document.getElementById("pwd-input");
            var eyeOpen = document.getElementById("visible");
            var eyeClose = document.getElementById("hidden");

            if (click.type === "password") {
                click.type = "text";
                eyeOpen.style.display = "block";
                eyeClose.style.display = "none";
            } else {
                click.type = "password";
                eyeOpen.style.display = "none";
                eyeClose.style.display = "block";
            }
        }
    </script>
</body>

</html>