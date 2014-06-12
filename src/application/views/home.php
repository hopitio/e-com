<?php
defined('BASEPATH') or die('No direct script access allowed');
?>
<div id="home-ctrl" ng-controller="HomeCtrl" >
    <div class="lynx_banner">
        <div class="lynx_slide">
        </div>
        <!--        <div class="lynx_suggest">
                    <div class="lynx_suggetWarp lynx_staticWidth">
                        <div class="lynx_suggestItem lynx_step1"></div>
                        <div class="lynx_suggestItem lynx_step2"></div>
                        <div class="lynx_suggestItem lynx_step3"></div>
                    </div>
                </div>-->
        <div style="height:20px;">&nbsp;</div>
    </div>
    <div class="lynx_hotProducts">
        <div class="lynx_hotSildeButton lynx_left">
        </div>        
        <div class="lynx_hotSildeButton lynx_right">
        </div>
        <div class="lynx_slideItemsContainer">
            <div class="lynx_head" >
                <strong>
                    <span ng-repeat="tab in hotItemTabs">
                        <ng ng-if="$index > 0">&nbsp;&nbsp;</ng>
                        <a href="javascript:;" ng-click="setHotTab($index)" ng-class="{
                                    active: isHotTabActive($index)
                                }">{{tab[0]}}</a>&nbsp;&nbsp;
                        <ng ng-if="$index < hotItemTabs.length - 1"><?php echo htmlentities('/') ?></ng>
                    </span>
                </strong>
            </div>
            <div class="lynx_listItem" >
                <div class="lynx_item" 
                     ng-repeat="product in hotItemTabs[activeHotTab][2]" product="product"
                     ng-class="{
                                 lynx_hotFirst: !$index, lynx_hotLast: $index == hotItemTabs[activeHotTab][2].length - 1}">
                </div>
            </div>
        </div>
    </div>

    <div class="lynx_listProducts" ng-repeat="section in sections">
        <div class="lynx_head">
            <span>{{section.name}}</span>
            <div class="lynx_navigateLink">
                 <a href="{{section.url}}"><?php echo $language[$view->view]->lblViewAll; ?></a>
            </div>
        </div>
        <div class="lynx_listItem">
            <div class="lynx_item lynx_itemAdve" ng-if="section.displayImage">
                    <a href="{{section.displayImageHref}}" title="{{section.displayImageTitle}}"><img src="{{section.displayImage}}"/></a>
            </div>
            <div class="lynx_item" ng-repeat="product in section.products" product="product">

           </div>
        </div>
        <!--   
        <div class="lynx_itemConatiner">
            <div class="lynx_item lynx_towCol" ng-if="section.displayImage">
                <a href="{{section.displayImageHref}}" title="{{section.displayImageTitle}}"><img src="{{section.displayImage}}"/></a>
            </div>
            <div class="lynx_item lynx_oneCol" ng-repeat="product in section.products" product="product">
            </div>
        </div>
         -->
        
        
    </div>
    
    <div class="lynx_slideGroup">
        <div class="lynx_item lynx_first-child"><a href="#"><img src="/images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_item"><a href="#"><img src="/images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_item lynx_last-child"><a href="#"><img src="/images/child-slide-item-demo.png" /></a></div>
    </div>
</div><!--homeCtrl-->
<script>
    function scriptData() {
        this.hotItemTabs = [
            ['<?php echo $language[$view->view]->lblHot; ?>', '<?php echo base_url('home/hot_service') ?>'],
            ['<?php echo $language[$view->view]->lblNew; ?>', '<?php echo base_url('home/new_service') ?>']
          //  ['<?php echo $language[$view->view]->lblSale; ?>', '<?php echo base_url('home/sale_service') ?>']
        ];
        this.sectionURL = '<?php echo base_url('home/section_service') ?>';
    }
</script>
