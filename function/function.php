<?php 

function getData($str){
    global $conn;
    $query = mysqli_query($conn,$str);
    $data = [];
    while($row = mysqli_fetch_assoc($query))
    {
        $data[] = $row;
    }
    print_r($data);


}


function queryStr($str){

    global $conn;
    $query = mysqli_query($conn,$str);
    if($query){
        return true;
    }
    else{
        return false;
    }
}