<?php
    $book_id = $_GET['book_id'];
    $book = get_book_by_id($book_id,$connect);
    $authors = get_all_authors($connect);
    $book_author = get_from_book_author_table($book_id,$connect);
    $categories = get_all_categories($connect);
    $book_category = get_from_book_category_table($book_id,$connect);
    // print_r($authors);exit;
?>
<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <form action="<?=DIR_MODULES?>edit_book.php " method="post" class="shadow p-4 rounded m-5 form-edit-book">

                <h1 class="text-center pb-5 display-4 fs-3">
                    Izmeni knjigu
                </h1>
                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=htmlspecialchars($_GET['error']); ?>
                </div>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?=htmlspecialchars($_GET['success']); ?>
                </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Naslov</label>
                    <input type="text" hidden value="<?=$book['book_id']?>" name="book_id">
                    <input type="text" class="form-control" value="<?=$book['title']?>" name="book_title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Opis</label>
                    <input type="text" class="form-control" value="<?=$book['description']?>" name="book_description">
                </div>

                <div class="mb-3">
                    <label class="form-label">Autor</label>
                    <select name="book_author" class="form-control">
                            <?php 
                            if ($authors == 0) {
                                # Do nothing!
                            }else{
                            foreach ($authors as $author) {
                                if ($author['author_id'] == $book_author['author_id']) { ?>
                                <option selected value="<?=$author['first_name'] . " " . $author['last_name']?>">
                                <?=$author['first_name'] . " " . $author['last_name']?>
                                </option>
                                <?php }else{ ?>
                                <option value="<?=$author['first_name'] . " " . $author['last_name']?>">
                                    <?=$author['first_name'] . " " . $author['last_name']?>
                                </option>
                        <?php }}} ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategorija</label>
                    <select name="book_category" class="form-control">
                            <?php 
                            if ($categories == 0) {
                                # Do nothing!
                            }else{
                            foreach ($categories as $category) {
                                if ($category['category_id'] == $book_category['category_id']) { ?>
                                <option selected value="<?=$category['category_name']?>">
                                <?=$category['category_name']?>
                                </option>
                                <?php }else{ ?>
                                <option value="<?=$category['category_name']?>">
                                    <?=$category['category_name']?>
                                </option>
                        <?php }}} ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-custom">
                    Izmeni
                </button>
        </form>
    </div>    
</div>
