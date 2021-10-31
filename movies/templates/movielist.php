<?php $this->layout('master', ['title' => 'Movie List']) ?>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
    <?php
     foreach($movies as $m) {
        $this->insert('moviecard', ['movie' => $m]);
     };
    ?>
</div>