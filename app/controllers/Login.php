<?php


class Login extends Controller
{
   public function index()
   {
      $data['errors'] = [];
      $data['tittle'] = "Login";
      $user = new User();

      if($_SERVER['REQUEST_METHOD'] == "POST"){
         //validate 

         $row = $user->first([
            'email'=>$_POST['email'],
         ]);

         
      

         if($row){
               if(password_verify($_POST['password'], $row['password'])){
                  //authentiction
                  
                 Auth::authenticate($row);
                  redirect('home');
               }
         }
         $data['errors']['email'] = "Wrong email or password";
      }

      $this->view('login', $data);
   }
}
