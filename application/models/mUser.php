<?php

class mUser extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function user_list()
    {
        $users = $this->db->get('Users');
        return $users;

    }

    public function get($id)
    {
        $user = $this->db->get_where('Users', array('id' => $id) );
        return $user->row();
    }

    public function create($data)
    {
        $this->db->insert('users', $data);
    }

    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }



}