<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Building List</title>
</head>
<body>
    Current Buildings:
   <br />
    <?php
    $servername = "68.178.253.8";
    $username = "aaro2321253830";
    $password = "kKZyC6sEip,";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
    
</body>
</html>
