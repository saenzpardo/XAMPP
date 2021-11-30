<?php $this->layout('master', ['title' => 'Product List']) ?>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
    <?php
     foreach($products as $p) {
        $this->insert('productcard', ['product' => $p]);
     };
    ?>
</div>