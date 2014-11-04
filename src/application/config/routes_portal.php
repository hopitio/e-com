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
        $route['portal/page/policy'] = 'portalController/staticPage/showPolicy';
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
        $route['portal/api/account/last_login/(:num)'] = "portalController/userSecurity/getUserLastLoginTimeXhr/$1";
        $route['portal/api/account/get_user_information'] = "portalController/userInformation/getUserInformationXhr";
        $route['portal/api/account/get_user_contacts'] = "portalController/userInformation/getUserContactXhr";
        $route['portal/account/order_history'] = 'portalController/userOrderHistory/showPage';
        $route['portal/api/account/order_history/(:any)'] = 'portalController/userOrderHistory/getOrderHistory/$1';
        $route['portal/api/product/gift/(:num)/selled_time'] = 'portalController/apiProduct/getSelledProductTime/$1';
        $route['protal/api/invoice/(:num)'] = 'portalController/apiInvoice/getInvoice/$1';

        $route['portal/payment_choice'] = 'portalController/paymentChoiceUnauthen/showPageRedirect';
        $route['portal/payment_choice_open'] = 'portalController/paymentChoice/showPage';

        $route['portal/order_verifing/verify'] = 'portalController/orderVerifingAuthenicated/orderPlaceVerifyOrder';

        $route['portal/ngan-luong/callback/success'] = 'portalController/orderNganLuongCallback/success';
        $route['portal/ngan-luong/callback/cancel'] = 'portalController/orderNganLuongCallback/cancel';

        $route['portal/order_verifing/portal_get_information'] = 'portalController/orderVerifing/userAuthenVerify';
        $route['portal/order_place/payment_choice'] = 'portalController/paymentChoice/showPage';

        $route['portal/__admin'] = 'portalAdmin/dashboard/showPage';
        $route['portal/__admin/user_find'] = 'portalAdmin/userList/showPage';
        $route['portal/__admin/user/(:num)'] = 'portalAdmin/userDetail/showPage/$1';
        $route['portal/__admin/invoice/(:num)'] = 'portalAdmin/invoiceDetail/showPage/$1';

        $route['portal/__mock/ngan_luong_payment'] = 'mock/mockNganLuongPayment/mockPaymentNganLuong';
        $route['portal/__admin/login'] = 'portalAdmin/portalLoginAdmin/showpage';
        $route['portal/__admin/order_find'] = 'portalAdmin/orderList/showpage';
        $route['portal/__admin/order/(:num)'] = 'portalAdmin/orderDetail/showpage/$1';
        $route['portal/__admin/order/(:num)/add_invoice'] = 'portalAdmin/addInvoice/showPage/$1';
        $route['portal/__admin/order/(:num)/refuned'] = 'portalAdmin/orderRefuned/showPage/$1';

        $route['portal/api/__admin/user/(:num)/contact'] = 'portalAdmin/apiUser/contact/$1';
        $route['portal/api/__admin/user/(:num)/setting'] = 'portalAdmin/apiUser/setting/$1';

        $route['portal/api/__admin/order/(:num)'] = 'portalAdmin/apiOrder/getOrder/$1';
        $route['portal/api/__admin/order/(:num)/invoices'] = 'portalAdmin/apiOrder/getInvoices/$1';
        $route['portal/api/__admin/order/(:num)/status_histories'] = 'portalAdmin/apiOrder/getOrderStatusHistory/$1';

        $route['portal/api/__admin/invoice/(:num)'] = 'portalAdmin/apiInvoice/getInvoiceFullInformation/$1';
        $route['portal/api/__admin/invoice/(:num)/products'] = 'portalAdmin/apiInvoice/getInvoiceProducts/$1';
        $route['portal/api/__admin/invoice/(:num)/other_costs'] = 'portalAdmin/apiInvoice/getInvoiceOtherCost/$1';
        $route['portal/api/__admin/invoice/(:num)/shippings'] = 'portalAdmin/apiInvoice/getInvoiceShipping/$1';
        $route['portal/api/__admin/contact/(:num)'] = 'portalAdmin/apiContact/getContact/$1';

        $route['portal/api/user/find'] = "portalController/apiUser/findUser";
        $route['portal/dialog/user/find'] = "portalController/account/showDialog";

        $route['portal/__test/order_request'] = 'testingController/getMockupOrderRequest';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $route['portal/__admin/invoice/(:num)/update_paided_date'] = 'portalAdmin/invoiceDetail/updatePaidedDate/$1';
        $route['portal/__admin/invoice/(:num)/destroy'] = 'portalAdmin/invoiceDetail/destroy/$1';

        $route['portal/login'] = 'portalController/login/indexPost';
        $route['portal/login/facbook_callback'] = 'portalController/platform/facebook/authenCallback';
        $route['portal/login/facebook'] = 'portalController/loginfacebook/loginFb';
        $route['portal/help/send_email'] = 'portalController/help/send_email';
        $route['portal/help/start_chat'] = 'portalController/help/start_chat';
        $route['portal/order/submit'] = 'portalController/paymentChoice/submitOrder';
        $route['portal/api/account/update_password'] = 'portalController/userSecurity/updatePasswordPostDataXhr';
        $route['portal/api/account/update_alert_email'] = 'portalController/userSecurity/updateAlertEmailXhr';
        $route['portal/api/account/update_user_information'] = 'portalController/userInformation/updateUserinformationXhr';
        $route['portal/api/account/save_contact'] = 'portalController/userInformation/saveUserinformationXhr';
        $route['portal/api/language/submit_change'] = 'portalController/userLanguage/submitChangeXhr';
        $route['api/language/submit_change'] = 'userLanguage/submitChangeXhr';
        $route['portal/account/lost_password'] = 'portalController/lostPassword/reset';
        $route['portal/api/account/order_history/cancel_order'] = "portalController/userOrderHistory/cancelOrder";
        $route['protal/api/gift/seller/(:num)/search'] = 'portalController/apiSeller/searchSellerProduct/$1';

        $route['portal/order_verifing/portal_get_information'] = 'portalController/orderVerifing/saveInformation';
        $route['portal/order_verifing/email_verify'] = 'portalController/orderVerifing/mergeEmail';

        $route['portal/order_place/review'] = 'portalController/orderReview/showPage';
        $route['portal/order_place/submit_order_gateway'] = "portalController/orderReview/submitOrder";
        $route['portal/__admin/login'] = 'portalAdmin/portalLoginAdmin/login';

        $route['portal/api/__admin/user_find_post_xhr'] = "portalAdmin/apiUser/searchUserInformationXhr";
        $route['portal/api/__admin/user/(:num)/history'] = 'portalAdmin/apiUser/history/$1';
        $route['portal/api/__admin/user/(:num)/reject_login'] = 'portalAdmin/apiUser/rejectLoginAccount/$1';
        $route['portal/api/__admin/user/(:num)/open_login'] = 'portalAdmin/apiUser/openLoginAccount/$1';
        $route['portal/api/__admin/order_find_post_xhr'] = "portalAdmin/apiOrder/findOrderXhr";
        $route['portal/__admin/order/(:num)/refuned'] = "portalAdmin/orderRefuned/postOrderRefuned/$1";

        $route['portal/api/__admin/order/(:num)/status_next'] = "portalAdmin/orderDetail/nextUpdateStatus/$1";
        $route['portal/api/__admin/order/(:num)/status_back'] = "portalAdmin/orderDetail/backOrderStatus/$1";
        $route['portal/api/__admin/order/(:num)/status_reject'] = "portalAdmin/orderDetail/rejectOrder/$1";
    }
}
//






/* End of file routes.php */
/* Location: ./application/config/routes.php */
