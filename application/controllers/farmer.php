<?php

defined('BASEPATH') or exit('No direct script access allowed');

class farmer extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->library('form_validation');
        $this->load->model('m_grafik');
    }
    /**
     * Dashboard halaman admin farmer
     */
    public function index()
    {

        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            error_reporting(0);
            function hari()
            {
                $day = date('D');
                if ($day == 'Mon') {
                    return 'Senin';
                } elseif ($day == 'Tue') {
                    return 'Selasa';
                } elseif ($day == 'Wed') {
                    return 'Rabu';
                } elseif ($day == 'Thu') {
                    return 'Kamis';
                } elseif ($day == 'Fri') {
                    return 'Jumat';
                } elseif ($day == 'Sat') {
                    return 'Sabtu';
                } elseif ($day == 'Sun') {
                    return 'Minggu';
                }
            }

            $hari = hari();
            $data['hari'] = $hari;
            $email = $this->session->userdata('email');
            $this->db->select('*');
            $this->db->order_by('hari', 'desc');
            $this->db->order_by('pukul_mulai', 'asc');
            $this->db->join('tb_customer', 'tb_customer.kode_customer = tb_jadwal.kode_customer', 'left');
            $this->db->join('tb_bibit', 'tb_bibit.kode_bibit = tb_jadwal.kode_bibit', 'left');
            $this->db->join('tb_kolam', 'tb_kolam.kode_kolam = tb_jadwal.kode_kolam', 'left');
            $this->db->join('tb_pakan', 'tb_pakan.email = tb_jadwal.email', 'cross');

            $data['jadwal'] = $this->db->get_where('tb_jadwal', ['tb_jadwal.email' => $email, 'hari' => $hari])->result();

            $jml = $this->db->get_where('tb_jadwal', ['hari' => $hari]);

            $jmlh = 2 * count($jml->result());

            $this->db->order_by('tgl', 'desc');

            $data['agenda'] = $this->db->get_where('tb_agenda', ['hari' => $hari, 'tb_agenda.email' => $this->session->userdata('email')], $jmlh)->result();
            $data['kolam'] = $this->db->get_where('tb_kolam', ['email' => $email])->result();
            $this->load->view('farmer/meta.php');
            $this->load->view('farmer/sidebar.php');
            $this->load->view('farmer/navbar.php');
            $this->load->view('farmer/content.php', $data);
            $this->load->view('farmer/footer.php');
            $this->load->view('farmer/script.php');
        }
    }
    /**
     * Halaman profil farmer
     */
    public function profil()
    {

        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {


            $data['profil'] = $this->db->get_where('tb_pemakai', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('farmer/meta.php');
            $this->load->view('farmer/sidebar.php');
            $this->load->view('farmer/navbar.php');
            $this->load->view('farmer/profil.php', $data);
            $this->load->view('farmer/footer.php');
            $this->load->view('farmer/script.php');
        }
    }
    /**
     * Halaman jadwal farmer
     */

    public function jadwal()
    {

        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $data['bibit'] = $this->db->get('tb_bibit')->result();
            $data['customer'] = $this->db->get('tb_customer')->result();
            $data['kolam'] = $this->db->get('tb_kolam')->result();
            $email = $this->session->userdata('email');
            $this->db->select('*');
            $this->db->order_by('hari', 'desc');
            $this->db->order_by('pukul_mulai', 'asc');
            $this->db->join('tb_customer', 'tb_customer.kode_customer = tb_jadwal.kode_customer', 'left');
            $this->db->join('tb_bibit', 'tb_bibit.kode_bibit = tb_jadwal.kode_bibit', 'left');
            $this->db->join('tb_kolam', 'tb_kolam.kode_kolam = tb_jadwal.kode_kolam', 'left');
            $data['jadwal'] = $this->db->get_where('tb_jadwal', ['tb_jadwal.email' => $email])->result();


            $this->load->view('farmer/meta.php');
            $this->load->view('farmer/sidebar.php');
            $this->load->view('farmer/navbar.php');
            $this->load->view('farmer/jadwal.php', $data);
            $this->load->view('farmer/footer.php');
            $this->load->view('farmer/script.php');
        }
    }
    /**
     * Fungsi proses tambah jadwal farmer
     */

    function tambahjadwal()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {

            $email = $this->session->userdata('email');
            $hari = $this->input->post('hari');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $kode_bibit = $this->input->post('kode_bibit');
            $kode_customer = $this->input->post('kode_customer');
            $kode_kolam = $this->input->post('kode_kolam');

            $pukul_mulai = $this->db->get_where('tb_jammonitoring', ['jam_ke' => $jam_mulai])->row_array();
            $pukul_selesai = $this->db->get_where('tb_jammonitoring', ['jam_ke' => $jam_selesai])->row_array();

            $data_input = [
                'email' => $email,
                'hari' => $hari,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'pukul_mulai' => $pukul_mulai['pukul_mulai'],
                'pukul_selesai' => $pukul_selesai['pukul_selesai'],
                'kode_bibit' => $kode_bibit,
                'kode_customer' => $kode_customer,
                'kode_kolam' => $kode_kolam,

            ];

            $input = $this->m_data->tambahjadwal($data_input);
            if ($input) {
                $this->session->set_flashdata('pesan', 'Input jadwal berhasil');
                redirect('farmer/jadwal', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Input jadwal gagal');
                redirect('farmer/jadwal', 'refresh');
            }
        }
    }

    /**
     * Fungsi ubah jadwal farmer
     */
    function ubahjadwal()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $id_j = $this->input->post('id_j');
            $hari = $this->input->post('hari');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $kode_bibit = $this->input->post('kode_bibit');
            $kode_customer = $this->input->post('kode_customer');
            $kode_kolam = $this->input->post('kode_kolam');

            $pukul_mulai = $this->db->get_where('tb_jammonitoring', ['jam_ke' => $jam_mulai])->row_array();
            $pukul_selesai = $this->db->get_where('tb_jammonitoring', ['jam_ke' => $jam_selesai])->row_array();

            $data_ubah = [
                'hari' => $hari,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'pukul_mulai' => $pukul_mulai['pukul_mulai'],
                'pukul_selesai' => $pukul_selesai['pukul_selesai'],
                'kode_bibit' => $kode_bibit,
                'kode_customer' => $kode_customer,
                'kode_kolam' => $kode_kolam,
            ];

            $ubah = $this->m_data->ubahjadwal($id_j, $data_ubah);

            if ($ubah) {
                $this->session->set_flashdata('pesan', 'ubah jadwal Monitoring berhasil');
                redirect('farmer/jadwal', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'ubah jadwal Monitoring gagal');
                redirect('farmer/jadwal', 'refresh');
            }
        }
    }

    public function informasi()
    {

        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $data['bibit'] = $this->db->get('tb_bibit')->result();
            $data['customer'] = $this->db->get('tb_customer')->result();
            $email = $this->session->userdata('email');
            $this->db->select('*');
            $this->db->order_by('hari', 'desc');
            $this->db->order_by('pukul_mulai', 'asc');
            $this->db->join('tb_customer', 'tb_customer.kode_customer = tb_jadwal.kode_customer', 'left');
            $this->db->join('tb_bibit', 'tb_bibit.kode_bibit = tb_jadwal.kode_bibit', 'left');
            $data['informasi'] = $this->db->get_where('tb_jadwal', ['email' => $email])->result();


            $this->load->view('farmer/meta.php');
            $this->load->view('farmer/sidebar.php');
            $this->load->view('farmer/navbar.php');
            $this->load->view('farmer/jadwal.php', $data);
            $this->load->view('farmer/footer.php');
            $this->load->view('farmer/informasi.php');
            $this->load->view('farmer/script.php');
        }
    }
    public function kolam()
    {

        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $email = $this->session->userdata('email');
            $data['kolam'] = $this->db->get_where('tb_kolam', ['email' => $email])->result();


            $this->load->view('farmer/meta.php');
            $this->load->view('farmer/sidebar.php');
            $this->load->view('farmer/navbar.php');
            $this->load->view('farmer/kolam.php', $data);
            $this->load->view('farmer/footer.php');
            $this->load->view('farmer/informasi.php');
            $this->load->view('farmer/script.php');
        }
    }

    function tambahkolam()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {

            $email = $this->session->userdata('email');
            $nama_kolam = $this->input->post('nama_kolam');
            $Jumlah_ikan = $this->input->post('Jumlah_ikan');
            $status_mati = $this->input->post('status_mati');
            $kode_kolam = $this->input->post('kode_kolam');
            $tgl_masuk = $this->input->post('tgl_masuk');

            $data_input = [
                'email' => $email,
                'nama_kolam' => $nama_kolam,
                'Jumlah_ikan' => $Jumlah_ikan,
                'status_mati' => $status_mati,
                'kode_kolam' => $kode_kolam,
                'tgl_masuk' => $tgl_masuk,
            ];

            $input = $this->m_data->tambahkolam($data_input);

            if ($input) {
                $this->session->set_flashdata('pesan', 'Input Data Jadwal Berhasil');
                redirect('farmer/kolam', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Input Data Kolam Gagal');
                redirect('farmer/kolam', 'refresh');
            }
        }
    }

    /**
     * Fungsi hapus semua jadwal mengajar farmer
     */
    function hapussemuajadwal()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $this->db->where('email', $this->session->userdata('email'));
            $hapus = $this->db->delete('tb_jadwal');

            if ($hapus) {
                $this->session->set_flashdata('pesan', 'hapus semua jadwal mengajar berhasil');
                redirect('farmer/jadwal', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'hapus semua jadwal mengajar gagal');
                redirect('farmer/jadwal', 'refresh');
            }
        }
    }



    /**
     * Fungsi hapus satu jadwal farmer
     */

    function hapusjadwal($id_j)
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $this->db->where('id_j', $id_j);
            $hapus = $this->db->delete('tb_jadwal');
            if ($hapus) {
                $this->session->set_flashdata('pesan', 'hapus jadwal Monitoring berhasil');
                redirect('farmer/jadwal', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'hapus jadwal Monitoring gagal');
                redirect('farmer/jadwal', 'refresh');
            }
        }
    }

    function hapuskolam($id_k)
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $this->db->where('id_k', $id_k);
            $hapus = $this->db->delete('tb_kolam');
            if ($hapus) {
                $this->session->set_flashdata('pesan', 'hapus Kolam berhasil');
                redirect('farmer/kolam', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'hapus Kolam gagal');
                redirect('farmer/kolam', 'refresh');
            }
        }
    }

    function ubahkolam()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $nama_kolam = $this->input->post('nama_kolam');
            $Jumlah_ikan = $this->input->post('Jumlah_ikan');
            $status_mati = $this->input->post('status_mati');
            $kode_kolam = $this->input->post('kode_kolam');
            $tgl_masuk = $this->input->post('tgl_masuk');

            $data_ubah = [
                'nama_kolam' => $nama_kolam,
                'Jumlah_ikan' => $Jumlah_ikan,
                'status_mati' => $status_mati,
                'kode_kolam' => $kode_kolam,
                'tgl_masuk' => $tgl_masuk,
            ];

            $ubah = $this->m_data->ubahkolam($nama_kolam, $data_ubah);

            if ($ubah) {
                $this->session->set_flashdata('pesan', 'ubah Data Kolam berhasil');
                redirect('farmer/kolam', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'ubah Data Kolam gagal');
                redirect('farmer/kolam', 'refresh');
            }
        }
    }

    /**
     * Fungsi proses ubah data profil farmer
     */
    function ubahprofil()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required', [
                'required' => 'Nama tidak boleh kosong'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
                'required' => 'Alamat tidak boleh kosong'
            ]);


            if ($this->form_validation->run() == FALSE) {
                $this->profil();
            } else {
                $email = $this->input->post('email');

                $data = [
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'alamat' => $this->input->post('alamat'),
                    'hp' => $this->input->post('hp'),
                    'wa' => $this->input->post('wa'),
                ];

                $ubah = $this->m_data->ubahprofil($email, $data);

                if ($ubah) {
                    $this->session->set_flashdata('pesan', 'ubah data profil berhasil');
                    redirect('farmer/profil', 'refresh');
                } else {
                    $this->session->set_flashdata('pesan', 'ubah data profil gagal');
                    redirect('farmer/profil', 'refresh');
                }
            }
        }
    }

    /**
     * Fungsi ubah passord farmer
     */

    function ubahpasswordfarmer()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $email = $this->session->userdata('email');
            $pass_lama = $this->input->post('password_lama');
            $pass_baru = $this->input->post('password_baru');
            $konfirm_pass_baru = $this->input->post('konfirm_password_baru');

            $data = $this->db->get_where('tb_pemakai', ['email' => $email])->row_array();

            if (password_verify($pass_lama, $data['password'])) {

                $this->form_validation->set_rules(
                    'password_baru',
                    'Password',
                    'trim|required|min_length[6]|max_length[12]|matches[konfirm_password_baru]',
                    [
                        'required' => 'Password tidak boleh kosong',
                        'min_length' => 'Password minimal 6 karakter',
                        'matches' => 'Konfirmasi password salah'

                    ]
                );
                $this->form_validation->set_rules(
                    'konfirm_password_baru',
                    'Password',
                    'trim|required|matches[password_baru]',
                    [
                        'required' => 'Password tidak boleh kosong',
                        'matches' => 'Konfirmasi password tidak sama'
                    ]
                );

                if ($this->form_validation->run() == FALSE) {
                    $this->profil();
                } else {
                    $data = [
                        'password' => password_hash($pass_baru, PASSWORD_DEFAULT),
                    ];

                    $ubah = $this->m_data->ubahpasswordfarmer($email, $data);

                    if ($ubah) {
                        $this->session->set_flashdata('pesan', 'ubah password berhasil');
                        redirect('farmer/profil', 'refresh');
                    } else {
                        $this->session->set_flashdata('pesan', 'ubah password gagal');
                        redirect('farmer/profil', 'refresh');
                    }
                }
            } else {
                $this->session->set_flashdata('pesan1', 'Password lama tidak cocok');
                redirect('farmer/profil', 'refresh');
            }
        }
    }

    /**
     * Halaman Input agenda mengajar farmer
     */

    function agenda()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $this->form_validation->set_rules('hari', 'Hari', 'required');
            $this->form_validation->set_rules('customer', 'customer', 'required');
            $this->form_validation->set_rules('bibit', 'bibit', 'required');
            $this->form_validation->set_rules('kolam', 'kolam', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->db->select('hari');


                $this->db->distinct();
                $data['hari'] = $this->db->get_where('tb_jadwal', ['email' => $this->session->userdata('email')])->result();

                $this->load->view('farmer/meta.php');
                $this->load->view('farmer/sidebar.php');
                $this->load->view('farmer/navbar.php');
                $this->load->view('farmer/agenda.php', $data);
                $this->load->view('farmer/footer.php');
                $this->load->view('farmer/script.php');
            } else {
                $this->input_agenda();
            }
        }
    }

    function get_customer()
    {
        $hari = $this->input->post('hari');
        $this->db->where('hari', $hari);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->order_by('jam_mulai', 'asc');
        $this->db->join('tb_customer', 'tb_customer.kode_customer = tb_jadwal.kode_customer', 'left');
        $data = $this->db->get('tb_jadwal')->result();
        if (count($data) > 0) {
            $sel_customer = '';
            $sel_customer .= '<option value="">-- Pilih Customer --</option>';
            foreach ($data as $data) {
                $sel_customer .= '<option value="' . $data->kode_customer . '.' . $data->jam_mulai . '">' . $data->nama_customer . ' ( Mulai jam ke ' . $data->jam_mulai . ' )</option>';
            }
            echo json_encode($sel_customer);
        }
    }

    function get_kolam()
    {
        $kode = $this->input->post('kode');
        $datakode = explode('.', $kode);
        $kode_customer = $datakode[0];
        $jam_mulai = $datakode[1];


        $hari = $this->input->post('hari');
        $this->db->where('kode_customer', $kode_customer);
        $this->db->where('hari', $hari);
        $this->db->where('jam_mulai', $jam_mulai);

        $this->db->join('tb_kolam', 'tb_kolam.kode_kolam = tb_jadwal.kode_kolam', 'left');

        $data = $this->db->get('tb_jadwal')->result();

        if (count($data) > 0) {
            $sel_kolam = '';
            //    $sel_kolam .= '<option value="">-- Pilih kolam --</option>';
            foreach ($data as $data) {
                $sel_kolam .= '<option value=' . $data->kode_kolam . '>' . $data->nama_kolam . '</option>';
            }
            echo ($sel_kolam);
        }
    }

    function get_bibit()
    {
        $kode = $this->input->post('kode');
        $datakode = explode('.', $kode);
        $kode_customer = $datakode[0];
        $jam_mulai = $datakode[1];


        $hari = $this->input->post('hari');
        $this->db->where('kode_customer', $kode_customer);
        $this->db->where('hari', $hari);
        $this->db->where('jam_mulai', $jam_mulai);

        $this->db->join('tb_bibit', 'tb_bibit.kode_bibit = tb_jadwal.kode_bibit', 'left');

        $data = $this->db->get('tb_jadwal')->result();

        if (count($data) > 0) {
            $sel_bibit = '';
            //    $sel_bibit .= '<option value="">-- Pilih Bibit --</option>';
            foreach ($data as $data) {
                $sel_bibit .= '<option value=' . $data->kode_bibit . '>' . $data->bibit . '</option>';
            }
            echo ($sel_bibit);
        }
    }
    /**
     * Fungsi input agenda mengajar farmer
     */

    function input_agenda()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            $hari = $this->input->post('hari');
            $kode = $this->input->post('customer');
            $kode_bibit = $this->input->post('bibit');
            $kode_kolam = $this->input->post('kolam');
            $tgl = $this->input->post('tanggal');
            $tinggi_air = $this->input->post('tinggi_air');
            $antibiotik = $this->input->post('antibiotik');

            $datakode = explode('.', $kode);
            $kode_customer = $datakode[0];
            $jam_mulai = $datakode[1];

            $tg = substr($tgl, 8, 2);
            $bl = substr($tgl, 5, 2);
            $th = substr($tgl, 0, 4);

            $tanggal = $tg . " - " . $bl . " - " . $th;

            $datacustomer = $this->db->get_where('tb_customer', ['kode_customer' => $kode_customer])->row_array();
            $customer = $datacustomer['nama_customer'];

            $databibit = $this->db->get_where('tb_bibit', ['kode_bibit' => $kode_bibit])->row_array();
            $bibit = $databibit['bibit'];

            $datakolam = $this->db->get_where('tb_kolam', ['kode_kolam' => $kode_kolam])->row_array();
            $nama_kolam = $datakolam['nama_kolam'];
            $status_mati = $datakolam['status_mati'];
            $keterangan = $datakolam['keterangan'];
            $jumlah_pakan = $datakolam['jumlah_pakan'];

            // $data['siswa'] = $this->db->get_where('tb_siswa', ['kode_kelas' => $kode_kelas])->result_array();

            $data = $this->db->get('tb_jadwal')->result();
            $data['data'] = [
                'hari' => $hari,
                'kode_customer' => $kode_customer,
                'nama_customer' => $customer,
                'kode_bibit' => $kode_bibit,
                'jumlah_pakan' => $jumlah_pakan,
                'kode_kolam' => $kode_kolam,
                'bibit' => $bibit,
                'tanggal' => $tanggal,
                'nama_kolam' => $nama_kolam,
                'status_mati' => $status_mati,
                'keterangan' => $keterangan,
                'antibiotik' => $antibiotik,
                'tg' => $tg,
                'bl' => $bl,
                'th' => $th,
                'tgl' => $tgl,
                'tinggi_air' => $tinggi_air,
                'jam_mulai' => $jam_mulai,
            ];
            $this->load->view('farmer/meta.php');
            $this->load->view('farmer/sidebar.php');
            $this->load->view('farmer/navbar.php');
            $this->load->view('farmer/input_agenda.php', $data);
            $this->load->view('farmer/footer.php');
            $this->load->view('farmer/script.php');
        }
    }

    function prosesinputagenda()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {

            redirect('', 'refresh');
        } else {
            error_reporting(0);
            $hari = $this->input->post('hari');
            $tg = $this->input->post('tg');
            $bl = $this->input->post('bl');
            $th = $this->input->post('th');
            $bibit = $this->input->post('bibit');
            $kode_bibit = $this->input->post('kode_bibit');
            $customer = $this->input->post('nama_customer');
            $kode_customer = $this->input->post('kode_customer');
            $keterangan = $this->input->post('keterangan');
            $tgl = $this->input->post('tgl');
            $jam_mulai = $this->input->post('jam_mulai');
            $kode_kolam = $this->input->post('kode_kolam');
            $nama_kolam = $this->input->post('nama_kolam');
            $status_mati = $this->input->post('status_mati');
            $keterangan = $this->input->post('keterangan');
            $jumlah_pakan = $this->input->post('jumlah_pakan');
            $tinggi_air = $this->input->post('tinggi_air');
            $antibiotik = $this->input->post('antibiotik');

            $this->db->where('kode_customer', $kode_customer);
            $this->db->where('hari', $hari);
            $this->db->where('jam_mulai', $jam_mulai);
            $this->db->join('tb_kolam', 'tb_kolam.kode_kolam = tb_jadwal.kode_kolam', 'left');

            $query_jam = $this->db->get('tb_jadwal')->row_array();

            $object = [
                'hari' => $hari,
                'tg' => $tg,
                'bl' => $bl,
                'th' => $th,
                'bibit' => $bibit,
                'kode_bibit' => $kode_bibit,
                'nama_customer' => $customer,
                'jumlah_pakan' => $jumlah_pakan,
                'kode_customer' => $kode_customer,
                'keterangan' => $keterangan,
                'antibiotik' => $antibiotik,
                'kode_kolam' => $kode_kolam,
                'nama_kolam' => $nama_kolam,
                'status_mati' => $status_mati,
                'tinggi_air' => $tinggi_air,
                'jam_mulai' => $query_jam['jam_mulai'],
                'jam_selesai' => $query_jam['jam_selesai'],
                'keterangan' => $keterangan,
                'tgl' => $tgl,

                'farmer' => $this->session->userdata('email'),
                'email' => $this->session->userdata('email'),
            ];

            $input = $this->m_data->inputagenda($object);

            if ($input) {
                $this->session->set_flashdata('pesan', 'Input agenda Monitoring berhasil');
                redirect('farmer/agenda', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Input agenda Monitoring gagal');
                redirect('farmer/agenda', 'refresh');
            }
        }
    }

    /**
     * Fungsi cetak agenda
     */

    public function cetakagenda()
    {
        if (!($this->session->userdata('email') && $this->session->userdata('level') == '3')) {
            redirect('', 'refresh');
        } else {
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->order_by('tgl', 'asc');
            $this->db->order_by('jam_mulai', 'asc');

            $data['agenda'] = $this->db->get('tb_agenda')->result();

            $this->load->view('farmer/cetakagenda', $data);
        }
    }

    /**
     * Fungsi logout
     */
    function logout()
    {

        $this->session->sess_destroy();

        redirect('', 'refresh');
    }
}

/* End of file farmer.php */
