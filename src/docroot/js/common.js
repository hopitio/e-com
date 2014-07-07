
function Common(){
    this.onLoading = function() {
        $("body").append("<div id='pageMask'></div>");
        $("#pageMask").css("display", "block");
    };
    
    this.onLoaded = function() {
        $("#pageMask").css("display", "none");
    };
    
    this.getParameterByName = function(name) {
           name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
           var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
               results = regex.exec(location.search);
           return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    };
}
var AppCommon =  new Common();