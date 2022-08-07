<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        
    }
    

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required',[
            'required' => 'Email tidak boleh kosong',
            
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => 'Password tidak boleh kosong',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['instansi'] = $this->db->get('tb_instansi')->row_array();
            $this->load->view('v_login',$data);
        } else {
            $this->_login();
        }  
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_pemakai',['email' => $email])->row_array();
        
        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {        
                    $session = array(
                        'email' => $user['email'],
                        'level' => $user['level'],
                    );
                    $this->session->set_userdata( $session );
                    
                    redirect('farmer');
                    
                } else {
                    $this->session->set_flashdata('error', 'Password yang anda masukkan salah');
                    
                    redirect('','refresh');
                    
                }
                
            } else {
                $this->session->set_flashdata('error', 'Akun anda belum diaktifkan, silahkan hubungi administrator');
                    
                redirect('','refresh');
            }
            
        } else {
            $this->session->set_flashdata('error', 'Email tidak terdaftar');
                    
            redirect('','refresh');
        }
        
    }

    public function admin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required',[
            'required' => 'Email tidak boleh kososng',
            
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => 'Password tidak boleh kososng',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['instansi'] = $this->db->get('tb_instansi')->row_array();
            $this->load->view('v_loginadmin',$data);
        } else {
            $this->_loginadmin();
        }  
    }

    private function _loginadmin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_pemakai',['email' => $email])->row_array();
        
        if ($user) {

            if ($user['level'] != 1) {
                $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses');
                    
                    redirect('login_admin','refresh');
            } else {
                if ($user['status'] == 1) {
                    if (password_verify($password, $user['password'])) {        
                        $session = array(
                            'email' => $user['email'],
                            'level' => $user['level'],
                        );
                        $this->session->set_userdata( $session );
                        
                        redirect('admin','refresh');
                        
                    } else {
                        $this->session->set_flashdata('error', 'Password yang anda masukkan salah');
                        
                        redirect('login_admin','refresh');
                        
                    }
                    
                } else {
                    $this->session->set_flashdata('error', 'Akun anda belum diaktivkan, silahkan hubungi administrator');
                        
                    redirect('login_admin','refresh');
                }
            }
            
        } else {
            $this->session->set_flashdata('error', 'Email tidak terdaftar');
                    
            redirect('login_admin','refresh');
        }
        
        
    }

    

}

/* End of file Login.php */
