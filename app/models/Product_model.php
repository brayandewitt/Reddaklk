<?php

/**
 *product model
 */

class Product_model extends Model
{
    public $errors = [];
    protected $table = "product";

    protected $afterSelect = [
        'get_catergory',
        'get_user',
        'get_price',
        'get_color',
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'id',
        'user_id',
        'title',
        'category_id',
        'description',
        'price_id',
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
        } else if (!preg_match("/^[a-zA-Z \-\_\&]+$/", trim($data['title']))) {
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

    public function edit_validate($data, $id)
    {

        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "A first name is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", trim($data['firstname']))) {
            $this->errors['firstname'] = "first name can only have letters without spaces";
        }
        if (empty($data['lastname'])) {
            $this->errors['lastname'] = "A last name is required";
        } else if (!preg_match("/^[a-zA-Z]+$/", trim($data['lastname']))) {
            $this->errors['lastname'] = "last name can only have letters without spaces";
        }
        if (empty($data['email'])) {
            $this->errors['email'] = "A email is required";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "email is not valid";
        } else if ($result = $this->where(['email' => $data['email']])) {
            foreach ($result as $result) {
                if ($id != $result->id) {
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



    protected function get_catergory($rows)
    {
        $db = new Database();
        if (!empty($rows[0]->category_id)) {
            foreach ($rows as $key => $row) {
                $query = "SELECT * FROM `categories` WHERE id = :id LIMIT 1";
                $categorey =  $db->query($query, ['id' => $row->category_id]);
                if (!empty($categorey)) {
                    $rows[$key]->category_row = $categorey[0];
                }
            }
        }

        return $rows;
    }
    protected function get_user($rows)
    {
        $db = new Database();
        if (!empty($rows[0]->user_id)) {
            foreach ($rows as $key => $row) {
                $query = "SELECT firstname, lastname, role FROM users WHERE id = :id LIMIT 1";
                $user =  $db->query($query, ['id' => $row->user_id]);
                if (!empty($user)) {
                    $user[0]->name = $user[0]->firstname . ' ' . $user[0]->lastname;
                    $rows[$key]->user_row = $user[0];
                }
            }
        }

        return $rows;
    }
    protected function get_price($rows)
    {
        $db = new Database();
        if (!empty($rows[0]->price_id)) {
            foreach ($rows as $key => $row) {
                $query = "SELECT * FROM prices WHERE id = :id LIMIT 1";
                $price =  $db->query($query, ['id' => $row->price_id]);
                if (!empty($price)) {
                    $price[0]->name = $price[0]->name . ' (Rs.' . $price[0]->price.')';
                    $rows[$key]->price_row = $price[0];
                }
            }
        }

        return $rows;
    }
    protected function get_color($rows)
    {

        return $rows;
    }
}
