<?php
session_start();
require "dbconnect.php";
?>
      <?php include('includes/header.php'); ?>

       <div class="container mt-5">
        
         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Detail
                            <a href="userlist.php" class="btn btn-danger float-end" >Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php

                           if(isset($_GET['id'])){
                              $student_id = $_GET['id'];
                              $stmt = $conn->prepare("SELECT * FROM students WHERE id='$student_id'");
                              $stmt->execute();

                              if($stmt->rowCount() > 0){
                                  $student = $stmt->fetch();
                                //   print_r($student);
                         ?>
                                <div class="form-group mb-3">
                                   <label>Student Name</label>
                                   <p class="form-control">
                                     <?= $student['name']; ?>
                                   </p>
                                </div>
     
                                <div class="form-group mb-3">
                                   <label>Student Email</label>
                                   <p class="form-control">
                                     <?= $student['email']; ?>
                                   </p>
                                </div>
     
                                <div class="form-group mb-3">
                                   <label>Student Phone</label>
                                   <p class="form-control">
                                     <?= $student['phone']; ?>
                                   </p>
                                </div>
     
                                <div class="form-group mb-3">
                                   <label>Student Course</label>
                                   <p class="form-control">
                                     <?= $student['course']; ?>
                                   </p>
                                </div>
     
                            
                              <?php
                              }else{
                                 echo "<h4>No Search Found</h4>";
                              }
                           }
                             ?>
                      
                    </div>
                </div>
             </div>
         </div>
       </div> 

       <?php include('includes/footer.php'); ?>