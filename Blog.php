<?php

class Blog{

    function saveToDb($t,$d,$newfile,$b){

    $conn = mysqli_connect("localhost","root","","project");

    $sql = "INSERT INTO datalist(title,description,bannerimage,body)VALUES('$t','$d','$newfile','$b')";
    
    if($conn->query($sql)){
        return "succesfully inserted";
    }
    return "Insertion failed";
}
static function getAllBlogs(){
    $conn = mysqli_connect("localhost","root","","project");
    $sql = "SELECT * FROM datalist";
    $results = $conn->query($sql);
    $arr = [];
    if ($results->num_rows >0){
        while($row = mysqli_fetch_assoc($results)){
            array_push($arr,$row);
        }
    }
    return $arr;
}



static function getSingleBlog($id){

    $conn = mysqli_connect("localhost","root","","project");
    $sql = "SELECT * FROM datalist WHERE id=$id";
    $results = $conn->query($sql);
    if ($results->num_rows >0){
        $blog = mysqli_fetch_assoc($results);
        return $blog;
        }
        else{
            return null;
        }    
}
}
?>