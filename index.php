<?php
include 'con.php';
if ($con === false) {
    die("ERROR: Could not connect." . mysqli_connect_error());
}

if (isset($_POST['Done'])) {
    $username = $_POST['username'];
    $mobile_num = $_POST['mobile'];
    $work_des = $_POST['work'];
    $money = $_POST['money'];
    $paymoney = $_POST['paymoney'];
    $sql = "INSERT INTO `office` (`id`, `username`, `mobile`, `work`, `money`, `Pay_money`, `date`) VALUES (NULL, '$username', '$mobile_num', ' $work_des', '$money', ' $paymoney', CURRENT_DATE());";
    if (mysqli_query($con, $sql)) {
        header("Location:index.php");
    }
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

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <form method="post" class=" col-md-6 form-inline">

                <br><br>
                <div class="col-sm-12 card-header bg-dark">
                    <h1 class="text-white text-center"> Store Information </h1>
                </div><br>
                <div class="col-md-12 card-header">

                    <input type="text" name="username" class="form-control" placeholder="Name">
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
                    <input type="text" name="work" class="form-control" placeholder="Work Description">
                    <input type="text" name="money" class="form-control" placeholder="Money">
                    <input type="text" name="paymoney" class="form-control" placeholder="Pay Money">
                    <button class="btn btn-success" type="submit" name="Done"> Submit </button><br>
                </div>
            </form>

            <div class="col-sm-6 bg-dark text-white">
                <br>
                <?php
                $q = "SELECT SUM(Pay_money) FROM `office` WHERE date=CURRENT_DATE";
                $query = mysqli_query($con, $q);
                $res = mysqli_fetch_array($query)
                ?>
                <h3>Daily Income : <?php echo $res['SUM(Pay_money)']; ?>Tk</h3> <br>
                <?php
                $q = "SELECT SUM(Pay_money) FROM `office` WHERE date  BETWEEN CURRENT_DATE-7 AND CURRENT_DATE";
                $query = mysqli_query($con, $q);
                $res = mysqli_fetch_array($query)
                ?>
                <h3>Weekly Income : <?php echo $res['SUM(Pay_money)']; ?>Tk</h3><br>
                <?php
                $q = "SELECT SUM(Pay_money) FROM `office` WHERE date  BETWEEN CURRENT_DATE-30 AND CURRENT_DATE";
                $query = mysqli_query($con, $q);
                $res = mysqli_fetch_array($query)
                ?>
                <h3>Monthly Income : <?php echo $res['SUM(Pay_money)']; ?>Tk</h3><br>

            </div>
        </div>

        <br><br>
        <div class="col-sm-12 card-header bg-dark">
            <h1 class="text-white text-center"> Display Information </h1>
        </div><br>

        <div class="col-sm-12">
            <table id="tabledata" class=" table table-striped table-hover table-bordered">

                <tr class="bg-dark text-white text-center">
                    <th> Name </th>
                    <th> Mobile Number </th>
                    <th>Work Description</th>
                    <th>Money</th>
                    <th>Pay Money</th>
                    <th>Date</th>
                    <th> Update </th>
                </tr>
                <?php
                include 'con.php';
                $q = "SELECT * FROM `office` ORDER BY `id` DESC";

                $query = mysqli_query($con, $q);

                while ($res = mysqli_fetch_array($query)) {
                    ?>
                    <tr class="text-center">
                        <td> <?php echo $res['username'];  ?> </td>
                        <td> <?php echo $res['mobile'];  ?> </td>
                        <td> <?php echo $res['work'];  ?> </td>
                        <td> <?php echo $res['money'];  ?> </td>
                        <td> <?php echo $res['Pay_money'];  ?> </td>
                        <td> <?php echo $res['date'];  ?> </td>
                        <td> <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a> </button> </td>

                    </tr>

                <?php
                }
                ?>

            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabledata').DataTable();
        })
    </script>

</body>

</html>