
  <?=print_r($products)?>
<div class="col">
        <div class="card">
            <div class="card-body ">                
                <h5 class="card-title"><?= $this->e($products['Name']); ?></h5>
                <p class="card-text"><?= $this->e($products['Description']); ?></p>
                <a href="#" class="btn btn-primary">Buy $<?= $this->e($products['Price']); ?></a>
            </div>
        </div>
    </div>