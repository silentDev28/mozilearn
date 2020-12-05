<?php
error_reporting(0);
include 'conn.php';
$course_code= $_GET['course_code'];
$data = '{"comments": [{"name": "Jonh", "text": "nice phone", "star": 4}, {"name": "igon", "text": "not good", "star": 2}, {"name": "marco", "text": "i not like this", "star": 3}, {"name": "david", "text": "good product", "star": 5}]}'; // your json data

//$reviews_nn = $rowprod["reviews"]; // i don't get from where you are getting this

$getReviews=$conn->query("SELECT * FROM reviews WHERE course_code='$course_code' ");
$getTotalComent=$conn->query("SELECT SUM(rating) as total FROM reviews WHERE course_code='$course_code'");
$totComents=$getReviews->num_rows;
$totalRating="";

while($row=$getTotalComent->fetch_assoc()){
    $totalRating= $row['total'];
}
//$ratingVal=var_dump(is_float($totalRating/$totComents));
//if(is_nan($ratingVal)){
//    echo "0";
//}else{
//    if($ratingVal==TRUE){
//        echo $totalRating/$totComents;
//    }else{
//
//        echo $totalRating/$totComents."."."0";
//    }
//}

$sendTotalRating=0;
if($totComents!=0){
    $sendTotalRating=$totalRating/$totComents;
}else{
    $sendTotalRating=0;
}

echo $sendTotalRating;



//$reviews = json_decode($data,true); // decode the json data
//$max = 0;
//$n = count($reviews['comments']); // get the count of comments
//echo "<pre/>";print_r($reviews); // print json decoded data
//foreach ($reviews['comments'] as $rate => $count) { // iterate through array
//    $max = $max+$count['star'];
//}
//echo 'Average rating: ', $max / $n, "\n";
?>