<?php


class Login extends Controller
{
   public function index()
   {
      $data['tittle'] = "Login";
      $this->view('login', $data);
   }
}
