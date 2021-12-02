
  <style>
    .center {
        margin: auto;
        border: none;
    }
    .shading {
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        background-image: linear-gradient(180deg, white, lemonchiffon);
    }
    </style>
<div class="col text-center center mb-5 mt-5">
        <div class="card shading">
            <div class="card-body ">                
                <h5 class="card-title"><?= $this->e($products[0]['Name']); ?></h5>
                <p class="card-text"><?= $this->e($products[0]['Description']); ?></p>
                <a href="#" class="btn btn-primary">Buy $<?= $this->e($products[0]['Price']); ?></a>
            </div>
        </div>
    </div>