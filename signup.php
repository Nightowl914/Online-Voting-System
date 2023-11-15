<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Voting System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="home-bg">
    <?php include "header.php"; ?>
    <main>
        <div class="form-container-signup">
            <h3 class="signup">Sign Up</h3>
            <form action="signup-script.php" method="POST" enctype="multipart/form-data">
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input type="text" class="input-field" name="name" placeholder="Username" />
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" class="input-field" name="email" placeholder="Email" />
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input type="password" class="input-field" name="pwd" placeholder="Password" id="pwd-input" />
                    <span class="pwd-visibility" onclick="visibility()">
                        <i id="visible" class="fa fa-eye"></i>
                        <i id="hidden" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input type="password" class="input-field" name="c-pwd" placeholder="Confirm password" id="c-pwd-input" />
                    <span class="pwd-visibility" onclick="cVisibility()">
                        <i id="c-visible" class="fa fa-eye"></i>
                        <i id="c-hidden" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <select class="form-select m-auto" name="login-role" aria-label="Default select example">
                    <option selected>Choose a role</option>
                    <option value="Admin">Admin</option>
                    <option value="Candidate">Candidate</option>
                    <option value="Voter">Voter</option>
                </select>
                <div class="input-group fileUpload m-auto">
                    <input type="file" name="photo" class="form-control custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Choose Image</button>
                </div>
                <button class="signup-btn" type="submit" name="submit">SIGN UP</button>
                <p class="redirect">
                    Already have an account?
                    <span><a href="login.php">Log in here</a></span>
                </p>
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

        function cVisibility() {
            var click = document.getElementById("c-pwd-input");
            var eyeOpen = document.getElementById("c-visible");
            var eyeClose = document.getElementById("c-hidden");

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