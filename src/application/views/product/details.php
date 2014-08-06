<?php
/* @var $product ProductDomain */
/* @var $breadcrums array */
/* @var $ancestors array */
?>
<div class="lynx-menu-lvl2-container width-960">
    <ul class="lynx-menu-lvl-2">
        <?php
        $class = User::getCurrentUser()->languageKey;
        ?>
        <li class='<?php echo $class ?>' id="menu-best">
            <a href='/category/show/<?php echo $ancestors[0] ?>'>
                <span class="menu-icon"></span><span class="menu-name">Best</span>
            </a>
        </li>
        <?php foreach ($secondLvlCates as $secondLvlCate): ?>
            <?php
            $class = User::getCurrentUser()->languageKey;
            $class .= isset($ancestors[1]) && $ancestors[1] == $secondLvlCate->id ? ' active' : '';
            ?>
            <li id="menu-<?php echo $secondLvlCate->codename ?>" class="<?php echo $class ?>">
                <a href="<?php echo $secondLvlCate->getURL() ?>"><span class="menu-icon"></span><span class="menu-name"><?php echo $secondLvlCate->name ?></span></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="width-960 left">
    <ul class="lynx-product-breadcrums">
        <?php foreach ($breadcrums as $name => $url): ?>
            <li>
                <?php if ($url): ?>
                    <a href="<?php echo $url ?>" title="<?php echo $name ?>"><?php echo $name ?></a>&nbsp;>>&nbsp;
                <?php else: ?>
                    <?php echo $name ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="width-960" style="overflow: hidden;">
    <div class="detail-main">
        <div class="detail-main-left">
            &nbsp;
        </div>
        <div class="detail-main-right">
            <h4 class="product-name">LOREM ISUM DOLOR</h4>
            <div class="product-image">
                <img src="/images/feature/banner01.jpg">
            </div>
        </div>
    </div>
    <div class="detail-summaries">
        <div class="detail-seller-logo"></div>
        <div class="detail-seller-name">Milano</div>
        <div class="left">
            <span class="detail-sale">10%</span>
            <div class="detail-origin-price">$99.00</div>
        </div>
        <div class="clearfix"></div>
        <div class="detail-price">$80.00</div>
        <div class="detail-free-shipping free">
            <label for="sel_qty">Quantity:</label> <select name="sel_qty" id="sel_qty"><option>1</option></select>
        </div>
        <h4></h4>
        <input type="button" class="btn-add-to-cart" value="Add to Cart">
        <h4></h4>
        <input type="button" class="btn-add-to-favorite" value="Add to Favorites">
        <h4 ></h4>
        <div class="detail-share"> 
            <span>Share: </span>
            <a href="javascript:;" class="share share-facebook"></a>
            <a href="javascript:;" class="share share-twiter"></a>
            <a href="javascript:;" class="share share-google"></a>
            <a href="javascript:;" class="share share-email"></a>           
        </div>
        <h4 class="clearfix"></h4>
    </div>
</div>