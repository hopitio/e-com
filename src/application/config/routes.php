<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
    /*
 * | ------------------------------------------------------------------------- | URI ROUTING | ------------------------------------------------------------------------- | This file lets you re-map URI requests to specific controller functions. | | Typically there is a one-to-one relationship between a URL string | and its corresponding controller class/method. The segments in a | URL normally follow this pattern: | | example.com/class/method/id/ | | In some instances, however, you may want to remap this relationship | so that a different class/function is called than the one | corresponding to the URL. | | Please see the user guide for complete details: | | http://codeigniter.com/user_guide/general/routing.html | | ------------------------------------------------------------------------- | RESERVED ROUTES | ------------------------------------------------------------------------- | | There area two reserved routes: | | $route['default_controller'] = 'welcome'; | | This route indicates which controller class should be loaded if the | URI contains no data. In the above example, the "welcome" class | would be loaded. | | $route['404_override'] = 'errors/page_missing'; | | This route will tell the Router what URI segments to use if those provided | in the URL cannot be matched to a valid route. |
 */

$route['default_controller'] = "sysController/home/showHome";
$route['404_override'] = 'error/notFound';

if (array_key_exists('REQUEST_METHOD', $_SERVER))
{
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
         $route['home'] = 'home/showHome';
         $route['logout'] = 'login/out';
         $route['sitemap'] = 'sitemap/showPage';
         
         $route['order/place_order'] = 'devPlaceOrder/showPage';
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $route['__portal/callback'] = 'portalCallbackController/portalProcess/portalAuthen';
    }
    
    //portal/////////////////////////////////////////////////////////////////////////////////////
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $route['portal/login'] = 'portalController/login/showPage';
        $route['portal/loginComplete'] = 'portalController/login/loginCompleteShowPage';
        $route['portal/account'] = 'portalController/account/showPage';
        $route['portal/active'] = 'portalController/activeAccount/active';
        $route['portal/change_password'] = 'portalController/password/showpageChangePassword';
        $route['portal/reset_password'] = 'portalController/passwordUnauthen/resetPassword';
        $route['portal/change_user_information'] = 'portalController/userInformation/showpage';
        $route['portal/payment_choice_open'] = 'portalController/paymentChoice/showPage';
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $route['portal/login'] = 'portalController/login/indexPost';
        $route['portal/login/facbook_callback'] = 'portalController/platform/facebook/authenCallback';
        $route['portal/login/facebook'] = 'portalController/loginfacebook/loginFb';
        $route['portal/change_password'] = 'portalController/password/updatePasswordPostData';
        $route['portal/change_user_information'] = 'portalController/userInformation/saveChange';
        $route['portal/payment_choice'] = 'portalController/paymentChoiceUnauthen/getInformation';
        
    }
}
//






/* End of file routes.php */
/* Location: ./application/config/routes.php */
