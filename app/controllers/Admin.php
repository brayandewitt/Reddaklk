<?php


class Admin extends Controller
{
    public function index()
    {

        if (!Auth::logged_in()) {
            message('please login to view admin section');
            redirect('login');
        }
        $data['tittle'] = "Dashbord";
        $this->view('admin/dashbord', $data);
    }


    public function product($action = null, $id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view admin section');
            redirect('login');
        }
        
        $user_id = Auth::getId();
        $product = new Product_model();
        $data['action'] = $action;
        $data['id'] = $id;
        $data['tittle'] = "Product";

        if ($action == 'add') {
            $category = new Category_model();
           
            
            $data['categories'] = $category->findAll('asc');
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if($product->validate($_POST)){
                    
                    $_POST['date'] = date("y-m-d H:i:s");
                    $_POST['user_id'] = Auth::getId();
                    
                    
                    $product->insert($_POST);

                    $row = $product->first(['user_id'=>$user_id, 'published'=>0]);

                    message("your Product successfully created");
                    if($row){

                        redirect('admin/product/edit/'.$row->$id);
                    }else{

                        redirect('admin/product/edit/'.$id);
                    }
                 }
                 $data['errors'] = $product->errors;
            }
        }else{
            //product view 
            $data['rows'] = $product->where(['user_id'=>$user_id]);
            
        }

        $this->view('admin/product', $data);
    }


    public function profile($id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view admin section');
            redirect('login');
        }

        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $row = $user->first(['id' => $id]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {


            $folder = "uploads/images/";
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
                file_put_contents($folder . "index.php", "<?php //silence");
                file_put_contents("uploads/index.php", "<?php //silence");
            }

            if ($user->edit_validate($_POST, $id)) {

                $allowed = ['image/jpeg', 'image/png'];
                if (!empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                            resize_image($destination);
                            $_POST['image'] = $destination;
                            if (file_exists($row->image)) {
                                unlink($row->image);
                            }
                        } else {
                            $user->errors['image'] = "This file type not allowed";
                        }
                    } else {
                        $user->errors['image'] = "Could not uploada image";
                    }
                }
                $user->update($id, $_POST);

                //message("profile saved succesfully");
                //redirect('admin/profile/' . $id);
            }
            if (empty($user->errors)) {

                $arr['message'] = "Profile saved successfully";
            } else {
                $arr['message'] = "Please correct these errors";
                $arr['errors'] = $user->errors;
            }
            echo json_encode($arr);
            die;
        }

        $data['tittle'] = "Profile";
        $data['errors'] = $user->errors;
        $this->view('admin/profile', $data);
    }
}
