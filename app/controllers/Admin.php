<?php


class Admin extends Controller
{
    public function index()
    {

        if(!Auth::logged_in()){
            message('please login to view admin section');
            redirect('login');
        }
        $data['tittle'] = "Dashbord";
        $this->view('admin/dashbord', $data);
    }
    public function profile($id = null)
    {
        if(!Auth::logged_in()){
            message('please login to view admin section');
            redirect('login');
        }

        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);

        $data['tittle'] = "Profile";
        $this->view('admin/profile', $data);
    }
}
