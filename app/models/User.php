<?php

/**
 *users model
 */

class User extends Model
{
    public $errors = [];
    protected $table = "users";
    protected $allowedColumns = [
        'email',
        'firstname',
        'lastname',
        'password',
        'role',
        'date',
        'mobile',
        'addres',
        'slug',
        'image',

    ];


    public function validate($data)
    {

        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "A first name is required";
        }
        if (empty($data['lastname'])) {
            $this->errors['lastname'] = "A last name is required";
        }
        if (empty($data['email'])) {
            $this->errors['email'] = "A email is required";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "email is not valid";
        } else if ($this->where(['email' => $data['email']])) {
            $this->errors['email'] = "That email already exists";
        }
        if (empty($data['password'])) {
            $this->errors['password'] = "A password is required";
        }
        if ($data['password'] !== $data['retypepassword']) {
            $this->errors['retypepassword'] = "passwords do not match";
        }
        if (empty($data['terms'])) {
            $this->errors['terms'] = "please accept terms and conditions";
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function edit_validate($data)
    {

        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "A first name is required";
        }
        if (empty($data['lastname'])) {
            $this->errors['lastname'] = "A last name is required";
        }
        if (empty($data['email'])) {
            $this->errors['email'] = "A email is required";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "email is not valid";
        } else if ($this->where(['email' => $data['email']])) {
            $this->errors['email'] = "That email already exists";
        }
        
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}
