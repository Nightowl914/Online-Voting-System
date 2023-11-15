<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <title>Online Voting System</title>
</head>

<body>
    <?php
    include("admin-script.php");
    ?>
    <div id="wrapper">

        <!--sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills" role="tablist">
                <li class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><a href="#">Dashboard</a></li>
                <li class="nav-link" id="v-pills-voter-tab" data-bs-toggle="pill" data-bs-target="#v-pills-voter" type="button" role="tab" aria-controls="v-pills-voter" aria-selected="false"><a href="#">Voter</a></li>
                <li class="nav-link" id="v-pills-candidate-tab" data-bs-toggle="pill" data-bs-target="#v-pills-candidate" type="button" role="tab" aria-controls="v-pills-candidate" aria-selected="false"><a href="#">Candidate</a></li>
            </ul>
        </div>

        <!--page content -->
        <div id="page-content-wrapper" class="tab-content">
            <a href="logout-script.php" class="lg-btn">
                Log out
            </a>
            <div class="container-fluid tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                <div class="row">
                    <h1>Dashboard</h1>
                    <div class="col-lg-12 d-wrapper">
                        <div class="card-wrapper">
                            <div class="card-title">
                                <h1>Total Candidate</h1>
                            </div>
                            <div class="card-content">
                                <h3>
                                    <?php echo $total_candidates; ?>
                                </h3>
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>

                        <div class="card-wrapper">
                            <div class="card-title">
                                <h1>Total Voter</h1>
                            </div>
                            <div class="card-content">
                                <h3>
                                    <?php echo $total_voters; ?>
                                </h3>
                                <i class="fa-sharp fa-solid fa-person-booth"></i>
                            </div>
                        </div>

                        <div class="card-wrapper">
                            <div class="card-title">
                                <h1>Leading Candidate</h1>
                            </div>
                            <div class="card-content votes">
                                <div class="details">
                                    <h3>
                                        Name: <?php echo $most_voted_candidate_name; ?>
                                    </h3>
                                    <h3>
                                        Votes: <?php echo $most_voted_candidate_votes; ?>
                                    </h3>
                                </div>
                                <i class="fa-solid fa-trophy"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid tab-pane fade" id="v-pills-voter" role="tabpanel" aria-labelledby="v-pills-voter-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Voter Details</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("voter-info.php");
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary reset-btn" onclick="resetTable()">Reset</button>
                </div>
            </div>
            <div class="container-fluid tab-pane fade" id="v-pills-candidate" role="tabpanel" aria-labelledby="v-pills-candidate-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Candidate Details</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("candidate-info.php");
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary reset-btn" onclick="resetTable()">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function resetTable() {
            if (confirm("Are you sure you want to proceed? This will reset all voters and candidates statuses and votes to zero.") == true) {
                window.location.href = "reset-script.php";
            }
        }
    </script>
</body>

</html>