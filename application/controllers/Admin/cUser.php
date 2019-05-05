<?php
/**
 * Created by PhpStorm.
 * cUser: karwackid
 * Date: 2019-05-04
 * Time: 08:20
 */

class cUser extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mUser');
    }

    /**
     * @return object
     */
    public function index()
    {
       $data['users'] = $this->mUser->get('users');
       $this->load->view('Admin/vUsers', $data);


    }

    public function create()
    {

        if(!empty($_POST)) {
            $this->load->library('form_validation');

            $config = array(
                array(
                    'field' => 'name',
                    'label' => 'Imię',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Hasło',
                    'rules' => 'trim|required|matches[passconf]',
                ),
                array(
                    'field' => 'passconf',
                    'label' => 'Powtórz hasło',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email|is_unique[users.email]'
                )
            );

            $this->form_validation->set_rules($config);

            $config = array(
                'required' => 'Pole %s jest wymagane',
                'matches' => 'Hasła muszą być identyczne',
                'valid_email' => 'Niepoprawny format adresu email',
                'is_unique' => 'Podany adres email juz istnieje w bazie'

            );

            $this->form_validation->set_message($config);


            if ($this->form_validation->run() == FALSE) {

            } else {
                $data = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'role' => $_POST['role']
                );

                $data['password'] = pass_hash($data['password']);

                $this->mUser->create('users', $data);
                redirect('http://cms.local/Admin/cUser/');
            }
        }
        $this->load->view('Admin/vUser_create');
    }

    public function get($id)
    {
        $where = array('id' => $id);
       $data['user'] = $this->mUser->get('users', $where);
       $this->load->view('Admin/vUser_edit', $data);
    }

    public function edit($id)
    {

        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        );
        $where = array('id' => $id);
        $this->mUser->update('users', $where, $data);
        redirect('http://cms.local/Admin/cUser/');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->mUser->delete('users', $where);
        redirect('http://cms.local/Admin/cUser/');
    }

}