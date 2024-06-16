<?php

/**
 *product model
 */

class Product_model extends Model
{
    public $errors = [];
    protected $table = "product";
    protected $allowedColumns = [
        'id',
        'user_id',
        'title',
        'category_id',
        'description',
        'price',
        'date',
        'stock',
        'color',
        'tags',
        'image1',
        'image2',
        'image3',
        'image4',
        'approved',
        'published',
        
        
    ];


    public function validate($data)
    {

        $this->errors = [];

        if (empty($data['title'])) {
            $this->errors['title'] = "A Product name is required";
        }else if (!preg_match("/^[a-zA-Z \-\_\&]+$/", trim($data['title']))) {
            $this->errors['title'] = "first name can only have letters, spaces[-_&]";
        }
        if (empty($data['category_id'])) {
            $this->errors['category_id'] = "A category  is required";
        }
        
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function edit_validate($data ,$id)
    {

        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "A first name is required";
        }else if (!preg_match("/^[a-zA-Z]+$/", trim($data['firstname']))) {
            $this->errors['firstname'] = "first name can only have letters without spaces";
        }
        if (empty($data['lastname'])) {
            $this->errors['lastname'] = "A last name is required";
        }else if (!preg_match("/^[a-zA-Z]+$/", trim($data['lastname']))) {
            $this->errors['lastname'] = "last name can only have letters without spaces";
        }
        if (empty($data['email'])) {
            $this->errors['email'] = "A email is required";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "email is not valid";
        } else if ($result = $this->where(['email' => $data['email']])) {
            foreach ($result as $result) {
                if($id != $result->id){
                    $this->errors['email'] = "That email already exists";
                }
            }
            
        }
        if (empty($data['address'])) {
            $this->errors['address'] = "Address is required";
        }
        if (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}+$/", trim($data['mobile']))) {
            $this->errors['mobile'] = "mobile number is required";
        }
        
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}
