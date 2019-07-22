<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    

$name=$_POST['name'];
$sex=$_POST['sex'];
$address=$_POST['address'];
        
    // checking empty fields
    if( empty($name) || empty($sex) || empty($address)) {
                
        if(empty($name)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($sex)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($address)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO user( name, sex, address) VALUES( :name , :sex , :address)";
        $query = $conn->prepare($sql);
                
  
        $query->bindparam(':name', $name);
        $query->bindparam(':sex', $sex);
        $query->bindparam(':address', $address);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
        
        //display success message
        // echo "<script>alert('上傳成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 
        echo "<script>alert('上傳成功!');location.href='index.php';</script>"; 
    }
}
?>
</body>
</html>