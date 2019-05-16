<?php
/**
 * Created by PhpStorm.
 * User: karwackid
 * Date: 2019-05-10
 * Time: 23:10
 */

class cPanel extends My_controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mUser');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $data['loggedin'] = $this->loggedin();
        $this->load->view('admin/panel/index', $data);
    }

    public function login()
    {
        $this->loggedin() == FALSE || redirect('http://cms.local/admin/cPanel');
            if(!empty($_POST)) {

                $config = array(
                    'required' => 'Pole %s jest wymagane',
                    'valid_email' => 'Niepoprawny format adresu email',

                );

                $this->form_validation->set_message($config);


                if ($this->form_validation->run('panel_login') == TRUE)
                {
                    $data = array(
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                    );

                    $data['password'] = pass_hash($data['password']);

                    $user = $this->mUser->get('users', $data);
                    if(!empty($user))
                    {
                        $data = array(
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'logged' => TRUE
                        );

                        $this->session->set_userdata($data);
                        redirect('http://cms.local/admin/cPanel');
                    }
                    else
                    {
                        echo 'nie jest ok';
                    }
                }

            }
            $this->load->view('admin/panel/login');

    }


}