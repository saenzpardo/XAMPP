 <?php $this->layout('master', ['title' => 'New Movie']) ?>

 <div class="col-4">
     <form class="mt-5" action="/movies/movies" method="POST">
         <div class="form-group mb-3">
             <label for="movieName" class="form-label">Name:</label>
             <input type="test" class="form-control" name="Name" id="movieName" placeholder="Enter a movie name.">
         </div>
         <div class="mb-3">
             <label for="movieDescription" class="form-label">Description:</label>
             <textarea class="form-control" name="Description" id="movieDescription" placeholder="Enter Description" rows="4"></textarea>
         </div>
         <input type="submit" class="btn btn-outline-primary" value="Submit">
     </form>
 </div>

 <!-- Content -->