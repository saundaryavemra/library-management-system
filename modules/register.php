<?php 
if (isset($_POST['first_name']) && isset( $_POST['last_name']) && isset( $_POST['email']) && isset( $_POST['password']) && isset( $_POST['confirm_password'])) {
    
    //Database file
    include ("../modules/db.php");
    //Simple validate function
    include ("../core/functions.php");
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confrim_password = $_POST['confirm_password'];

    // Provera unosa forme
    $text = "ime";
    $location = "../index.php?page=register";
    $ms = "error";
    is_empty($first_name, $text, $location, $ms, "");
    
    $text = "prezime";
    $location = "../index.php?page=register";
    $ms = "error";
    is_empty($last_name, $text, $location, $ms, "");

    $text = "email";
    $location = "../index.php?page=register";
    $ms = "error";
    is_empty($email, $text, $location, $ms, "");

    $text = "sifru";
    $location = "../index.php?page=register";
    $ms = "error";
    is_empty($password, $text, $location, $ms, "");

    $text = "/potvrdite sifru";
    $location = "../index.php?page=register";
    $ms = "error";
    is_empty($confrim_password, $text, $location, $ms, "");


    if ($password === $confrim_password) {
        //Unosenje podataka 
        $sql = "INSERT INTO `member` (first_name, last_name, email, `password`) VALUES ('$first_name', '$last_name', '$email' ,'$password' )";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $sm = "Uspešno ste se registrovali";
            $ms = "success";
            header("Location: $location&$ms=$sm&$data");
            exit();
        }else{
            $em = "Došlo je do greške prilikom registracije ili ste već registrovani korisnik";
            header("Location: $location&$ms=$em&$data");
            exit();
        }

    }else{
        $em = "Lozinke se ne poklapaju";
        header("Location: $location&$ms=$em&$data");
        exit();
    }
}else{
    // Redirekcija na register stranicu
    header("Location: ../index.php?page=register");
    exit;
}
mysqli_close($connect);