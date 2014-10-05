<?php

class FileModel extends BaseModel
{

    protected $_upload_root;

    function __construct()
    {
        parent::__construct();
        if (DIRECTORY_SEPARATOR == "\\")
        {
            $this->_upload_root = dirname(BASEPATH) . '/docroot/uploads/';
        }
        else
        {
            $this->_upload_root = '/var/www/uploads/';
        }
    }

    function handleImageUpload($fileInfo)
    {
        //validate
        if ($fileInfo['size'] > 2000000) //2MB
        {
            throw new Lynx_RequestException('Maximum size exceeded');
        }
        $dotPosition = strrpos($fileInfo['name'], '.');
        $extension = '';
        if ($dotPosition !== false)
        {
            $extension = substr($fileInfo['name'], $dotPosition + 1);
        }
        $newName = md5(uniqid()) . '.' . $extension;
        $path = date_create(DB::getDate())->format('Y/m/d') . '/';
        $destination = $this->_upload_root . $path;
        if (!is_dir($destination) && !mkdir($destination, 0777, true))
        {
            throw new Lynx_BusinessLogicException("Khong tao duoc dir: '$destination'");
        }
        if (!move_uploaded_file($fileInfo['tmp_name'], $destination . $newName))
        {
            throw new Lynx_BusinessLogicException("Khong chuyen duoc file den vi tri upload");
        }
        $insertResult = DB::insert('t_file', array(
                    'fk_user'       => User::getCurrentUser()->id,
                    'url'           => '/' . $path . $newName,
                    'date_modified' => DB::getDate(),
                    'internal_path' => $path . $newName
        ));
        if (!$insertResult)
        {
            throw new Lynx_BusinessLogicException("Insert file that bai");
        }
        return $insertResult;
    }

    function delete($id)
    {
        $instance = FileMapper::make()->filterID($id)->find();
        /* @var $instance FileDomain */
        if (!$instance->id)
        {
            throw new Lynx_BusinessLogicException('Could not find t_file record, cancel delete: ' . $id);
        }
        $filename = FCPATH . '/' . $instance->internalPath;
        if (!file_exists($filename))
        {
            return;
        }
        DB::delete('t_file', 'id=?', array($id));
        unlink($filename);
    }

}
