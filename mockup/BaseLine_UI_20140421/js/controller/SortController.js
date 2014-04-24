function SortController($scope,$http) {
    $scope.items = [
    "The first choice!",
    "And another choice for you.",
    "but wait! A third!"];

}
SortController.$inject = [ '$scope', '$http' ];