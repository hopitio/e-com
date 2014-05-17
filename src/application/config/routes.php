<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * | ------------------------------------------------------------------------- | URI ROUTING | ------------------------------------------------------------------------- | This file lets you re-map URI requests to specific controller functions. | | Typically there is a one-to-one relationship between a URL string | and its corresponding controller class/method. The segments in a | URL normally follow this pattern: | | example.com/class/method/id/ | | In some instances, however, you may want to remap this relationship | so that a different class/function is called than the one | corresponding to the URL. | | Please see the user guide for complete details: | | http://codeigniter.com/user_guide/general/routing.html | | ------------------------------------------------------------------------- | RESERVED ROUTES | ------------------------------------------------------------------------- | | There area two reserved routes: | | $route['default_controller'] = 'welcome'; | | This route indicates which controller class should be loaded if the | URI contains no data. In the above example, the "welcome" class | would be loaded. | | $route['404_override'] = 'errors/page_missing'; | | This route will tell the Router what URI segments to use if those provided | in the URL cannot be matched to a valid route. |
 */

$route['default_controller'] = "home/showHome";
$route['404_override'] = 'error/notFound';

if (array_key_exists('REQUEST_METHOD', $_SERVER))
{

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $route['home'] = 'home/showHome';
        $route['logout'] = 'login/out';
        $route['sitemap'] = 'sitemap/showPage';
        $route['__admin/login'] = 'admin/loginAdmin/showpage';
        $route['__admin/mainpage'] = 'admin/mainpage/showpage';
        $route['__admin/seller_find'] = 'admin/sellerFind/ShowPage';
        $route['__admin/seller_find/(:num)/(:num)'] = 'admin/sellerFind/getSellerListXhr/$1/$2';
        $route['__admin/user_find'] = 'admin/sellerFind/ShowPage';
        $route['__admin/user_find/(:num)/(:num)'] = 'admin/sellerFind/getSellerListXhr/$1/$2';
        $route['__admin/product_find'] = 'admin/sellerFind/ShowPage';
        $route['__admin/product_find/(:num)/(:num)'] = 'admin/sellerFind/getSellerListXhr/$1/$2';
        $route['admin/product'] = 'admin/product/show_list';
        $route['admin/product/show_list'] = 'admin/product/show_list';
        $route['order/place_order'] = 'devPlaceOrder/showPage';
        
        
        $route['__mockup/list'] = 'testingController/getMockupScreenList';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $route['__portal/callback'] = 'portalCallbackController/portalProcess/portalAuthen';
        $route['portal/verifyToken'] = 'portalController/login/verifyToken';
        $route['__admin/login'] = 'admin/loginAdmin/login';
    }

    //portal/////////////////////////////////////////////////////////////////////////////////////
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $route['portal/page/(:any)'] = 'staticPage/showPage/$1';
        $route['portal/login'] = 'portalController/login/showPage';
        $route['portal/loginComplete'] = 'portalController/login/loginCompleteShowPage';
        $route['portal/active'] = 'portalController/activeAccount/active';
        $route['portal/change_password'] = 'portalController/password/showpageChangePassword';
        $route['portal/reset_password'] = 'portalController/passwordUnauthen/resetPassword';
        
        $route['portal/admin/support'] = 'portalAdmin/support/showPage';
        $route['portal/help/contact_us'] = 'portalController/help/contact_us';
        $route['portal/help/contact_by_email'] = 'portalController/help/contact_by_email';
        $route['portal/help/contact_by_chat'] = 'portalController/help/contact_by_chat';
        
        $route['portal/account/lost_password'] = 'portalController/lostPassword/showPage';
        $route['portal/policy'] = 'portalController/lostPassword/showPage';
        $route['portal/account'] = 'portalController/userInformation/showPage';
        $route['portal/account/user_information'] = 'portalController/userInformation/showPage';
        $route['portal/account/security'] = "portalController/userSecurity/showPage";
        $route['portal/account/last_login/(:num)'] = "portalController/userSecurity/getUserLastLoginTimeXhr/$1";
        $route['portal/account/get_user_information'] = "portalController/userInformation/getUserInformationXhr";
        $route['portal/account/get_user_contacts'] = "portalController/userInformation/getUserContactXhr";
        $route['portal/account/order_history'] = 'portalController/userOrderHistory/showPage';
        $route['portal/account/order_history/(:any)'] = 'portalController/userOrderHistory/getOrderHistory/$1';
        
        $route['portal/payment_choice'] = 'portalController/paymentChoiceUnauthen/showPageRedirect';
        $route['portal/payment_choice_open'] = 'portalController/paymentChoice/showPage';
        
        $route['portal/order_place/verify'] = 'portalController/orderPlace/orderPlaceVerifyOrder';
        $route['portal/order/nganluong_callback'] = 'portalController/orderNganLuongCallback/showPage';
        
        $route['portal/order/nganluong_sync'] = 'portalController/syncNganLuong/index';
        
        $route['portal/__admin'] = 'portalAdmin/dashboard/showPage';
        $route['portal/__admin/user_find'] = 'portalAdmin/userList/showPage';
        $route['portal/__admin/user/(:num)'] = 'portalAdmin/userDetail/showPage/$1';
        
        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $route['portal/login'] = 'portalController/login/indexPost';
        $route['portal/login/facbook_callback'] = 'portalController/platform/facebook/authenCallback';
        $route['portal/login/facebook'] = 'portalController/loginfacebook/loginFb';
        $route['portal/help/send_email'] = 'portalController/help/send_email';
        $route['portal/help/start_chat'] = 'portalController/help/start_chat';
        $route['portal/order/submit'] = 'portalController/paymentChoice/submitOrder';
        $route['portal/account/update_password'] = 'portalController/userSecurity/updatePasswordPostDataXhr';
        $route['portal/account/update_alert_email'] = 'portalController/userSecurity/updateAlertEmailXhr';
        $route['portal/account/update_user_information'] = 'portalController/userInformation/updateUserinformationXhr';
        $route['portal/account/save_contact'] = 'portalController/userInformation/saveUserinformationXhr';
        $route['portal/language/submit_change'] = 'portalController/userLanguage/submitChangeXhr';
        $route['language/submit_change'] = 'userLanguage/submitChangeXhr';
        $route['portal/account/lost_password'] = 'portalController/lostPassword/reset';
        
        
        $route['portal/order_place/portal_get_information'] = 'portalController/orderPlace/getInformation';
        $route['portal/order_place/payment_choice'] = 'portalController/paymentChoice/showPage';
        $route['portal/order_place/review'] = 'portalController/orderReview/showPage';
        $route['portal/order_place/submit_order_gateway'] = "portalController/orderReview/submitOrder";
        $route['portal/__admin/user_find_post_xhr'] ="portalAdmin/userList/searchUserInformationXhr";
        
        $route['portal/__admin/user/(:num)/contact'] = 'portalAdmin/userDetail/contact/$1';
        $route['portal/__admin/user/(:num)/history'] = 'portalAdmin/userDetail/history/$1';
    }
}
//






/* End of file routes.php */
/* Location: ./application/config/routes.php */
