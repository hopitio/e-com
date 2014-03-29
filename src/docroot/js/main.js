/*
 *Thực hiện các action javascript Cơ bản để page hoạt động.
 * CREATE BY : ANLT 
 * CREATE DATE : 20140328
 */
Window.App;
Window.Config;
$(document).ready(function(){
    Window.App = new App(); 
    Window.Config = new Config();
});

function Context(){}
function App(){
    $.ajaxSetup({ cache: true });
    this.Context = new Context();
    $.getScript('//connect.facebook.net/en_UK/all.js', function(){
        //if(FB == 'undefined'){
            FB.init({
              appId: Window.Config.facebookApplicationKey,
              status     : true,
              cookie     : true,
              xfbml      : true
            });
        //}
    });
}




