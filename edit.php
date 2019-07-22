<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $address=$_POST['address'];    
    
    // checking empty fields
    if(empty($name) || empty($sex)||empty($address)) {    
            
        // if(empty($id)) {
        //     echo "<font color='red'>id field is empty.</font><br/>";
        // }
        
        if(empty($name)) {
            echo "<font color='red'>name field is empty.</font><br/>";
        }
        
        if(empty($sex)) {
            echo "<font color='red'>sex field is empty.</font><br/>";
        }       
        if(empty($address)) {
            echo "<font color='red'>address field is empty.</font><br/>";
        }         
    } else {    
        //updating the table
        $sql = "UPDATE user SET id=:id, name=:name, sex=:sex, address=:address WHERE id=:id";
        $query = $conn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':sex', $sex);
        $query->bindparam(':address', $address);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM user WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['name'];
    $sex = $row['sex'];
    $address = $row['address'];
}
?>
<html>
<head>    
    <title>PDO_EDIT</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>sex</td>
                <td><input type="text" name="sex" value="<?php echo $sex;?>"></td>
            </tr>
            <tr> 
                <td>address</td>
                <td><input type="text" name="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>