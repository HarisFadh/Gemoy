<?php
    require '../config.php';
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' ");
        if(mysqli_num_rows($duplicate) > 0){
            echo
            "<script> alert('Username or Email Has Already Taken'); </script>";
            
        }
        else{
            if($password == $confirmpassword){
                $query = "INSERT INTO tb_user VALUES ('','$name','$username','$email','$password')";
                mysqli_query($conn,$query);
                echo
                "<script> alert('Registration Succsessful'); </script>";
            }
            else{
            echo
            "<script> alert('Password does Not Match'); </script>";
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>register</title>
</head>

<body>
    <section class="vh-100% bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100% gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                <form method="post" autocomplete="off">

                                    <div class="form-outline mb-4">
                                        <input type="text" id="name" name="name" class="form-control form-control-lg" required />
                                        <label class="form-label" for="name">Your Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                                        <label class="form-label" for="username">Username</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control form-control-lg" required />
                                        <label class="form-label" for="confirmpassword">Repeat your password</label>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="check" required />
                                        <label class="form-check-label" for="check">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="../login/login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>