<?php

class FileModel extends BaseModel
{

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
        $path = 'uploads/' . date_create(DB::getDate())->format('Y/m/d') . '/';
        $destination = dirname(BASEPATH) . '/docroot/' . $path;
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
                    'date_modified' => DB::getDate()
        ));
        if (!$insertResult)
        {
            throw new Lynx_BusinessLogicException("Insert file that bai");
        }
        return $insertResult;
    }

}
