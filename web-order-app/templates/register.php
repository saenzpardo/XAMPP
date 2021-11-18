<?php $this->layout('master', ['title' => 'Movie List']) ?>

<!-- register -->

<div class="col-4">
     <form class="mt-5" action="/login" method="POST">
         <div class="form-group mb-3">
             <label for="userName" class="form-label">User Name:</label>
             <input type="text" class="form-control" name="userName" id="userName" placeholder="User name">
         </div>
         <div class="mb-3">
             <label for="password" class="form-label">Password:</label>
             <input type="password" class="form-control" name="password" id="password" placeholder="Password">
         </div>
         <div class="mb-3">
             <label for="password" class="form-label">Re-enter Password:</label>
             <input type="password" class="form-control" name="password" id="password" placeholder="Password">
         </div>
         <input type="submit" class="btn btn-outline-primary" value="Submit">
     </form>
 </div>