<?php 
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {

        //Database file
        include ("../modules/db.php");
        //Simple validate function
        include ("../core/functions.php");
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //form validation
        $text = "email";
        $location = "../index.php?page=login";
        $ms = "error";
        is_empty($email, $text, $location, $ms, "");
        
        $text = "password";
        $location = "../index.php?page=login";
        $ms = "error";
        is_empty($password, $text, $location, $ms, "");

        //search for email in db
        $sql = "SELECT * FROM `employee` WHERE `email`='$email' AND `password`='$password' ";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
                print_r($row);
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                header("Location: ../index.php");
                exit();
            }else{
                $em = "Neispravan email ili password";
                header("Location: $location&$ms=$em&$data");
                exit();
            }
        }else{
            $em = "Neispravan email ili password";
            header("Location: $location&$ms=$em&$data");
            exit();
        }
    }
    else {
        # Redirect to login page
        header("Location: ../index.php?page=login");
        exit;
    }

mysqli_close($connect);