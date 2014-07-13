<?php
//COMMON
require_once $system_path.'core/Model.php';
//SUB SYSTEM
require_once APPPATH.'models/modelEx/BaseModel.php';
require_once APPPATH.'models/modelEx/AdminAccountModel.php';
require_once APPPATH.'models/modelEx/SellerModel.php';
require_once APPPATH.'models/modelEx/UserModel.php';
require_once APPPATH.'models/modelEx/FileModel.php';

//portal
require_once APPPATH.'models/modelEx/PortalModelBase.php';
require_once APPPATH.'models/modelEx/PortalModelCommon.php';
require_once APPPATH.'models/modelEx/PortalModelInvoice.php';
require_once APPPATH.'models/modelEx/PortalModelInvoiceOtherCost.php';
require_once APPPATH.'models/modelEx/PortalModelInvoiceProduct.php';
require_once APPPATH.'models/modelEx/PortalModelInvoiceShipping.php';
require_once APPPATH.'models/modelEx/PortalModelLogin.php';
require_once APPPATH.'models/modelEx/PortalModelOrder.php';
require_once APPPATH.'models/modelEx/PortalModelPaymentTemp.php';
require_once APPPATH.'models/modelEx/PortalModelProduct.php';
require_once APPPATH.'models/modelEx/PortalModelTax.php';
require_once APPPATH.'models/modelEx/PortalModelUser.php';
require_once APPPATH.'models/modelEx/PortalModelUserContact.php';
require_once APPPATH.'models/modelEx/PortalModelUserHistory.php';
require_once APPPATH.'models/modelEx/PortalModelUserSetting.php';
require_once APPPATH.'models/modelEx/PortalModelOrderStatus.php';



//payment portal
require_once APPPATH.'models/payment/payment.inc';






