<?php
defined('BASEPATH') or die('no direct script access allowed');
?>

<div ng-app ng-controller="SearchCtrl">
    <div class="width-960">
        <?php if ($search_keywords): ?>
            <h3 class="left"><?php echo $language[$view->view]->lblResult; ?></h3>
            <div class="left"><?php echo $language[$view->view]->lblResultCount; ?></div>
        <?php elseif ($tag): ?>
            <h3 class="left"><?php echo $tagName; ?></h3>
        <?php endif; ?>
    </div><!--controller-->
    <div class="width-960">
        <div class="lynx-row width-960" ng-repeat="products in productRows">
            <div class="lynx-box lynx-box-medium" ng-repeat="product in products" ng-product-medium="product"></div>
        </div><!--row-->
    </div>
</div>
<script>
    var scriptData = {
        keywords: '<?php echo $search_keywords ?>',
        tag: '<?php echo $tag ?>'
    };
</script>