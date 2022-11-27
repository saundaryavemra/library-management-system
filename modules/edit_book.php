<?php 
session_start();

// Provera da li admin ulogovan
if (isset($_SESSION['email'])) {
    if (isset($_POST['book_id'])          &&
        isset($_POST['book_title'])       &&
        isset($_POST['book_description']) &&
        isset($_POST['book_author'])      &&
        isset($_POST['book_category'])) {
        
        
        //DB
        include ("../modules/db.php");
        //Funkcije
        include ("../core/functions.php");


        // Preuzimanje podataka iz POST metoda
        $post_id          = $_POST['book_id'];
		$post_title       = $_POST['book_title'];
		$post_description = $_POST['book_description'];
		$post_category    = $_POST['book_category'];
		
        
        $post_author      = $_POST['book_author'];
        $author_array     = explode(" ", $post_author);
        
        // echo $arr_1 . "<br>" . $arr_2 . "<br>";
        // print_r($author_array); exit;

        // Provera naslova
        $text = "naslov";
        $location = "../index.php?page=edit_book";
        $ms = "book_id=$post_id&error";
		is_empty($post_title, $text, $location, $ms, "");

        // Provera naslova
        $text = "opis";
        $location = "../index.php?page=edit_book";
        $ms = "book_id=$post_id&error";
		is_empty($post_description, $text, $location, $ms, "");

        // Provera naslova
        $text = "autora";
        $location = "../index.php?page=edit_book";
        $ms = "book_id=$post_id&error";
		is_empty($post_author, $text, $location, $ms, "");

        // Provera naslova
        $text = "kategoriju";
        $location = "../index.php?page=edit_book";
        $ms = "book_id=$post_id&error";
		is_empty($post_category, $text, $location, $ms, "");

        // Izmeni tabelu BOOK
        $sql = 
            "   UPDATE `book`
                SET `title`= '$post_title' 
                WHERE book_id=$post_id";
        $result = mysqli_query($connect, $sql);

        // Izmeni tabelu opis knjige
        $sql = 
            "   UPDATE `book`
                SET `description`= '$post_description' 
                WHERE book_id=$post_id";
        $result = mysqli_query($connect, $sql);

        // Izmeni autora knjige
        $sql = "UPDATE `book_author`
                SET book_author.author_id = (	SELECT `author_id` FROM author WHERE first_name = '$author_array[0]' AND last_name = '$author_array[1]'  )
                WHERE book_author.book_id = $post_id ";
        $result = mysqli_query($connect, $sql);
        
        // Izmeni kategoriju knjige
        $sql = "UPDATE `book_category`
                SET book_category.category_id = (	SELECT `category_id` FROM category WHERE category_name = '$post_category' )
                WHERE book_category.book_id = $post_id ";
        $result = mysqli_query($connect, $sql);

        // Ispis poruke nakom izmena
        if ($result) {
        // Uspesan upis
        $sm = "Podaci su uspešno izmenjeni";
        header("Location: ../index.php?page=edit_book&success=$sm&book_id=$post_id");
        exit;
        }else{
        // Neuspesan upis
        $em = "Došlo je do greške prilikom izmena";
        header("Location: ../index.php?page=edit_book&error=$em&book_id=$post_id");
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