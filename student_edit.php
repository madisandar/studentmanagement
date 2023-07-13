<?php
session_start();
require "dbconnect.php";
?>

      <?php include('includes/header.php'); ?>

       <div class="container mt-5">
        
       <?php include 'message.php'; ?>

         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
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
                            <form action="code.php" method="POST" >
                                <input type="hidden" name="id" value="<?= $student['id']; ?>"/>
                                <div class="form-group mb-3">
                                   <label>Student Name</label>
                                   <input type="text" name="name" id="name" value="<?=$student['name'];?>" class="form-control" />
                                </div>
     
                                <div class="form-group mb-3">
                                   <label>Student Email</label>
                                   <input type="email" name="email" id="email" value="<?= $student['email']; ?>" class="form-control" />
                                </div>
     
                                <div class="form-group mb-3">
                                   <label>Student Phone</label>
                                   <input type="text" name="phone" id="phone"  value="<?= $student['phone']; ?>" class="form-control" />
                                </div>
     
                                <div class="form-group mb-3">
                                   <label>Student Course</label>
                                   <input type="text" name="course" id="course" value="<?= $student['course']; ?>" class="form-control" />
                                </div>
     
                                <div class="mb-3">
                                   <button type="submit" name="update" class="btn btn-primary">Update Student</button>
                                </div>
     
                            </form>
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