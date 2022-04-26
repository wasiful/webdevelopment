<?php 
     print_r($_POST);
    $data = $_POST["productReview"];
    $data_decoded = json_decode($data);
    // print_r($data_decoded["id"])
    $data_list = array();
    foreach($data_decoded as $key => $value) {
        array_push($data_list, $value);
    };
    $sql="INSERT INTO mytable (name, review, rating)   
    VALUES('$data_list[0]', '$data_list[1]', $data_list[2])";
    print_r($sql);
    
    # create a connect 
    # $db = connection(locahost)
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "mydatabase";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " 
            . $conn->connect_error);
        }
    if ($conn->query($sql) === TRUE) {
        echo "record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>