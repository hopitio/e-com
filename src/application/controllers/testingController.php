<?php
/**
 * Chứa các hàm liên quan đến testing
 * @author ANLT
 *
 */
class testingController extends BaseController{
    function getMockupScreenList(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
        ->setCss(
            array('/style/list.css')
        )
        ->render('product/list');
    }
    
    function getMockupOrderRequest (){
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
        ->setData(array(),false)
        ->setCss(array('/style/list.css'))
        ->render('portalOrder/testorder');
    }
    
}