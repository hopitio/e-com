<?php
class product_sub_service_client {
	
    public function call_api_get($product_sub_service_url){
        try{
            // create curl resource 
            $ch = curl_init(); 
    
            // set url 
            curl_setopt($ch, CURLOPT_URL, $url); 
    
            //return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    
            // $output contains the output string 
            $output = curl_exec($ch); 
            log_message("error","Can't call service : ". $product_sub_service_url);
            // close curl resource to free up system resources 
            curl_close($ch);
        }catch (Exception $ex){
             log_message("Error",$ex->getMessage(),false);
        }
    }
    
}