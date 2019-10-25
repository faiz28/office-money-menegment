<?php
include 'con.php';

if (isset($_POST['Done'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $mobile_num = $_POST['mobile'];
    $work_des = $_POST['work'];
    $money = $_POST['money'];
    $paymoney = $_POST['paymoney'];
    $q = "UPDATE `office` SET `id`=$id,`username`='$username',`mobile`=' $mobile_num',`work`='$work_des',`money`=$money ,`Pay_money`=$paymoney where id=$id ";

    $query = mysqli_query($con, $q);
    if($query) echo "done";
    else echo "error";

    header('location:index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="col-lg-6 m-auto">

        <form method="post">

            <br><br>
            <div class="card">

                <div class="card-header bg-dark">
                    <h1 class="text-white text-center"> Insert Operation </h1>
                </div><br>

                <label> Name: </label>

                <?php 
                    $id=$_GET['id'];
                    $q="SELECT username FROM `office` WHERE id='$id'";
                     $query=mysqli_query($con, $q);
                     $res = mysqli_fetch_array($query)
                ?>
                <input type="text" name="username" class="form-control" value="<?php echo $res['username'];?>"> <br>
        


                <?php 
                    $id=$_GET['id'];
                    $q="SELECT mobile FROM `office` WHERE id='$id'";
                     $query=mysqli_query($con, $q);
                     $res = mysqli_fetch_array($query)
                ?>
                <label> Mobile Number: </label>
                <input type="text" name="mobile" class="form-control" value="<?php echo $res['mobile'];?>"> <br>



                <label> Work Description: </label>
                <?php 
                    $id=$_GET['id'];
                    $q="SELECT work FROM `office` WHERE id='$id'";
                     $query=mysqli_query($con, $q);
                     $res = mysqli_fetch_array($query)
                ?>
                <input type="text" name="work" class="form-control" value="<?php echo $res['work'];?>"> <br>


                <?php 
                    $id=$_GET['id'];
                    $q="SELECT money FROM `office` WHERE id='$id'";
                     $query=mysqli_query($con, $q);
                     $res = mysqli_fetch_array($query)
                ?>
                <label> Money: </label>
                <input type="text" name="money" class="form-control" value="<?php echo $res['money'];?>"> <br>
               
               
                <?php 
                    $id=$_GET['id'];
                    $q="SELECT Pay_money FROM `office` WHERE id='$id'";
                     $query=mysqli_query($con, $q);
                     $res = mysqli_fetch_array($query)
                ?>
                <label>Pay Money: </label>
                <input type="text" name="paymoney" class="form-control" value="<?php echo $res['Pay_money'];?>"> <br>

                <button class="btn btn-success" type="submit" name="Done" >Submit </button><br>
            </div>
        </form>
    </div>
</body>

</html>