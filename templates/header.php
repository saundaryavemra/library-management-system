<header>
    <nav class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <?php if (!isset($_SESSION['email'])){?>

                <a href="?page=home" class="navbar-brand">
                    <img class="logo" src="public/images/icons8-library-96.png" alt="Loading..."> 
                    Biblioteka   
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
            
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="?page=home" class="nav-link links">Početna</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=about" class="nav-link links" target="blank">O nama</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=contact" class="nav-link links" target="blank">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=digital_library" class="nav-link links" target="blank">Digitalna biblioteka</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=login" class="nav-link uclani-se">
                                <button class="btn navbar-btn" type="button">Uloguj se</button>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php }else{ ?>
                <a href="?page=home" class="navbar-brand">
                <img class="logo" src="./public/images/icons8-library-96.png" alt="Loading..."> 
                    <span>Biblioteka</span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="?page=home" class="nav-link links">Početna</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=about" class="nav-link links" target="blank">O nama</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=contact" class="nav-link links" target="blank">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=digital_library" class="nav-link links" target="blank">Digitalna biblioteka</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=digital_library_admin" class="nav-link links" target="blank">Admin</a>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn navbar-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['first_name'] ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="?page=add_book">Dodaj knjigu</a></li>
                                <li><a class="dropdown-item" href="?page=add_category">Dodaj kategoriju</a></li>
                                <li><a class="dropdown-item" href="?page=add_author">Dodaj autora</a></li>
                                <li><a class="dropdown-item" href="<?=DIR_MODULES?>logout.php">Izloguj se</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php }?>
        </div>
    </nav>
</header>