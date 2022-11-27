<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';
if(!isset($_SESSION['email'])){
    switch ($page) {
        case '':
        case 'home':
            $page = 'home';
            break;
        case 'contact':
        case 'digital_library':
        case 'about':
        case 'login':
        case 'register':
            break;
        default:
            $page = '404';
    }
}else{
    switch ($page) {
        case '':
        case 'home':
            $page = 'home';
            break;
        case 'about':   
        case 'contact':   
        case 'digital_library':
        case 'digital_library_admin':
        case 'add_book':
        case 'edit_author':
        case 'edit_book':
        case 'edit_category':
            break;
        default:
            $page = '404';
    }  
}

?>