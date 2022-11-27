<?php 
session_start();

// Provera da li admin ulogovan
if (isset($_SESSION['email'])) {
    if (isset($_GET['book_id'])){

        //DB
        include ("../modules/db.php");

        $book_id = $_GET['book_id'];
        
        if (empty($book_id)) {
			$em = "Došlo je do greške!";
			header("Location: ../index.php?page=digital_library_admin&?error=$em");
            exit;
		}else {
            $sql = "DELETE FROM `book` 
                    WHERE book_id=$book_id ";
            $result = mysqli_query($connect, $sql);
            header("Location: ../index.php?page=digital_library_admin");
            exit;
        }
    }else{
        header("Location: ../index.php?page=digital_library_admin");
        exit;
    }
}else{
    // Redirektuj na Login stranicu
    header("Location: ../index.php?page=login");
    exit;
}