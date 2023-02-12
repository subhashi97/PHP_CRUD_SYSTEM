<?php
include 'connect.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM crud WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password =$_POST['password'];

    $sql = "UPDATE crud SET id=$id,name='$name',email='$email',mobile='$mobile',password ='$password' WHERE id=$id ";
    $result=mysqli_query($conn,$sql);

    if($result){
        //echo "Updated Successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >-->
</head>
<body>
    
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" Placeholder="Enter Your Name" name="name" autocomplete = "off" value = <?php echo $name; ?> ><br><br>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" Placeholder="Enter Your Email" name="email" autocomplete = "off" value = <?php echo $email; ?> ><br><br>
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" Placeholder="Enter Your Mobile" name="mobile" autocomplete = "off" value = <?php echo $mobile ; ?> ><br><br>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" Placeholder="Enter Your Password" name="password" autocomplete = "off" value = <?php echo $password; ?> ><br><br>
            </div>               
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>