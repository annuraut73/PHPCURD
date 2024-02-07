<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Display</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        table{
            background-color:rgb(99, 99, 167);
            color:white;
            margin-top:100px;
            font-size:25px;
            font-family: 'Times New Roman', Times, serif;
        }

        table th{
            background-color:rgb(10, 10, 87);
        }
        .search .input{
            padding-left:80px;
            padding-right:80px;
            border-radius:5px;
        }
        .btns{
            background-color:green;
            color:white;
        }

    </style>

</head>
<body>
<center><br><br>
<form method="post">
    <div class="search">
        <input type="text" name="txtsearch" placeholder="Enter the order no and name .." class="input">
        <input type="submit" name="btnsearch" value="submit" class="btns">
    </div><br>
    </form>
    <button class="btn btn-primary"><a href="insert.php" style="color:white;" >Add_New_Item</a></button>
    <form method="post">
<?php
 include 'conn.php';
if(isset($_POST['btnsearch']) && empty($_POST[""])){
    $search = $_POST['txtsearch'];
    ?>
    <table border="3">
    <tr>
                <th>Item_id</th>
                <th>Item_Name</th>
                <th>Item_Type</th>
                <th>Quantity</th>
                <th colspan="2">Operation</th>
                
            </tr>

<?php
           $q = "select* from item where no='$search' or name='$search' order by name";
            $res = mysqli_query($con, $q);
            $count = mysqli_num_rows($res);
            echo "Total Records :" . $count;
            ?>

            <a href="display.php">Show All</a>
            <?php
            while($sel = mysqli_fetch_array($res)){
              ?>
              <tr>
            <td>
                <?php echo $sel['no']; ?>
             </td>
            <td>
                  <?php echo $sel['name']; ?>
            </td>
            <td>
                <?php echo $sel['type']; ?>
            </td>
            <td>
               <?php echo $sel['quan']; ?>
            </td>
            <td><button class="btn btn-primary"><a href="update.php?no=<?php echo $sel['no'];?>" style="color:white;">Update</a></button></td>
        <td><button class="btn btn-danger"><a href="delete.php?no=<?php echo $sel['no']; ?>" style="color:white;">Delete</a></button></td>
        
</tr>

    <?php
}
?>
</table>
<?php

}else{
?>
        <table border="3">
            <tr>
                <td colspan="4" style="padding-left:150px;">Items Details</td>
            </tr>
            <tr>
                <th>Item_id</th>
                <th>Item_Name</th>
                <th>Item_Type</th>
                <th>Quantity</th>
                <th colspan="2">Operation</th>
            </tr>

            <?php
          include 'conn.php';

             $ss = "select * from item";
              $mydata = mysqli_query($con, $ss);

             while($res = mysqli_fetch_array($mydata)){
                ?>
                <tr>
                <td><?php echo $res['no']; ?></td>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['type']; ?></td>
                <td><?php echo $res['quan']; ?></td>
                <td><button class="btn btn-danger"><a href="delete.php?no=<?php echo $res['no']; ?>" style="color:white;">Delete</a></a></button></td>
                <td><button class="btn btn-primary"><a href="update.php?no=<?php echo $res['no']; ?>" style="color:white;">Update</a></a></button></td>
            </tr>
                <?php
                }
             ?>
        </table>
     <?php
            }
            ?>
    </form>

    
</center>



    
</body>
</html>