<?php
if (isset($_POST['first_name']) && isset( $_POST['last_name']) && isset( $_POST['email']) && isset( $_POST['theme']) && isset( $_POST['message'])) {
    
    //Database file
    include ("../modules/db.php");
    //Simple validate function
    include ("../core/functions.php");
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $theme = $_POST['theme'];
    $message = $_POST['message'];

    // Provera unosa forme
    $text = "ime";
    $location = "../index.php?page=contact";
    $ms = "error";
    is_empty($first_name, $text, $location, $ms, "");
    
    $text = "prezime";
    $location = "../index.php?page=contact";
    $ms = "error";
    is_empty($last_name, $text, $location, $ms, "");

    $text = "email";
    $location = "../index.php?page=contact";
    $ms = "error";
    is_empty($email, $text, $location, $ms, ""); 
    
    $text = "temu";
    $location = "../index.php?page=contact";
    $ms = "error";
    is_empty($theme, $text, $location, $ms, "");

    $text = "poruku";
    $location = "../index.php?page=contact";
    $ms = "error";
    is_empty($message, $text, $location, $ms, "");

    $mail_to = "vule.stankovic2@gmail.com";
    $headers = "From: ".$email;
    $text = "Dobili ste e-mail od: ".$first_name . " " . $last_name ."\n\n". $message ;

    if(mail($mail_to, $theme, $text, $headers)) {
        $sm = "Poruka je uspesno poslata";
        $ms = "success";
        header("Location: $location&$ms=$sm&$data");
        exit();
    }else{
        $em = "Došlo je do greške prilikom slanja poruke";
        header("Location: $location&$ms=$em&$data");
        exit();
    }
}else{
    // Redirekcija na register stranicu
    header("Location: ../index.php?page=contact");
    exit;
}