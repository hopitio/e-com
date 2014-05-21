<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* @var $wishlist WishlistDomain */
?>

<div ng-app ng-controller="showWishlistController">
    <div ng-show="undo">Your item has been removed from wishlist. <a href="javascript:;" ng-click="undoRemove()">Click here</a> to undo.</div>
    <div ng-repeat="detailInstance in wislistDetails">
        <div>{{detailInstance.name}}</div>
        <div>{{detailInstance.price}}</div>
        <div>
            <a href="javascript:;" ng-click="addToCart(detailInstance.id)">Add to Cart</a>
            <a href="javascript:;" ng-click="remove(detailInstance.id)">Remove</a>
        </div>
    </div>
</div>
<script>
    var scriptData = {};
    scriptData.wishlistID = <?php echo $wishlist->id ?>;
    scriptData.addToCartURL = '<?php echo base_url('wishlist/addToCart') ?>/';
    scriptData.removeURL = '<?php echo base_url('wishlist/remove') ?>/';
    scriptData.detailServiceURL = '<?php echo base_url('wishlist/wishlistDetailService/' . $wishlist->id) ?>/';
    scriptData.undoURL = '<?php echo base_url('wishlist/undoRemove') ?>/';
</script>
<script>
    (function(window, $, scriptData, undefined) {
        window.showWishlistController = function($scope, $http) {
            $scope.wislistDetails = array();
            $scope.undo;

            function getWishlistDetail() {
                $http.get(scriptData.detailServiceURL, {cache: false}).success(function(wislistDetails) {
                    $scope.wislistDetails = wislistDetails;
                }).error(function() {

                });
            }
            getWishlistDetail();

            $scope.addToCart = function(detailID) {
                $http.get(scriptData.addToCartURL + detailID, {cache: false}).success(function() {
                    getWishlistDetail();
                }).error(function() {
                    //TODO
                });
            };

            $scope.remove = function(detailID) {
                $http.get(scriptData.removeURL + detailID, {cache: false}).success(function() {
                    getWishlistDetail();
                    $scope.undo = detailID;
                }).error(function() {
                    //TODO
                });
            };

            $scope.undoRemove = function() {
                $http.get(scriptData.undoURL + $scope.undo, {cache: false}).success(function() {
                    getWishlistDetail();
                    $scope.undo = null;
                }).error(function() {
                    //TODO
                });
            };
        };
        $(function() {
            $('.add-to-cart').click(function() {
                $.ajax({
                    cache: false,
                    url: scriptData.addToCartURL,
                    success: function() {
                        window.location.reload();
                    },
                    error: function() {
                        //TODO
                    }
                });
            });
            $('.remove-from-wishlist').click(function() {
                $.ajax({
                    cache: false,
                    url: scriptData.removeURL,
                    success: function() {
                        window.location.reload();
                    },
                    error: function() {
                        //TODO
                    }
                });
            });
        });
    })(window, $, scriptData);
</script>



