<nav class="navbar">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <div class="category">

        <div class="icon">
            <a href="index.php" class="logo">
                <img src="./assets/img/navbar/InGenLogo.png">
            </a>
        </div>
        <div class="navhidden">
            <ul class="navbar-nav">
                <?php foreach (getCategories() as $category): ?>
                    <li>
                        <a href="index.php?p=product_list&category_id=<?= $category['id'] ?>" class="category"><?= $category['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div id="searchDiv" class="search">
                <input id="search" name=""  class="search-text" type="text" placeholder="Rechercher...">
                <button><i onclick="extendSearch()" class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="spaceHidden"></div>
        <div class="button">
            <div class="iconCategory">
                <a href="<?php if(isset($_SESSION['user'])): echo 'index.php?p=profil';else: echo 'index.php?p=login'; endif; ?>"><i class="fas fa-user-circle"></i><span><?php if(isset($_SESSION['user'])): echo $_SESSION['user']['first_name'];else: echo 'Connexion'; endif; ?></span></a>
            </div>
            <div class="iconCategory">
                <a href="index.php?p=card"><i class="fas fa-shopping-bag"><span><?php if (isset($_SESSION['card'])):echo count($_SESSION['card']);endif; ?></span></i><span>Panier</span></a>
            </div>
            <div class="iconCategory">
                <a href="<?php if(isset($_SESSION['user'])): echo 'index.php?p=admin';else: echo 'index.php?p=login'; endif; ?>"><i class="fas fa-user-shield"></i><span>Admin</span></a>
            </div>
        </div>
    </div>
</nav>
