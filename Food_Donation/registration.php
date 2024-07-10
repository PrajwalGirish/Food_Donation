<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $Name = $_POST["name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           $phone_number = $_POST['phno'];
           $orphanage_name = $_POST['orname'];
           $address = $_POST['address'];
           $orphanage_contact_number = $_POST['conno'];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($Name) OR empty($email) OR empty($password) OR empty($passwordRepeat) OR empty($phone_number) OR empty($orphanage_name) OR empty($address) OR empty($orphanage_contact_number)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $users_sql = "INSERT INTO users (username, email, password, phone_number) VALUES ( ?, ?, ?, $phone_number)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$users_sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$Name, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                $orphanage_sql = "INSERT INTO orphanage (name, address, contact_number) VALUES ( ?, ?, ?)";
                $stmt1 = mysqli_stmt_init($conn);
                $prepareStmt1 = mysqli_stmt_prepare($stmt1,$orphanage_sql);
                if($prepareStmt1){
                    mysqli_stmt_bind_param($stmt1,"sss",$orphanage_name, $address, $orphanage_contact_number);
                    mysqli_stmt_execute($stmt1);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                }
                else{
                    die("Something went wrong");
                }
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
        <div><h2>SignUp Page</h2></div><br>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phno" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="orname" placeholder="Orphanage Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="conno" placeholder="Orphanage Contact No.">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>