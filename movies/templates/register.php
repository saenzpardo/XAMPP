<?php $this->layout('master', ['title' => 'Register']) ?>

<div class="col-4">
     <form class="mt-5" action="register" method="POST">
         <div class="form-group mb-3">
             <label for="displayName" class="form-label">Display Name:</label>
             <input type="text" class="form-control" name="displayName" id="displayName" placeholder="Enter display name">
         </div>
         <div class="form-group mb-3">
             <label for="email" class="form-label">Email:</label>
             <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
         </div>
         <div class="form-group mb-3">
             <label for="password" class="form-label">Password:</label>
             <input type="password" class="form-control" name="password" id="password" placeholder="Password">
         </div>
         <div class="form-group mb-3">
             <label for="confirmPassword" class="form-label">Confirm Password:</label>
             <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
         </div>
         <input type="submit" class="btn btn-outline-primary" value="Register">
     </form>
 </div>
