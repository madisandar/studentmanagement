<?php
require "dbconnect.php";
session_start();
?>
     
     <?php include('includes/header.php'); ?>

       <div class="container">
         
         <?php include('message.php'); ?>
         <div class="row mt-5">

             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="student_create.php" class="btn btn-primary float-end">Add Student</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-border table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $stmt = $conn->prepare("SELECT * FROM students");
                                 $stmt->execute();
                                 
                                 if($stmt->rowCount() > 0){
                                    while($row = $stmt->fetch()){
                                        // echo $row['name'];
                                        echo "<tr>
                                           <td>{$row['id']}</td>
                                           <td>{$row['name']}</td>
                                           <td>{$row['email']}</td>
                                           <td>{$row['phone']}</td>
                                           <td>{$row['course']}</td>
                                           <td>
                                              <a href='student_view.php?id={$row['id']}' class='btn btn-info btn-sm'>Info</a>
                                              <a href='student_edit.php?id={$row['id']}' class='btn btn-success btn-sm'>Edit</a>
                                              <form action='code.php' method='POST' class='d-inline'>
                                                <button type='submit' name='delete' value='{$row['id']}' class='btn btn-danger btn-sm'>Delete</button>
                                              </form>
                                           </td>
                                        </tr>";
                                    }
                                 }else{
                                    echo "<h5>No Record Found</h5>";
                                 }

                                 $conn = "null";
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
          </div>
       </div>

       <?php include('includes/footer.php'); ?>
    