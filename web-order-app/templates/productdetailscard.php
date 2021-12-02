<style>
    .center {
        margin: auto;
    }

    .shading {
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        background-image: linear-gradient(180deg, white, powderblue);
    }
</style>
<div class="col shading text-center center mb-5 mt-5 card">
    <div class="card-body ">
        <h5 class="card-title">Product Details For: <em>
                <h4><?= $this->e($products[0]['Name']); ?>
            </em></h4>
        </h5>
        <p class="card-text"><?= $this->e($products[0]['Description']); ?></p>
        <p class="card-text">Rating: <?= $this->e($products[0]['Rating']); ?></p>
        <a href="#" class="btn btn-primary">Buy $<?= $this->e($products[0]['Price']); ?></a>
    </div>
</div>