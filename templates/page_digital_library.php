<div class="container">
	<div class="row">
		<div class="col-lg-8">

    <!-- Lista sa knjigama -->
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
			<?php if(!isset($_GET['category_name']) && !isset($_GET['author_first_name']) && !isset($_GET['author_last_name'])) {?>

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
							<img class="rounded"  src="<?= DIR_COVERS?><?=$book['cover']?>" alt="Loading..." width="150"> 
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

					</tr>
					<?php } ?>
					</tbody>
				</table>
			<?php }else {?>
				<?php if(isset($_GET['category_name'])) {?>
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
						</tr>
					</thead>
					<tbody>
					<?php 
					$i = 0;
					$books_by_category_name = get_book_by_category($_GET['category_name'],$connect) ;
					if ($books_by_category_name == 0) {
						echo "<p>Nismo pronasli nijednu knjigu za trazenu kategoriju</p>";
					}else{
					foreach ($books_by_category_name AS $book_by_category_name) {
						$i++;
					?>
					<tr>
						<!-- Redni broj -->
						<td>
							<strong><?= $i?></strong>
						</td>
						<!-- Naziv knjige -->
						<td class="d-block text-center">
							<img class="rounded"  src="<?= DIR_COVERS?><?=$book_by_category_name['cover']?>" alt="Loading..." width="150"> 
							<p class="naslov"><?=$book_by_category_name['title']?></p>
						</td>
						<!-- Autor  -->
						<td>
							<p>
								<?php 
									//ZASTO OVDE NE MOGU DA KREIRAM NOVE HTML TAGOVE
									$authors = get_authors($book_by_category_name['title'],$connect);
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
								$categories = get_category($book_by_category_name['title'],$connect);
								if ($categories == 0) {
									echo "Nepoznato";
								}else{
									foreach ($categories as $category){
										echo $category['category_name'] . "<br>" . "<br>";  
									}
								}
							?>
						</td>

					</tr>
					<?php } ?>
					</tbody>
				</table>
				<?php }?>
				<?php }elseif(isset($_GET['author_first_name']) && isset($_GET['author_last_name'])) {?> 
					<h1>Sve <span class="text-change">Knjige</span></h1>
					<table class="table table-borderless bg-dark bg-gradient text-light shadow">
					<thead>
						<tr class="border table-first-row">
							<th>#</th>
							<th>Naziv</th>
							<th>Autor</th>
							<th>Opis</th>
							<th>Kategorija</th>
						</tr>
					</thead>
						<tbody>
						<?php 
						$i = 0;
						$books_by_category_name = get_book_by_author($_GET['author_first_name'],$_GET['author_last_name'],$connect) ;
						if ($books_by_category_name == 0) {
							echo "<p>Nismo pronasli nijednu knjigu za trazenog autora</p>";
						}else{
						foreach ($books_by_category_name AS $book_by_category_name) {
							$i++;
						?>
						<tr>
							<!-- Redni broj -->
							<td>
								<strong><?= $i?></strong>
							</td>
							<!-- Naziv knjige -->
							<td class="d-block text-center">
								<img class="rounded"  src="<?= DIR_COVERS?><?=$book_by_category_name['cover']?>" alt="Loading..." width="150"> 
								<p class="naslov"><?=$book_by_category_name['title']?></p>
							</td>
							<!-- Autor  -->
							<td>
								<p>
									<?php 
										//ZASTO OVDE NE MOGU DA KREIRAM NOVE HTML TAGOVE
										$authors = get_authors($book_by_category_name['title'],$connect);
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
									$categories = get_category($book_by_category_name['title'],$connect);
									if ($categories == 0) {
										echo "Nepoznato";
									}else{
										foreach ($categories as $category){
											echo $category['category_name'] . "<br>" . "<br>";  
										}
									}
								?>
							</td>

						</tr>
						<?php } ?>
						</tbody>
					</table>
					<?php }?>
				<?php }else{?>
					<?php echo "Trenutno nema knjiga za izabranog autora"; ?> 
				<?php }?> 
			<?php }?> 
		<?php }?> 
	</div>
	   <!-- col-8 -->

		<!-- col-4 -->
	   <div class="col-lg-4">
			<!-- List of categories -->
			<h3 class="mt-3">Izaberite kategoriju</h3>
			<div class="list-group shadow">
				<?php
				$all_categories = get_all_categories($connect); 
				if ($all_categories == 0){
					// Ne radi nista
				}else{ ?>
				<a href="#"
					class="list-group-item list-group-item-action active-list-item">
					<strong>Kategorija</strong>
				</a>
				<?php foreach ($all_categories as $one_category ) {?>
				
				<a href="?page=digital_library&category_name=<?=$one_category['category_name']?>"
					class="list-group-item list-group-item-action">
					<?=$one_category['category_name']?>	
				</a>
				<?php } } ?>
			</div>

			<!-- List of authors -->
			<h3 class="mt-5">Izaberite autora</h3>
			<div class="list-group shadow">
				<?php 
				$all_authors = get_all_authors($connect);
				if ($all_authors == 0){
					// Ne radi nista
				}else{ ?>
				<a href="#"
					class="list-group-item list-group-item-action active-list-item">
					<strong>Autor</strong>
				</a>
					<?php foreach ($all_authors as $one_author ) {?>
				
				<a href="?page=digital_library&author_first_name=<?=$one_author['first_name']?>&author_last_name=<?=$one_author['last_name']?>"
					class="list-group-item list-group-item-action">
					<?=$one_author['first_name']?> <?=$one_author['last_name']?>	
				</a>
				<?php } } ?>
			</div>
	   </div>
	</div>
</div>
