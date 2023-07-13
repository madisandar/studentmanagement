<?php
session_start();
?>
      <?php include('includes/header.php'); ?>

       <div class="container mt-5">
        
       <?php include 'message.php'; ?>

         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Add
                            <a href="userlist.php" class="btn btn-danger float-end" >Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" >

                           <div class="form-group mb-3">
                              <label>Student Name</label>
                              <input type="text" name="name" id="name" class="form-control" />
                           </div>

                           <div class="form-group mb-3">
                              <label>Student Email</label>
                              <input type="email" name="email" id="name" class="form-control" />
                           </div>

                           <div class="form-group mb-3">
                              <label>Student Phone</label>
                              <input type="text" name="phone" id="phone" class="form-control" />
                           </div>

                           <div class="form-group mb-3">
                              <label>Student Course</label>
                              <input type="text" name="course" id="course" class="form-control" />
                           </div>

                           <div class="mb-3">
                              <button type="submit" name="submit" class="btn btn-primary">Save Student</button>
                           </div>

                        </form>
                    </div>
                </div>
             </div>
         </div>
       </div> 

       <?php include('includes/footer.php'); ?>