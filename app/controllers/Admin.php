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

            if ($user->edit_validate($data)) {

                $allowed = ['image/jpeg', 'image/png'];
                if (!empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
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
                redirect('admin/profile/' . $id);
            }
        }

        $data['tittle'] = "Profile";
        $data['errors'] = $user->errors;
        $this->view('admin/profile', $data);
    }
}
