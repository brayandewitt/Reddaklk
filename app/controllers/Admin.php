<?php


class Admin extends Controller
{
    public function index()
    {
        $data['tittle'] = "Dashbord";
        $this->view('admin/dashbord', $data);
    }
    public function profile($id = null)
    {

        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);

        $data['tittle'] = "Profile";
        $this->view('admin/profile', $data);
    }
}
