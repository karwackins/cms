<?php
/**
 * Created by PhpStorm.
 * cUser: karwackid
 * Date: 2019-05-04
 * Time: 08:20
 */

class cUser extends My_controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mUser');
        $this->load->library('form_validation');
        $this->loggedin() == TRUE || redirect('http://cms.local/admin/cPanel/login');
    }

    /**
     * @return object
     */
    public function index()
    {
       $data['users'] = $this->mUser->get('users');
       $data['loggedin'] = $this->loggedin();
       $this->load->view('admin/user/vUsers', $data);


    }

    public function create()
    {

        if(!empty($_POST)) {

            $config = array(
                'required' => 'Pole %s jest wymagane',
                'matches' => 'Hasła muszą być identyczne',
                'valid_email' => 'Niepoprawny format adresu email',
                'is_unique' => 'Podany adres email juz istnieje w bazie'

            );

            $this->form_validation->set_message($config);


            if ($this->form_validation->run('users_create') == TRUE)
            {
                $data = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'role' => $_POST['role']
                );

                $data['password'] = pass_hash($data['password']);

                $this->mUser->create('users', $data);
                redirect('http://cms.local/admin/cUser/');
            }
        }
        $this->load->view('admin/user/vUser_create');
    }

    public function get($id)
    {
        $where = array('id' => $id);
       $data['user'] = $this->mUser->get('users', $where);
       $this->load->view('admin/user/vUser_edit', $data);
    }

    public function edit($id)
    {
        if ($this->form_validation->run('users_edit') == TRUE) {
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => $_POST['role']
            );
            $where = array('id' => $id);
            $this->mUser->update('users', $where, $data);
            redirect('http://cms.local/admin/cUser/');
        }
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->mUser->delete('users', $where);
        redirect('http://cms.local/admin/cUser/');
    }



}