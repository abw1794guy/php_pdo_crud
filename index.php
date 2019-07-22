<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
$result = $conn->query("SELECT * FROM user ORDER BY id ASC");
?>
 
<html>
<head>    
    <title>PDO CRUD基礎</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
 
<body>
 <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="location.href='add.html'">
Add new data
  </a><br><br>


    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>id</td>
        <td>name</td>
        <td>sex</td>
        <td>address</td>
    </tr>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['sex']."</td>";  
        echo "<td>".$row['address']."</td>";  
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('確定要刪除檔案嗎?')\">Delete</a></td>";        
    }
    ?>
    </table>
<?php 

//curl初始化
$ch = curl_init();
//設置欲獲取之URL地址
curl_setopt($ch,CURLOPT_URL,"http://118.232.56.156/php_stuff/restful/api.php/company");
//取消輸出http header
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//取出字串
$str = curl_exec($ch);
//轉成字串
$dataarray=json_decode($str, true);
// print_r($dataarray);

// if(is_array($dataarray)){
//     echo '$dataarray is array.';
// }else
// {
//     echo '$dataarray is not array.';
// }
 ?>

</body>
</html>