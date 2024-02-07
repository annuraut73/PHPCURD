<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
<form action="" method="post">
        <table border="3">
            <tr>
                <td colspan="2" style=" text-align:center;"><h1>Update Item </h1></td>
            </tr>
          
                <td>Item_Name</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Item_Type</td>
                <td><input type="text" name="type" required></td>
            </tr>

            <tr>
                <td>Quantity</td>
                <td><input type="number" name="quan" required></td>
            </tr>

            <tr>
                <td colspan="2" style="padding-left:100px;"><input type="submit" name="submit"></td>
                
            </tr>
        
        </table>

    </form>

    <?php

include 'conn.php';
if(isset($_POST['submit'])){
    $no = $_GET['no'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quan = $_POST['quan'];


$q="update item set no='$no', name='$name', type='$type', quan='$quan' where no=$no ";

$query = mysqli_query($con, $q);

header('location:display.php');

}

    ?>

</center>
</body>
</html>