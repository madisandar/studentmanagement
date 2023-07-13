<?php
session_start();
require_once "dbconnect.php";



if(isset($_POST['submit'])){
    $name = textfilter($_POST['name']);
    $email = textfilter($_POST['email']);
    $phone = textfilter($_POST['phone']);
    $course = textfilter($_POST['course']);

    $stmt = $conn->prepare("INSERT INTO students(name,email,phone,course) VALUES(:name,:email,:phone,:course)");
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":phone",$phone);
    $stmt->bindParam(":course",$course);

   

    // echo "New Records Created Successfully";
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $_SESSION['message'] = "Student Created Successfully";
        header("Location:userlist.php");
        exit;
    }else{
      $_SESSION['message'] = "Student Not Created";
      header("Location:userlist.php");
      exit;
    }
}

if(isset($_POST['update'])){
    $student_id = textfilter($_POST['id']);
    $name = textfilter($_POST['name']);
    $email = textfilter($_POST['email']);
    $phone = textfilter($_POST['phone']);
    $course = textfilter($_POST['course']);

    $stmt = $conn->prepare("UPDATE students SET name='$name',email = '$email',phone='$phone',course='$course' WHERE id='$student_id'");
    
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location:userlist.php");
        exit;
    }else{
        $_SESSION['message'] = "Student Not Updated";
        header("Location:userlist.php");
    
        exit;
    }
    
}

if(isset($_POST['delete'])){
    $student_id = textfilter($_POST['delete']);
    $stmt=$conn->prepare("DELETE FROM students WHERE id='$student_id'");
   
    $stmt->execute();

    if($student_id){
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location:userlist.php");
        exit;
    }else{
        $_SESSION['message'] = "Student Not Deleted";
        header("Location:userlist.php");
        exit;
    }

}

function textfilter($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>