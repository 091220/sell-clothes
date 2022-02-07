<?php

namespace Infrastructure\Libraries;

class HelperFunction
{

    public function saveImage($data, $field, $_id = null)
    {
        if (!@$data[$field]){
            return $data;
        }
        $id         = (string)\Str::uuid();
        $image      = $data[$field];
        $extension  = explode('.',$image->getClientOriginalName());
        $file_name  = $id.'_image.'.$extension[1];
        $image->move('images/uploads', $file_name);
        $data[$field] = $file_name;
        if(!$_id){
            $data['id'] = $id;
        }
        return $data;
    }

    public function updateImage($data, $row, $field)
    {
        if (!@$data[$field]){
            return $data;
        }
        //delete image
        $this->deleteImage($row->$field);
        //create image
        $file_name = $this->saveImage($data,$field)[$field];
        $data[$field] = $file_name;
        return $data;
    }

    public function deleteImage($file_name)
    {
        $path = 'images/uploads/'.$file_name;
        if(\File::exists($path)) {
            \File::delete($path);
        }
    }

}
