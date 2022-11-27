<?php 
session_start();

// Provera da li admin ulogovan
if (isset($_SESSION['email'])) {
    if (isset($_POST['book_title'])       &&
        isset($_POST['book_description']) &&
        isset($_POST['book_author'])      &&
        isset($_POST['book_category'])) {
        
        
        //DB
        include ("../modules/db.php");
        //Funkcije
        include ("../core/functions.php");


        // Preuzimanje podataka iz POST metoda
		$post_title       = $_POST['book_title'];
		$post_description = $_POST['book_description'];
		$post_category    = $_POST['book_category'];
		
        
        $post_author      = $_POST['book_author'];
        $author_array     = explode(" ", $post_author);
        $author_first_name = $author_array[0];
        $author_last_name = $author_array[1];
        


        // // Dodajemo knjigu
        $sql = "INSERT INTO `book` (`title`, `description`) VALUES ('$post_title' ,'$post_description' )";
        $result = mysqli_query($connect, $sql);

        // Uzimamo id novododate knjige
        $sql = "SELECT book_id
                FROM book
                WHERE book_id = (SELECT MAX(book_id) FROM book)";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $book_id = $row;
            $book_id = $book_id['book_id'];
            // print_r($book_id); exit;
        }
        
        // Uzimamo id autora knjige
        $sql = "SELECT author_id
                FROM author
                WHERE first_name = '$author_first_name' AND last_name = '$author_last_name'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $author_id = $row;
            $author_id = $author_id['author_id'];
            // print_r($author_id); exit;
        }
        
        // Uzimamo id kategorije knjige
        $sql = "SELECT category_id
                FROM category
                WHERE category_name = '$post_category'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $category_id = $row;
            $category_id = $category_id['category_id'];
            // print_r($category_id); exit;
        }
        
        
        $sql = "INSERT INTO `book_author` (`book_id`, `author_id`) VALUES ('$book_id' ,'$author_id' )";
        $result = mysqli_query($connect, $sql);
        
        $sql = "INSERT INTO `book_category` (`book_id`, `category_id`) VALUES ('$book_id' ,'$category_id' )";
        $result = mysqli_query($connect, $sql);




        // Ispis poruke nakom izmena
        if ($result) {
        // Uspesan upis
        $sm = "Nova knjiga je uspešno dodata";
        header("Location: ../index.php?page=add_book&success=$sm&book_id=$post_id");
        exit;
        }else{
        // Neuspesan upis
        $em = "Došlo je do greške prilikom dodavanja knjige";
        header("Location: ../index.php?page=add_book&error=$em&book_id=$post_id");
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
mysqli_close($connect);