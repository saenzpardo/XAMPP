
    <div class="col">
        <div class="card">
            <div class="card-body ">
                <h5 class="card-title"><?= $this->e($movie['name']); ?></h5>
                <p class="card-text"><?= $this->e($movie['description']); ?></p>
                <a href="#" class="btn btn-primary">Buy $<?= $this->e($movie['price']); ?></a>
            </div>
        </div>
    </div>