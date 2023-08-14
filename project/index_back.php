<?php 
include("connection.php");
include("web_app/index_front.php");
?>
<link rel="stylesheet" href="web_app/formstyle.css">
<?php
    $name = $email = $roll = $timestamp = $getroll = "";

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $getroll = test_input($_GET["getroll"]);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $roll = test_input($_POST["roll"]);
        date_default_timezone_set("Asia/Calcutta");
        $timestamp = date('d-m-Y h:i:s', time());
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($name != "" && $email != "" && $roll != "" && $timestamp !="")
    {
        $query = "INSERT INTO FORM VALUES('$name','$email','$roll','$timestamp')";
        $data = mysqli_query($conn,$query);
        if($data){}
        else{echo "failed to insert data";}
    }
    
    $nodataerr = "";
    $enquiry = "SELECT * FROM FORM WHERE ROLL = '$getroll'";
    $data_fetched = mysqli_query($conn, $enquiry);
    $check = mysqli_num_rows($data_fetched);
    if($check == 0){$nodataerr = "No such record exists!";}
    $result = mysqli_fetch_assoc($data_fetched);
    if($result)
    {
        echo "<div class='table-wrapper'>
                <table class='fdata'>
                    <thead>
                        <tr>
                            <th>Roll Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>".$result["ROLL"]."</td><td>".$result["NAME"]."</td><td>".$result["EMAIL"]."</td><td>".$result["TIMESTAMP"]."</td></tr>
                    </tbody>
                </table>
        </div>";
    }
?>