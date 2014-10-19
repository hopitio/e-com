<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * | ------------------------------------------------------------------------- | URI ROUTING | ------------------------------------------------------------------------- | This file lets you re-map URI requests to specific controller functions. | | Typically there is a one-to-one relationship between a URL string | and its corresponding controller class/method. The segments in a | URL normally follow this pattern: | | example.com/class/method/id/ | | In some instances, however, you may want to remap this relationship | so that a different class/function is called than the one | corresponding to the URL. | | Please see the user guide for complete details: | | http://codeigniter.com/user_guide/general/routing.html | | ------------------------------------------------------------------------- | RESERVED ROUTES | ------------------------------------------------------------------------- | | There area two reserved routes: | | $route['default_controller'] = 'welcome'; | | This route indicates which controller class should be loaded if the | URI contains no data. In the above example, the "welcome" class | would be loaded. | | $route['404_override'] = 'errors/page_missing'; | | This route will tell the Router what URI segments to use if those provided | in the URL cannot be matched to a valid route. |
 */

if (array_key_exists('REQUEST_METHOD', $_SERVER))
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $route['home'] = 'home/showHome';
        $route['logout'] = 'login/out';
        $route['sitemap'] = 'sitemap/showPage';

        $route['__admin'] = 'admin/mainpage/showpage';
        $route['__admin/mainpage'] = 'admin/mainpage/showpage';

        $route['__admin/seller'] = 'admin/seller/ShowPage';
        $route['api/__admin/seller/find'] = 'admin/sellerAPI/searchSeller';
        $route['api/__admin/seller/upload_image'] = 'admin/sellerAPI/uploadSellerImage/$1';
        $route['api/__admin/seller/change_status/(:num)'] = 'admin/sellerAPI/changeStatus/$1';
        $route['api/__admin/user/(:num)'] = 'admin/userAPI/getGiftUserId/$1';

        $route['seller/order/search'] = "sellerOrder/showPage";
        $route['seller/invoice/(:num)'] = "sellerOrder/invocieDetail/$1";
        
        $route['__admin/product'] = 'admin/product/main';
        $route['__admin/product/svc_all_products'] = 'admin/product/svc_all_products';

        $route['__admin/user_find'] = 'admin/sellerFind/ShowPage';
        $route['__admin/user_find/(:num)/(:num)'] = 'admin/sellerFind/getSellerListXhr/$1/$2';

        $route['__admin/product_find'] = 'admin/sellerFind/ShowPage';
        $route['__admin/product_find/(:num)/(:num)'] = 'admin/sellerFind/getSellerListXhr/$1/$2';

        $route['admin/product'] = 'admin/product/show_list';
        $route['admin/product/show_list'] = 'admin/product/show_list';
			
        $route['__admin/advertisement'] = 'admin/advertisement/main';
        
        $route['__admin/hot'] = 'admin/hot/main';
        $route['__admin/best'] = 'admin/best/main';

        $route['order/place_order'] = 'devPlaceOrder/showPage';
        $route['__mockup/list'] = 'testingController/getMockupScreenList';

        $route['logout'] = "logout/out";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $route['api/__admin/seller/upload_image'] = 'admin/sellerAPI/uploadSellerImage/$1';
        $route['__portal/login_callback'] = 'portalCallbackController/portalProcess/portalAuthen';
        $route['portal/verifyToken'] = 'portalController/login/verifyToken';
        $route['__admin/login'] = 'admin/loginAdmin/login';
        $route['__admin/seller/add'] = 'admin/seller/add';
        $route['__admin/advertisement'] = 'admin/advertisement/update';
        $route['__admin/hot'] = 'admin/hot/update';
        $route['__admin/best'] = 'admin/best/update';
        $route['__admin/seller/edit/(:num)'] = 'admin/seller/edit/$1';
    }
}
//






/* End of file routes.php */
/* Location: ./application/config/routes.php */
