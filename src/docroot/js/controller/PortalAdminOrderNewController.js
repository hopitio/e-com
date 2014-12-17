function PortalAdminOrderNewController($scope,$http)
{
	$scope.ORDER_INFORMATION = "ORDER_INFORMATION.html";
	$scope.INVOICE_INFORMATION = "INVOICE_INFORMATION.html";
	$scope.PRODUCTS_INFORMATION = "PRODUCTS_INFORMATION.html";
	$scope.OTHERCOST_INFORMATION = "OTHERCOST_INFORMATION.html";
	$scope.OVERVIEW_INFORMATION = "OVERVIEW_INFORMATION.html";
	$scope.viewTemplate = $scope.ORDER_INFORMATION;
	$scope.changeStep = function(view){
		$scope.viewTemplate = view;
	};
	
	var current_date = formatDate(new Date(),"dd/MM/yyyy");
	$scope.orderInformation = {
		subSys : "GIFT",
		createdDate : current_date ,
		user : ""
	}; 
	
	$scope.invoiceInformation = {
		comment : "",
		shippingPrice : 0,
		shippingMethodName : "",
		estimateMax  :"",
		estimateMin  :"",
		shippingAddressOnly : true, 
		shipping  : {
			fullName : "",
			telephone : "",
			stateProvince : "",
			city : "",
			streetAddress : "",
		},
		payAddress : {
			fullName : "",
			telephone : "",
			stateProvince : "",
			city : "",
			streetAddress : "",
		}
	};
	$scope.products = [];
	$scope.selectedProduct = {};
	$scope.addNewProduct = function(){
		var dumpProduct = {
				subId : "",
				name : "",
				subImage : "",
				shortDescription : "",
				sellPrice : 0,
				sellerEmail : "",
				sellerName : "",
				productPrices : 0,
				productQuantity : 1,
				productUrl : ""
		};
		$scope.products.push({});
		angular.copy(dumpProduct, $scope.products[$scope.products.length - 1]);
		$scope.setSelectedProduct($scope.products[$scope.products.length - 1]);
	};
	$scope.setSelectedProduct = function(product){
		$scope.selectedProduct = product;
	};
	$scope.removeNewProduct = function(){
		var index = $scope.products.indexOf($scope.selectedProduct);
		$scope.products.splice(index, 1);
		$scope.selectedProduct = {};
	};
	
	$scope.otherCosts = [];
	$scope.selectedOtherCosts = {};
	$scope.addNewOtherCost = function(){
		var dumpOtherCost = {
				prices : 0,
				description : ""
		};
		$scope.otherCosts.push({});
		angular.copy(dumpOtherCost, $scope.otherCosts[$scope.otherCosts.length - 1]);
		$scope.setSelectedOtherCost($scope.otherCosts[$scope.otherCosts.length - 1]);
	};
	$scope.setSelectedOtherCost = function(cost){
		$scope.selectedOtherCosts = cost;
	};
	$scope.removeNewOtherCost = function(){
		var index = $scope.otherCosts.indexOf($scope.selectedOtherCosts);
		$scope.otherCosts.splice(index, 1);
		$scope.selectedOtherCosts = {};
	};
	$scope.errors =  [];
	$scope.submit = function(){
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!re.test($scope.orderInformation.user)){
			$scope.errors.push("Email chưa đúng định dạng");
			return;
		}
		$data = {
			orderInformation : $scope.orderInformation,
			invoiceInformation : $scope.invoiceInformation,
			products : $scope.products,
			otherCosts : $scope.otherCosts
		};
		$("#post-data").val(JSON.stringify($data));
		$("#sub-form").submit();
	};
	
	
    
}
PortalAdminOrderNewController.$inject = ['$scope','$http'];