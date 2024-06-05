<?php


class Register extends Controller
{
   public function index()
   {
     $data['errors'] = [];
       $user = new User();
      if($user->validate($_POST)){
         $_POST['date'] = date("y-m-d H:i:s");
         $_POST['role'] = "user";
         $user->insert($_POST);
         
      }

       
      $data['errors'] = $user->errors;
      $data['tittle'] = "Register";
      $this->view('register', $data);
   }
}
