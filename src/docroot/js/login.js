/*
 * 
 *Thực hiện các action javascript liên quan đến login page.
 * CREATE BY : ANLT 
 * CREATE DATE : 20140327
 */

$(document).ready(function(){
    $('#resg input[name="dob"]').datepicker({ dateFormat: "yy-mm-dd" });
    $('#likfacebooklogin').click(facebookAuthenicate);
});

function facebookAuthenicate()
{
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            getApiMe();
          return;
        }
        FB.login(function(loginResponse){
            if (loginResponse.status === 'connected') {
                getApiMe();
                return;
              }
        },{scope:'email,user_birthday'});
       });
}

function getApiMe(){
    FB.api('/me',function(response){
        $('#facebooklogin').find('input[name="postValue"]').val(JSON.stringify(response));
        var frm = $('#facebooklogin');
        frm.submit();
        console.log(response);
    });
}




