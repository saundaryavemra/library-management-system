
<?php
    $authors = get_all_authors($connect);
    $categories = get_all_categories($connect);
    // print_r($authors);exit;
?>
<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <form action="<?=DIR_MODULES?>add_book.php " method="post" class="shadow p-4 rounded m-5 form-edit-book">

                <h1 class="text-center pb-5 display-4 fs-3">
                    Dodaj novu knjigu
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
                    <input type="text" class="form-control" name="book_title" placeholder="Unesite naslov knjige">
                </div>

                <div class="mb-3">
                    <label class="form-label">Opis</label>
                    <input type="text" class="form-control" name="book_description" placeholder="Unesite opis knjige">
                </div>

                <div class="mb-3">
                    <label class="form-label">Autor</label>
                    <select name="book_author" class="form-control">
                            <?php 
                            if ($authors == 0) {
                                // Ne radi nista
                            }else{
                            foreach ($authors as $author) { ?>
                                <option selected value="<?=$author['first_name'] . " " . $author['last_name']?>">
                                    <?=$author['first_name'] . " " . $author['last_name']?>
                                </option>
                        <?php }} ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategorija</label>
                    <select name="book_category" class="form-control">
                            <?php 
                            if ($categories == 0) {
                                //  Ne radi nista
                            }else{
                            foreach ($categories as $category) {?>
                                <option selected value="<?=$category['category_name']?>">
                                    <?=$category['category_name']?>
                                </option>
                        <?php }} ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-custom">
                    Dodaj
                </button>
        </form>
    </div>    
</div>
