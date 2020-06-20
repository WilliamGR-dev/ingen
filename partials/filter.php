<div class="allCategoryFilter">
    <h2>Filtre</h2>
    <div class="categoryFilter">
        <div class="categoryTitle">Prix</div>
        <div class="sliderInputPrice">
            <div class="inputPrice"><input onchange="changeThumbLeftPrice()" id="minPrice" class="inputNumberPrice" type="number" value="0" min="0" max="2710000"><input onchange="changeThumbRightPrice()"  id="maxPrice" class="inputNumberPrice" type="number" value="2710000"></div>
            <div class="sliderCheckPrice">
                <input type="range" onchange="updatePrice(<?php if (isset($_GET['pmin']) && isset($_GET['pmax'])): echo $_GET['pmin'].','.$_GET['pmax']; endif;?>)" id="inputLeftPrice" min="0" max="100" value="<?php if(isset($_GET['pmin'])): echo ($_GET['pmin']/2710000)*100; else: echo '0'; endif;?>">
                <input type="range" onchange="updatePrice(<?php if (isset($_GET['pmin']) && isset($_GET['pmax'])): echo $_GET['pmin'].','.$_GET['pmax']; endif;?>)" id="inputRightPrice" min="0" max="100" value="<?php if(isset($_GET['pmax'])): echo ($_GET['pmax']/2710000)*100; else: echo '100'; endif;?>">

                <div class="sliderPrice">
                    <div class="trackPrice"></div>
                    <div class="rangePrice"></div>
                    <div class="thumbPrice leftPrice"></div>
                    <div class="thumbPrice rightPrice"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="categoryFilter">
        <div class="categoryTitle">Groupe Social</div>
        <div class="allSocialGroup">
            <div class="socialGroupInput"><input type="checkbox" id="checkSolo"><label onclick="updateFilter(this)" class="socialGroupLabel <?php if(isset($_GET['solitaire'])): ?><?= 'selectedGroup' ?><?php endif;?>" for="checkSolo"><span class="socialTitle" title="solitaire">Solitaire</span><img class="socialImg" src="./assets/img/soloIcon.png" title="Solitaire"></label></div>
            <div class="socialGroupInput"><input type="checkbox" id="checkCouple"><label onclick="updateFilter(this)" class="socialGroupLabel <?php if(isset($_GET['couple'])): ?><?= 'selectedGroup' ?><?php endif;?>" for="checkCouple"><span class="socialTitle" title="couple">Couple</span><img class="socialImg" src="./assets/img/coupleIcon.png" title="Couple"></label></div>
            <div class="socialGroupInput"><input type="checkbox" id="checkGroupe"><label onclick="updateFilter(this)" class="socialGroupLabel <?php if(isset($_GET['groupe'])): ?><?= 'selectedGroup' ?><?php endif;?>" for="checkGroupe"><span class="socialTitle" title="groupe">Groupe</span><img class="socialImg" src="./assets/img/groupeIcon.png" title="Groupe"></label></div>
        </div>
    </div>
    <div class="categoryFilter">
        <div class="categoryTitle">Couleur</div>
        <div class="allColor">
            <?php foreach ($colors as $color): ?>
            <div class="colorInput <?php if(isset($_GET[$color['url_variable']])): ?><?= 'selectedGroup' ?><?php endif;?>"><input id="color<?= $color['id'] ?>" type="checkbox"><label onclick="updateFilter(this)"><img src="./assets/img/skin/<?= $color['img'] ?>" title="<?= $color['url_variable'] ?>"></label></div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="categoryFilter">
        <div class="categoryTitle">Terrain exigé</div>
        <div class="sliderInputLand">
            <div class="inputLand"><input onchange="changeThumbLeftLand()" id="minLand" class="inputNumberLand" type="number" value="0" min="0" max="17857"><input onchange="changeThumbRightLand()" id="maxLand" class="inputNumberLand" type="number" value="17857"></div>
            <div class="sliderCheckLand">
                <input type="range" onchange="updateArea(<?php if (isset($_GET['areamin']) && isset($_GET['areamax'])): echo $_GET['areamin'].','.$_GET['areamax']; endif;?>)" id="inputLeftLand" min="0" max="100" value="<?php if(isset($_GET['areamin'])): echo ($_GET['areamin']/17857)*100; else: echo '0'; endif;?>">
                <input type="range" onchange="updateArea(<?php if (isset($_GET['areamin']) && isset($_GET['areamax'])): echo $_GET['areamin'].','.$_GET['areamax']; endif;?>)" id="inputRightLand" min="0" max="100" value="<?php if(isset($_GET['areamax'])): echo ($_GET['areamax']/17857)*100; else: echo '100'; endif;?>">

                <div class="sliderLand">
                    <div class="trackLand"></div>
                    <div class="rangeLand"></div>
                    <div class="thumbLand leftLand"></div>
                    <div class="thumbLand rightLand"></div>
                </div>
            </div>
        </div>
    </div>
</div>
