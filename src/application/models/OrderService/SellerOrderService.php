<?php
/**
 * cung cấp hàm xử lý thông tin về seller.
 * @author ANLT
 *
 */
class SellerOrderService{
    
    function __construct() {
        
    }
    
    function getSellerProducts($sellerId, $page = 1, $pageCount = 20){
        $productResposity = new PortalModelProduct();
        $productResposity->seller_id = $sellerId;
        return $productResposity->getMutilCondition(T_product::created_at,"DESC",$pageCount, ($page-1) * $pageCount);
    }
    
    function getSellerOrders($sellerId, $page = 1, $pageCount = 20){
        $invoices = $this->getSellerInvoices($sellerId);
        $orderRepository = new PortalModelOrder();
        $orders = $orderRepository->getOrderByInvoices($invoices);
        
        $currentPageOrders = array();
        $startedIndex = ($page - 1) * $pageCount;
        $endedIndex = $startedIndex + $pageCount;
        for($i = $startedIndex; $i < $endedIndex + 1; $i++){
            if($i < count($orders)){
                continue;
            }
            array_push($currentPageOrders, $orders[$i]);
        }
        return $currentPageOrders;
    }
    
    function getSellerInvoices($sellerId){
        $productResposity = new PortalModelProduct();
        $productResposity->seller_id = $sellerId;
        $products = $productResposity->getMutilCondition();
        
        $invoiceProductsResository = new PortalModelInvoiceProduct();
        $productInvoices =  $invoiceProductsResository->getProductionByProductsId($products);
        
        $invoicesRepository = new PortalModelInvoice();
        return $invoicesRepository->getInvoicesByInvoicesId();
    }
    
    function getSellerOrdersFullInformation($sellerId,$orders){
        $orderInfos = array();
        $servicePaymentHistory = new PortalBizPaymentHistory();
        foreach ($orders as $order){
            array_push($orderInfos, $servicePaymentHistory->getOrderAllInformation($order->id));
        }
        foreach ($orderInfos as $order){
            foreach($order->invoices  as $invoice){
                foreach ($invoice->products as $product){
                    $index = array_search($product, $invoice->products);
                    unset($invoice->products[$i]);
                }
            }
        }
        return $orderInfos;
    }
    
}