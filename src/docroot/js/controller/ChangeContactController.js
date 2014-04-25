
function ChangeContactController($scope,$http)
{
    $(function(){
        $(document).on('click','#btnComfirm',function(){
            $('#frmChangePassword').submit();
        });
    });
    
    $scope.error = "";
    if($('input[name="error"]').length > 0){
        $scope.error = $('input[name="error"]').attr('value');
    }
    
    $scope.closeAlert = function(){
        $scope.error = "";
    };
}
SortController.$inject = ['$scope','$http'];