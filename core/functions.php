<?php 


    // Form validation function
    function is_empty($var, $text, $location, $ms, $data) {
        if(empty($var)) {
            //Error message
            $em = "Unesite $text ";
            header("Location: $location&$ms=$em&$data");
            exit;
        }
        return 0;
    }

    // BOOK functions
    function get_all_books($connect){
        $sql  = "SELECT * FROM `book` ";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $books[] = $row;
            }
        }
        return $books;
    }
     
    function get_book_by_author($author_first_name,$author_last_name,$connect){
        $sql  = 
        "SELECT *
        FROM `book`
        INNER JOIN `book_author` ON book.book_id = book_author.book_id
        INNER JOIN `author` ON book_author.author_id = author.author_id
        WHERE author.first_name LIKE '$author_first_name' AND author.last_name LIKE '$author_last_name' "; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $books_by_author[] = $row;
            }
            return $books_by_author;
        }
    }

    function get_book_by_id($book_id,$connect){
        $sql  = "SELECT * FROM `book` WHERE book_id = '$book_id'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $book = $row;
        }
        return $book;
    }

    // AUTHOR functions
    function get_all_authors($connect){
        $sql  = 
        "SELECT * FROM `author`"; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $authors[] = $row;
            }
            return $authors;
        }
    }
     

    function get_authors($bookName,$connect){
        $sql  = 
        "SELECT `first_name`, `last_name` 
        FROM `author`
        INNER JOIN `book_author` ON author.author_id = book_author.author_id
        INNER JOIN `book` ON book_author.book_id = book.book_id 
        WHERE book.title LIKE '$bookName' "; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $authors[] = $row;
            }
            return $authors;
        }
    }
     
    // CATEGORY functions
    function get_category($bookName,$connect){
        $sql  = 
        "SELECT `category_name`
        FROM `category`
        INNER JOIN `book_category` ON category.category_id = book_category.category_id
        INNER JOIN `book` ON book_category.book_id = book.book_id 
        WHERE book.title = '$bookName' "; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $categories[] = $row;
            }
            return $categories;
        }
    }

    function get_all_categories($connect){
        $sql  = 
        "SELECT * FROM `category`"; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $categories[] = $row;
            }
            return $categories;
        }
    }

    function get_book_by_category($bookName,$connect){
        $sql  = 
        "SELECT *
        FROM `book`
        INNER JOIN `book_category` ON book.book_id = book_category.book_id
        INNER JOIN `category` ON book_category.category_id = category.category_id
        WHERE category.category_name LIKE '$bookName'"; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $books_by_category_name[] = $row;
            }
            return $books_by_category_name;
        }
    }

    // BOOK_AUTHOR TABLE

    function get_from_book_author_table($book_id,$connect){
        $sql  = 
        "SELECT `author`.`author_id` 
        FROM `book_author`
        INNER JOIN `author` ON book_author.author_id = author.author_id
        INNER JOIN `book` ON book_author.book_id = book.book_id
        WHERE book.book_id LIKE '$book_id' "; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $book_author = $row;
            return $book_author;
        }
    }
    
    function get_from_book_category_table($book_id,$connect){
        $sql  = 
        "SELECT `category`.`category_id` 
        FROM `book_category`
        INNER JOIN `category` ON book_category.category_id = category.category_id
        INNER JOIN `book` ON book_category.book_id = book.book_id
        WHERE book.book_id LIKE '$book_id' "; 
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $book_author = $row;
            return $book_author;
        }
    }
     
    

?>