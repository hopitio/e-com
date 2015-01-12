<style>
    h1,h2, ul{text-align: left;}
</style>

<?php
/* @var $categories CategoryDomain */
$arrFirstLevel = array();
foreach ($categories as $cate)
{
    if ($cate->getLevel() == 1)
    {
        $arrFirstLevel[$cate->id] = array('firstLevel' => $cate, 'secondLevel' => array());
    }
}
foreach ($categories as $cate)
{
    if ($cate->getLevel() == 2)
    {
        $arrFirstLevel[$cate->fkParent]['secondLevel'][] = $cate;
    }
}
?>
<div class="width-960" style="min-height: 500px;">
    <h1>Sfriendly Sitemap</h1>
    <?php foreach ($arrFirstLevel as $data): ?>
        <?php
        $firstLevel = $data['firstLevel'];
        $arrSecondLevel = $data['secondLevel'];
        ?>
        <a href="<?php echo $firstLevel->getURL() ?>"><h2><?php echo $firstLevel->name ?></h2></a>
        <ul>
            <?php foreach ($arrSecondLevel as $secondLevel): ?>
                <li>
                    <a href="<?php echo $secondLevel->getURL() ?>">>> <?php echo $secondLevel->name ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div><!--960-->


