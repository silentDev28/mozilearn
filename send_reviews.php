<?php
include 'conn.php';
$rating="";
//if(isset($_POST['rating'])){
//    $rating= $_POST['rating'];
////    $name=$_POST['name'];
////    $email=$_POST['email'];
////    $review=$_POST['review'];
////    $rating=$_POST['rating'];
////    if(empty($name)or empty($email) or empty($review)){
////        echo "Please fill out all required fields";
////    }else{
////        $insertReview=$conn->query("INSERT INTO reviews (name,email,review,rating)VALUES('$name','$email','$review','$rating')");
////        if($insertReview==TRUE){
////            echo "Your review is successful";
////        }else{
////            echo $conn->error;
////        }
////    }
//
//}

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $review=$_POST['review'];
    $rating=$_POST['rating'];
    $courseCode=$_POST['courseCode'];
    $fetchUserRate=$conn->query("SELECT * FROM reviews WHERE email='$email' and course_code='$courseCode'");
    if( $fetchUserRate->num_rows==1){
        $updateRating=$conn->query("UPDATE reviews SET rating='$rating',review='$review' WHERE email='$email' AND course_code='$courseCode'");
        if($updateRating==TRUE){
            echo "Your review is updated";
        }else{
            echo $conn->error;
        }
    }else{
        $insertReview=$conn->query("INSERT INTO reviews (name,email,review,rating,course_code)VALUES('$name','$email','$review','$rating','$courseCode')");
        if($insertReview==TRUE){
            echo "Your review is successful";
        }else{
            echo $conn->error;
        }
    }


}
?>