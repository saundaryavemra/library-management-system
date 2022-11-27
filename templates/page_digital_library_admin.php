
<div class="container">
    <div class="row">

        <?php  
        $books = get_all_books($connect);
        if ($books == 0) { ?>
                <div class="alert text-center p-5" 
                    role="alert">
                    <img src="./public/images/Empty.svg" width="100%">
                    <br>
                    <h1>Trenutno nema raspolozivih knjiga</h1>
                </div>
            <?php }else {?>


            <!-- Lista svih knjiga -->
            <h1>Sve <span class="text-change">Knjige</span></h1>
            <table class="table table-borderless bg-dark bg-gradient text-light shadow">
                <thead>
                    <tr class="border table-first-row">
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Autor</th>
                        <th>Opis</th>
                        <th>Kategorija</th>
                        <th>Radnja</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $i = 0;
                foreach ($books AS $book) {
                    $i++;
                ?>
                <tr>
                    <!-- Redni broj -->
                    <td>
                        <strong><?= $i?></strong>
                    </td>
                    <!-- Naziv knjige -->
                    <td class="d-block text-center">
                        <img class="rounded"  src="./public/covers/<?=$book['cover']?>" alt="Loading..." width="150"> 
                        <p class="naslov"><?=$book['title']?></p>
                    </td>
                    <!-- Autor  -->
                    <td>
                        <p>
                            <?php 
                                //ZASTO OVDE NE MOGU DA KREIRAM NOVE HTML TAGOVE
                                $authors = get_authors($book['title'],$connect);
                                if ($authors == 0) {
                                    echo "Nepoznato";
                                }else{
                                    foreach ($authors as $author){
                                        echo $author['first_name'] . "<br>" . $author['last_name'];  
                                    }
                                }
                            ?>
                        </p>
                    </td>
                    <!-- Opis -->
                    <td>
                        <p >
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        magnam corporis dignissimos quos dolores voluptatum earum accusamus at pariatur ipsum recusandae similique sint maxime fuga alias quidem excepturi
                        </p>
                    </td>
                    <!-- Kategorija -->
                    <td>
                        <?php 
                            $categories = get_category($book['title'],$connect);
                            if ($categories == 0) {
                                echo "Nepoznato";
                            }else{
                                foreach ($categories as $category){
                                    echo $category['category_name'] . "<br>" . "<br>";  
                                }
                            }
                        ?>
                    </td>
                    <!-- Radnja -->
                    <td>
                        <a href="?page=edit_book&book_id=<?= $book['book_id'] ?>" class="btn btn-warning my-2">Izmeni</a>
                        <a href="<?= DIR_MODULES?>delete_book.php?book_id=<?= $book['book_id']?>" class="btn btn-danger">Izbriši</a>
                    </td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php }?>


        <?php  
        $all_categories =  get_all_categories($connect);
        if ($all_categories == 0) { ?>
        	<div class="alert text-center p-5" 
                    role="alert">
                    <img src="./public/images/Empty.svg" width="50%">
                    <br>
                    <h1>Ne možemo pronaći nijednu kategoriju</h1>
                </div>
        <?php }else {?>
                    <h1>Sve <span class="text-change">Kategorije</span></h1>
                <table class="table bg-dark bg-gradient text-light shadow text-right align-middle">
                    <thead>
                        <tr class="border">
                            <th>#</th>
                            <th>Kategorija</th>
                            <th class="text-end">Radnja</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $j = 0;
                    foreach ($all_categories AS $one_category) {
                        $j++;
                    ?>
                        <tr>
                            <td>
                                <strong><?= $j?></strong>
                            </td>
                            <td>
                                <?=$one_category['category_name']?>
                            </td>
                            <td class="text-end td-actions">
                                <a href="#" class="btn btn-warning my-2">Izmeni</a>
                                <a href="#" class="btn btn-danger">Izbriši</a>
                            </td>
                        </tr>
                    </tbody>
                <?php }?>       
            </table>
        <?php }?>
        
        <?php  
        $all_authors =  get_all_authors($connect);
        if ($all_authors == 0) { ?>
        	<div class="alert text-center p-5" 
                    role="alert">
                    <img src="./public/images/Empty.svg" width="50%">
                    <br>
                    <h1>Ne možemo pronaći nijednog autora</h1>
                </div>
        <?php }else {?>
                    <h1>Svi <span class="text-change">Autori</span></h1>
                <table class="table bg-dark bg-gradient text-light shadow text-right align-middle">
                    <thead>
                        <tr class="border">
                            <th>#</th>
                            <th>Autor</th>
                            <th class="text-end">Radnja</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $k = 0;
                    foreach ($all_authors AS $one_author) {
                        $k++;
                    ?>
                        <tr>
                            <td>
                                <strong><?= $k?></strong>
                            </td>
                            <td>
                                <?=$one_author['first_name'] . "&nbsp" . $one_author['last_name']?>
                            </td>
                            <td class="text-end td-actions">
                                <a href="#" class="btn btn-warning my-2">Izmeni</a>
                                <a href="#" class="btn btn-danger">Izbriši</a>
                            </td>
                        </tr>
                    </tbody>
                <?php }?>       
            </table>
        <?php }?>
    </div>
</div>
