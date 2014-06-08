<?php ?>
<style>
    .category-level{width: 200px;float:left;border: 1px solid #ddd;padding:5px;}
</style>
<br>
<div ng-app ng-controller="addProductCtrl" class="row-wrapper">
    <div ng-repeat="categoryLevel in categoryTree" class="category-level left">
        <div data-assign="{{i = $index}}"></div>
        <div ng-repeat="category in categoryLevel" >
            <div data-assign="{{j = $index}}"></div>
            <label>
                <input type="radio" name="category_level[{{i}}]" id="category.id" ng-click="selectCategory(i, j)">
                {{category.name}}
            </label>
        </div>
    </div>
    <form method="get" action="<?php echo base_url('seller/product_details/') ?>">
        <input type="hidden" name="category" value="{{selectedCategory}}">
        <input type="submit" value="Choose this category" ng-disabled="!selectedCategory">
    </form>
</div>
<div class="clearfix"></div>
<br>
<script>
    var Config = function() {
        this.categoryService = '<?php echo base_url('seller/category_service/') ?>';
    };
</script>

<script>
    (function(window, $, angular, config) {
        window.addProductCtrl = function($scope, $http) {
            $scope.categoryTree = [];
            $scope.selectedCategory;

            $http.get(config.categoryService, {cache: false}).success(function(categoryData) {
                changeCategoryLevel(0, categoryData);
            });

            function changeCategoryLevel(level, categoryData) {
                if (categoryData)
                    $scope.categoryTree.splice(level + 1, $scope.categoryTree.length - level, categoryData);
                else
                    $scope.categoryTree.splice(level + 1, $scope.categoryTree.length - level);
            }

            $scope.selectCategory = function(level, levelIndex) {
                var category = $scope.categoryTree[level][levelIndex];
                $scope.selectedCategory = category.isContainer == 0 ? category.id : null;

                if (category.isContainer == 1) {
                    $http.get(config.categoryService + '/' + category.id, {cache: false}).success(function(categoryData) {
                        changeCategoryLevel(level, categoryData);
                    });
                } else {
                    changeCategoryLevel(level);
                }
            };
        };
    })(window, $, angular, new Config);
</script>