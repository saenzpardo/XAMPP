<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title><?= $this->e($title) ?></title>
</head>

<body>
    <?php 
    # 48.55
    
    foreach($alerts as $a) {
        $this->insert('alerts', ['alerts' => $a]);
    }
    // print_r($alerts);

    # clear alert will clear all cookies and won't render cookies again...method needs relocated.

    // ClearAlerts(); # display alert once
    ?>
    <!-- NAV BAR!!! -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/movies/movies">Movie Database</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <form class="d-flex ">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                
                <a href="/movies/login" class="btn bg-transparent mr-3" type="submit">Login</a>
                <a href="/movies/register" class="btn btn-outline-success" type="submit">Register</a>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR!!! -->

<div class="container">
<?= $this->section('content'); ?>
</div>

   
</body>

</html>