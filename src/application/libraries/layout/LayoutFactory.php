<?php

class LayoutFactory
{

    CONST TEMP_ONE_COl = 'TEMP_ONE_COL';
    CONST TEMP_TOW_COL = 'TEMP_TOW_COL';
    CONST TEMP_PORTAL_ONE_COL = 'TEMP_PORTAL_ONE_COL';
    CONST TEMP_ADMIN = 'TEMP_ADMIN';
    CONST TEMP_CONTENT_ONLY = 'TEMP_CONTENT_ONLY';

    /**
     * get template render.
     * 
     * @param unknown $templateName            
     * @throws Exception
     * @return AbstractLayout
     */
    static function getLayout($templateName = self::TEMP_ONE_COl)
    {
        switch ($templateName)
        {
            case self::TEMP_ONE_COl:
                return new OneColumnLayout();
                break;
            case self::TEMP_TOW_COL:
                return new TowColumnLayout();
                break;
            case self::TEMP_PORTAL_ONE_COL:
                return new PortalOneColumnLayout();
                break;
            case self::TEMP_ADMIN:
                return new AdminLayout();
                break;
            case self::TEMP_CONTENT_ONLY:
                return new ContentOnlyLayout();
                break;
            default:
                throw new Exception('Template not supported');
                break;
        }
    }

}
