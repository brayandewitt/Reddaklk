<?php


class Home extends Controller
{
   public function index()
   {
      $data['tittle'] = "Home";
      $this->view('home', $data);
      
   }
}
