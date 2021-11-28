<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="../js/bootstrap.bundle.js">
    </script>

    <title><?= $this->e($title) ?></title>
</head>

<body>
    <?php
    # 48.55

    foreach ($alerts as $a) {
        $this->insert('alert', ['alerts' => $a]);
    }
    print_r($_COOKIE);
    //ClearAlerts();
    ?>
    <!-- NAV BAR!!! -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Movie Database</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <form class="d-flex ">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>

                <a href="/movies/login" class="btn bg-transparent mr-3">Login</a>
                <a href="/movies/register" class="btn btn-outline-success">Register</a>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR!!! -->

    <div class="container">
        <?= $this->section('content'); ?>
    </div>


</body>

</html>