<?php
/* @var $secondLvlCates CategoryDomain */
/* @var $thisCate CategoryDomain */
/* @var $firstLvlCate CategoryDomain */
/* @var $products ProductFixedDomain */
?>

<h1><?php echo $thisCate->name ?></h1>
<?php
foreach ($secondLvlCates as $cate)
{
    $url = $cate->getURL();
    echo "<a href='$url'>{$cate->name}</a><br>";
}
?>

<?php foreach ($products as $product): ?>
    <?php
    $images = $product->getImages();
    $img = $images[0];
    ?>
    <a href="<?php echo $product->getURL() ?>" title="<?php echo $product->getName() ?>">
        <img src="/thumbnail.php/<?php echo $img->url ?>/w=200" alt="Sfriendly.com: <?php echo $product->getName() ?>" style="width: 200px;"/>
        <br>
        <strong><?php echo $product->getName() ?></strong>
    </a>
    <br>
<?php endforeach; ?>

<?php if (count($products)): ?>
    <a href="<?php echo $thisCate->getURL() ?>?offset=<?php echo $offset + count($products) ?>" rel="next">Next</a>
<?php endif; ?>
<?php

