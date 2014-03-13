<?php
/**
 * Create tow columns layout.
 * @author ANLT
 * @author
 */
class OneColumnLayout extends AbstractLayout{
    
   
    
    /* (non-PHPdoc)
     * @see AbstractLayout::render()
     */
    public function render($name, $view_data = array())
    {
        $this->_CI->load->view('layout/one_colmun');
    }
    
    /* (non-PHPdoc)
     * @see AbstractLayout::__construct()
     */
    public function __construct()
    {
        parent::__construct();
        $this->_layout = 'layout/one_colmun';
    }

    


}