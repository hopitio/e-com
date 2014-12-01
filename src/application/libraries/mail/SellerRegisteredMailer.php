<?php

class SellerRegisteredMailler extends AbstractStaff
{

    protected $config_key = 'SellerRegistered';

    protected function buildContent()
    {
        return $this->CI->load->view('mail/SellerRegistered', $this->mailData, true);
    }

    /* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */

    protected function buildTitle()
    {
        return '[Sfriendly] Đơn đăng ký seller';
    }

}
