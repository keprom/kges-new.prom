<?php
/**
 * Created by PhpStorm.
 * User: Айдан
 * Date: 26.07.2018
 * Time: 15:36
 */

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->unset_userdata('is_login');
        $this->db->order_by('profa');
        $this->db->order_by('name');
        $data['logins'] = $this->db->get("industry.user")->result();
        $this->load->view('login/index', $data);
    }

    public function log_in()
    {
        $p['id'] = $this->input->post('user_id');

        $p['password'] = md5($this->input->post('password'));
        $this->db->where($p);
        $this->db->from('industry.user');
        if ($this->db->count_all_results() > 0) {
            $this->db->where($p);
            $this->db->from('industry.user');
            $query = $this->db->get()->row_array();

            $this->session->set_userdata($query);
            $this->session->set_userdata('is_login', 'TRUE');
            redirect('billing/index');
            die();
        } else {
            redirect('login/index');
            die();
        }
    }

    function log_out()
    {
        $this->load->helper('cookie');
        delete_cookie("zashisheno_kasperskim");
        redirect('login/index');
    }
}