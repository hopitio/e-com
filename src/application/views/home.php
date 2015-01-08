<?php
defined('BASEPATH') or die('No direct script access allowed');
?>
<div ng-controller="homeCtrl">
    <div class="banner-box width-960" style="position:relative;height: 358px;">
        <div style="position: absolute;width: 100%;top:0;left:0;">
            <?php $banners = simplexml_load_string($banners); ?>
            <div id="carousel-home-banner" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $i = 0; ?>
                    <?php foreach ($banners as $banner): ?>
                        <?php $class = $i == 0 ? 'active' : '' ?>
                        <li data-target="#carousel-home-banner" data-slide-to="<?php echo $i++ ?>" class="<?php echo $class ?>"></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($banners as $banner): ?>
                        <?php $class = $i++ == 0 ? 'active' : '' ?>
                        <div class="item <?php echo $class ?>">
                            <a href="<?php echo $banner->attributes()->href ?>" title="<?php $banner->attributes()->title ?>">
                                <img src="<?php echo $banner->attributes()->src ?>" alt="<?php echo $banner->attributes()->title ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control cursor-pointer" href="#carousel-home-banner" data-slide="prev">
                    <span class=""></span>
                </a>
                <a class="right carousel-control cursor-pointer" href="#carousel-home-banner" data-slide="next">
                    <span class=""></span>
                </a>
            </div>
        </div>
    </div>

    <div class="tab tab-orange width-960 text-left">
        <div class="head width-960" style="margin-top: 15px;">
            <ul>
                <li><?php echo $language[$view->view]->lblBestSeller ?></li>
                <li class="line"></li>
            </ul>
        </div>
        <div class="tab-content width-960">
            <div id="carousel-hot-product" class="carousel slide carousel-mini-product"  data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-hot-product" data-slide-to="{{$index}}" ng-class="{
                                active: $index == activeHot
                            }" ng-repeat="products in hotProducts"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item" ng-repeat="products in hotProducts" ng-class="{
                                active: $index == activeHot
                            }">
                        <div class="lynx-row width-960">
                            <div class="lynx-box lynx-box-small cursor-pointer" ng-repeat="product in products" ng-product-small="product" ></div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control cursor-pointer" href="#carousel-hot-product" data-slide="prev">
                    <span class="fa fa-angle-left fa-2x"></span>
                </a>
                <a class="right carousel-control cursor-pointer" href="#carousel-hot-product" data-slide="next">
                    <span class="fa fa-angle-right fa-2x"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="clear-fix"></div>
    <div class="lynx-box width-960 lynx-adv-box text-left lynx-adv-home cursor-pointer">
        <div class="head">
            <div class="title"><?php echo $language[$view->view]->lblFeatureProduct ?></div>
            <div class="choice">
                <a ng-repeat="group in featureGroups" href="javascript:;" 
                   class="feature_{{group.codename}}"
                   ng-click="setSelectedGroup($index)" ng-class="{
                               active: selectedGroupIndex == $index
                           }">
                    {{group.name}}
                    <span class="bottom-tab"></span>
                </a>
            </div>
        </div>
        <div ng-cloak ng-repeat="group in featureGroups" ng-show="selectedGroupIndex == $index" class="group-{{group.codename}} <?php echo User::getCurrentUser()->languageKey ?>">
            <div class="lynx-row row-{{$index + 1}}" style="display:block;" ng-repeat="items in group.details">
                <div ng-if="item.id" class="lynx-box lynx-box-small" ng-product-small="item" ng-repeat-start="item in items"><!--product--></div>
                <a ng-if="item.imgSrc" ng-href="{{item.imgUrl}}" title="{{item.imgTitle}}" class="lynx-adv-img feature-img-{{$index}}" ng-repeat-end>
                    <img class="adv-img-box" ng-src="{{item.imgSrc}}" alt="{{item.imgTitle}}"/>
                </a>
            </div>
        </div>
    </div>


    <div class="tab tab-blue width-960 text-left">
        <div class="head width-960">
            <ul>
                <li><?php echo $language[$view->view]->lblNewProduct ?></li>
                <li class="line"></li>
            </ul>
        </div>
        <div class="tab-content list-product width-960">
            <div class="lynx-row width-960" ng-repeat="products in newProducts">
                <div class="lynx-box lynx-box-medium" ng-repeat="product in products" ng-product-medium="product"></div>
            </div>
        </div>

        <div class="width-960 text-center">
            <input type='button' class='btn-plus' ng-click='getMoreNewProduct()' value='<?php echo $language['layout']->btnPlus ?>'>
        </div>
    </div>
    <div class="lynx-adv width-960">

    </div>
</div>
<script>
    var scriptData = {
    };
    $(function () {
        $('#carousel-hot-product').carousel({
            interval: false
        });
    });
</script>
