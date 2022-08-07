<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Admin extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
	}
	

	 public function index()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$data['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();

			$data['jml_pengguna'] = $this->db->get('tb_pemakai')->num_rows();
			// $data['jml_siswa'] = $this->db->get('tb_siswa')->num_rows();
			// $data['jml_kelas'] = $this->db->get('tb_kelas')->num_rows();
			// $data['jml_mapel'] = $this->db->get('tb_mapel')->num_rows();
			// $data['jml_jampel'] = $this->db->get('tb_jampel')->num_rows();
			$data['jml_farmer'] = $this->db->get_where('tb_pemakai',['level' => '3'])->num_rows();
			
			$this->load->view('admin/meta', $data);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/dasbor', $data);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
			
			
		}
			 
	 }


	 public function cetak()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$data['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();

			$data['farmer'] = $this->db->get_where('tb_pemakai',['level' => '3'])->result();
			
			
			$this->load->view('admin/meta', $data);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/cetak', $data);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
			
		}
			 
	 }

	 public function get_cetak()
	 {
		 $farmer = $this->input->post('farmer');
		 $this->db->order_by('tgl', 'asc');
		 
		 $data = $this->db->get_where('tb_agenda',['farmer' => $farmer])->result();
		 
		 $no = 1;
		 $tampil = '
		 <table class="table table-bordered">
		 <thead>
		 <tr>
		 <th>No</th>
		 <th>Hari / Tanggal</th>
		 <th>Jam ke</th>
		 <th>Kelas</th>
		 <th>Materi Pelajaran / Kompetensi Dasar</th>
		 <th>Selesai / Belum Selesai</th>
		 <th>Siswa Sakit</th>
		 <th>Siswa Ijin</th>
		 <th>Siswa T. keterangan</th>
		 <th>ketarangan Lain</th>
		 </tr>
		 </thead>
		 <tbody>';

		 foreach ($data as $data ) {
			if ($data->jam_mulai == $data->jam_selesai) {
				$jam = $data->jam_mulai;
			} else {
				$jam = $data->jam_mulai.' - '.$data->jam_selesai;
			}

			if ($data->selesai == '1') {
				$selesai = 'Selesai';
			} else {
				$selesai = 'Belum Selesai';
			}
			

			 $tampil .= '<tr>
				 <td>'.$no++.'</td>
				 <td>'.$data->hari.' / '.$data->tg.'-'.$data->bl.'-'.$data->th.'</td>
				 <td>'.$jam.'</td>
				 <td>'.$data->kelas.'</td>
				 <td>'.$data->materi.'</td>
				 <td>'.$selesai.'</td>
				 <td>'.$data->sakit.'</td>
				 <td>'.$data->ijin.'</td>
				 <td>'.$data->bolos.'</td>
				 <td>'.$data->keterangan.'</td>
			 </tr>';
		 }


		 $tampil .= '</tbody>';

		 if ($data) {
			 echo ($tampil);
		 } else {
			 echo "Tidak ada data agenda mengajar";
		 }
		 


		//  echo ($tampil);
		 
	 }


	 public function pengguna()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$data['mapel'] = $this->db->get('tb_mapel')->result();

			$datauser['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();
			$this->db->join('tb_mapel', 'tb_mapel.kode_mapel = tb_pemakai.kode_mapel', 'left');
			
			$data['pengguna'] = $this->db->get('tb_pemakai')->result();
			
			
			$this->load->view('admin/meta');
			$this->load->view('admin/header', $datauser);
			$this->load->view('admin/sidebar', $datauser);
			$this->load->view('admin/pengguna', $data);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
			
			
		}
			 
	 }

	 public function kelas()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$datauser['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();
			$data['kelas'] = $this->db->get('tb_kelas')->result();
			$data['jampel'] = $this->db->get('tb_jampel')->result();
			
			
			$this->load->view('admin/meta');
			$this->load->view('admin/header', $datauser);
			$this->load->view('admin/sidebar', $datauser);
			$this->load->view('admin/kelas',$data);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
			
			
		}
			 
	 }

	 public function siswa()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$datakelas['kelas'] = $this->db->get('tb_kelas')->result();
			$datauser['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();
			
			$this->db->join('tb_kelas', 'tb_kelas.kode_kelas = tb_siswa.kode_kelas', 'left');
			$data['siswa'] = $this->db->get('tb_siswa',10)->result();

			$data['mapel'] = $this->db->get('tb_mapel')->result();
			
			
			$this->load->view('admin/meta');
			$this->load->view('admin/header', $datauser);
			$this->load->view('admin/sidebar', $datauser);
			$this->load->view('admin/siswa', ['data' => $data['siswa'], 'datakelas' => $datakelas['kelas'], 'mapel' => $data['mapel']]);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
			
			
		}
			 
	 }

	 public function mapel()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$datauser['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();
			$data['mapel'] = $this->db->get('tb_mapel')->result();
			
			
			$this->load->view('admin/meta');
			$this->load->view('admin/header', $datauser);
			$this->load->view('admin/sidebar', $datauser);
			$this->load->view('admin/mapel', $data);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
			
			
		}
			 
	 }

	 public function ubahstatus($id_p)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$update = $this->m_admin->ubahstatus($id_p);
			if ($update) {
				$this->session->set_flashdata('pesan', 'Status pengguna berhasil diubah');
				
				redirect('admin/pengguna','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Status pengguna gagal diubah');
				
				redirect('admin/pengguna','refresh');
			}
			
		}
	 }


	 public function hapuspengguna($id_p)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->m_admin->hapuspengguna($id_p);
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data pengguna berhasil dihapus');
				
				redirect('admin/pengguna','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data pengguna gagal dihapus');
				
				redirect('admin/pengguna','refresh');
			}
			
		}
	 }

	 public function ubahpengguna()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$id_p = $this->input->post('qq');
			
			$data = [
				'nama' => $this->input->post('nama'), 
				'email' => $this->input->post('email'), 
				'nip' => $this->input->post('nip'), 
				'hp' => $this->input->post('hp'), 
				'wa' => $this->input->post('wa'), 
				'alamat' => $this->input->post('alamat'), 
				'kode_mapel' => $this->input->post('kode_mapel'), 
				'level' => $this->input->post('level'), 
			];
				
			$ubah = $this->m_admin->ubahpengguna($id_p,$data);
			if ($ubah) {
				$this->session->set_flashdata('pesan', 'Data pengguna berhasil diubah');
				
				redirect('admin/pengguna','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data pengguna gagal diubah');
				
				redirect('admin/pengguna','refresh');
			}
		}
	 }

	 public function tambahpengguna()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tb_pemakai.email]');
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan_error', 'Email yang anda masukkan sudah digunakan, silahkan ganti!');
				
				redirect('admin/pengguna','refresh');
				
			} else {

				$data = [
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'nip' => $this->input->post('nip'),
					'hp' => $this->input->post('hp'),
					'wa' => $this->input->post('wa'),
					'alamat' => $this->input->post('alamat'),
					'kode_mapel' => $this->input->post('kode_mapel'),
					'level' => $this->input->post('level'),
				];

				$tambah = $this->m_admin->tambahpengguna($data);
				if ($tambah) {
					$this->session->set_flashdata('pesan', 'Data pengguna berhasil ditambah');
					
					redirect('admin/pengguna','refresh');
					
				} else {
					$this->session->set_flashdata('pesan_error', 'Data pengguna gagal ditambah');
					
					redirect('admin/pengguna','refresh');
				}
			}
		}
	 }

	 public function tambahkelas()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$this->form_validation->set_rules('kode_kelas', 'Kode kelas', 'trim|required|is_unique[tb_kelas.kode_kelas]');
			$this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'trim|required|is_unique[tb_kelas.nama_kelas]');
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan_error', 'Kode kelas atau Nama Kelas yang anda masukkan sudah digunakan, silahkan ganti!');
				
				redirect('admin/kelas','refresh');
			} else {
				$data = [
					'kode_kelas' => htmlspecialchars($this->input->post('kode_kelas')),
					'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas')),
					'jurusan' => htmlspecialchars($this->input->post('jurusan')),
					'tingkat' => htmlspecialchars($this->input->post('tingkat')),
				];
	
				$tambah = $this->m_admin->tambahkelas($data);
				if ($tambah) {
					$this->session->set_flashdata('pesan', 'Data kelas berhasil ditambah');
					
					redirect('admin/kelas','refresh');
					
				} else {
					$this->session->set_flashdata('pesan_error', 'Data kelas gagal ditambah');
					
					redirect('admin/kelas','refresh');
				}
			}
		}
	 }

	 public function ubahkelas()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$id_k = $this->input->post('qq');
				
			$data = [
				'kode_kelas' => htmlspecialchars($this->input->post('kode_kelas')),
				'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas')),
				'jurusan' => htmlspecialchars($this->input->post('jurusan')),
				'tingkat' => htmlspecialchars($this->input->post('tingkat')),
			];

			$ubah = $this->m_admin->ubahkelas($id_k,$data);
			if ($ubah) {
				$this->session->set_flashdata('pesan', 'Data kelas berhasil diubah');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data kelas gagal diubah');
				
				redirect('admin/kelas','refresh');
			}
		}
	 }

	 public function hapuskelas($id_k)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->m_admin->hapuskelas($id_k);
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data kelas berhasil dihapus');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data kelas gagal dihapus');
				
				redirect('admin/kelas','refresh');
			}
			
		}
	 }

	 public function ubahsiswa()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$id_s = $this->input->post('qq');
			$kode_kelas = $this->input->post('kode_kelas');
			$kelas = $this->db->get_where('tb_kelas',['kode_kelas' => $kode_kelas])->row_array();
			
			$data = [
				'nisn' => htmlspecialchars($this->input->post('nisn')),
				'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
				'kode_kelas' => htmlspecialchars($this->input->post('kode_kelas')),
				'tingkat' => $kelas['tingkat'],
				'jurusan' => $kelas['jurusan'],
			];

			$ubah = $this->m_admin->ubahsiswa($id_s,$data);
			if ($ubah) {
				$this->session->set_flashdata('pesan', 'Data siswa berhasil diubah');
				
				redirect('admin/siswa','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data siswa gagal diubah');
				
				redirect('admin/siswa','refresh');
			}
		}
	 }

	 public function tambahsiswa()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			
			$kode_kelas = $this->input->post('kode_kelas');
			$kelas = $this->db->get_where('tb_kelas',['kode_kelas' => $kode_kelas])->row_array();
			
			$data = [
				'nisn' => htmlspecialchars($this->input->post('nisn')),
				'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
				'kode_kelas' => htmlspecialchars($this->input->post('kode_kelas')),
				'tingkat' => $kelas['tingkat'],
				'jurusan' => $kelas['jurusan'],
			];

			$tambah = $this->m_admin->tambahsiswa($data);
			if ($tambah) {
				$this->session->set_flashdata('pesan', 'Data siswa berhasil ditambah');
				
				redirect('admin/siswa','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data siswa gagal ditambah');
				
				redirect('admin/siswa','refresh');
			}
		}
	 }
	 
	 public function hapussemuasiswa()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->db->truncate('tb_siswa');
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data siswa berhasil dihapus');
				
				redirect('admin/siswa','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data siswa gagal dihapus');
				
				redirect('admin/siswa','refresh');
			}
		}
	 }

	 public function genpass($id_p)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$password = password_hash('password',PASSWORD_DEFAULT);
			$data = [
				'password' => $password,
			];
			
			$genpass = $this->m_admin->genpass($id_p,$data);
			if ($genpass) {
				$this->session->set_flashdata('pesan', 'Generate ulang password berhasil');
				
				redirect('admin/pengguna','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Generate ulang password gagal');
				
				redirect('admin/pengguna','refresh');
			}

		}
	 }

	 public function ubahjampel()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
		
			$id_jp =  $this->input->post('q');
			$jam_ke = $this->input->post('jam_ke');
			$pukul_mulai = $this->input->post('pukul_mulai');
			$pukul_selesai = $this->input->post('pukul_selesai');
			
			$data = [
				'jam_ke' => $jam_ke,
				'pukul_mulai' => $pukul_mulai,
				'pukul_selesai' => $pukul_selesai,
			];

			$ubah = $this->m_admin->ubahjampel($id_jp,$data);
			if ($ubah) {
				$this->session->set_flashdata('pesan', 'Ubah data jam pelajaran berhasil');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Ubah data jam pelajaran gagal');
				
				redirect('admin/kelas','refresh');
			}
		}
	 }

	 public function hapusjampel($id_jp)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->m_admin->hapusjampel($id_jp);
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data jam pelajaran berhasil dihapus');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data jam pelajaran gagal dihapus');
				
				redirect('admin/kelas','refresh');
			}
			
		}
	 }

	 public function tambahjampel()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
		
			$jam_ke = $this->input->post('jam_ke');
			$pukul_mulai = $this->input->post('pukul_mulai');
			$pukul_selesai = $this->input->post('pukul_selesai');
			
			$data = [
				'jam_ke' => $jam_ke,
				'pukul_mulai' => $pukul_mulai,
				'pukul_selesai' => $pukul_selesai,
			];

			$ubah = $this->m_admin->tambahjampel($data);
			if ($ubah) {
				$this->session->set_flashdata('pesan', 'Tambah data jam pelajaran berhasil');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Tambah data jam pelajaran gagal');
				
				redirect('admin/kelas','refresh');
			}
		}
	 }

	 public function hapussemuakelas()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->db->truncate('tb_kelas');
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data kelas berhasil dihapus');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data kelas gagal dihapus');
				
				redirect('admin/kelas','refresh');
			}
		}
	 }
	 
	 
	 public function hapussemuajampel()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->db->truncate('tb_jampel');
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data jam pelajaran berhasil dihapus');
				
				redirect('admin/kelas','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data jam pelajaran gagal dihapus');
				
				redirect('admin/kelas','refresh');
			}
		}
	 }

	 public function hapussiswa($id_s)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->m_admin->hapussiswa($id_s);
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data siswa berhasil dihapus');
				
				redirect('admin/siswa','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data siswa gagal dihapus');
				
				redirect('admin/siswa','refresh');
			}
			
		}
	 }

	 public function tambahmapel()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$this->form_validation->set_rules('kode_mapel', 'Kode Mapel', 'trim|required|is_unique[tb_mapel.kode_mapel]');
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan_error', 'Kode mapel sudah digunakan');
				
				
				redirect('admin/siswa','refresh');
				
			} else {
				$data = [
					'kode_mapel' => $this->input->post('kode_mapel'),
					'mapel' => $this->input->post('mapel'),
					
				];
				$tambah = $this->m_admin->tambahmapel($data);
				if ($tambah) {
					$this->session->set_flashdata('pesan', 'Tambah data mapel berhasil');
					
					redirect('admin/siswa','refresh');
					
				} else {
					$this->session->set_flashdata('pesan_error', 'Tambah data mapel gagal');
					
					redirect('admin/siswa','refresh');
				}
				
			}
			

		}
	 }

	 public function hapussatumapel($id_m)
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$hapus = $this->m_admin->hapussatumapel($id_m);
			if ($hapus) {
				$this->session->set_flashdata('pesan', 'Data mapel berhasil dihapus');
				
				redirect('admin/siswa','refresh');
				
			} else {
				$this->session->set_flashdata('pesan_error', 'Data mapel gagal dihapus');
				
				redirect('admin/siswa','refresh');
			}
			
		}
	 }

	 public function logout()
	 {
		 
		 $this->session->sess_destroy();
		 
		 redirect('','refresh');
		 
	 }

	 public function ubahmapel()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {

			$id_m = $this->input->post('q');
			
				$data = [
					'kode_mapel' => $this->input->post('kode_mapel'),
					'mapel' => $this->input->post('mapel'),
					
				];
				$tambah = $this->m_admin->ubahmapel($id_m,$data);
				if ($tambah) {
					$this->session->set_flashdata('pesan', 'Ubah data mapel berhasil');
					
					redirect('admin/siswa','refresh');
		
					$this->session->set_flashdata('pesan_error', 'Ubah data mapel gagal');
					
					redirect('admin/siswa','refresh');
				}
				
			}
	 }

	 public function print()
	 {
		 $data['agenda'] = $this->db->get_where('tb_agenda', ['farmer' => $this->input->post('farmer') ])->result();
		 
		 $this->load->view('admin/cetakagenda', $data);
		 
	 }

	 public function instansi()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$data['user'] = $this->db->get_where('tb_pemakai',['email' => $this->session->userdata('email')])->row_array();

			$data['instansi'] = $this->db->get('tb_instansi')->row_array();
			
			
			$this->load->view('admin/meta', $data);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/instansi', $data);
			$this->load->view('admin/footer');
			$this->load->view('admin/script');
		}
	 }

	 public function ubahinstansi()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			$data = [
				'npsn' => $this->input->post('npsn'),
				'nama_instansi' => $this->input->post('nama_instansi'),
				'alamat' => $this->input->post('alamat'),
			];

			$ubah = $this->m_admin->ubahinstansi($data);
			if ($ubah) {
				$this->session->set_flashdata('pesan', 'Ubah data instansi berhasil');
				
				redirect('admin/instansi','refresh');
	
				$this->session->set_flashdata('pesan_error', 'Ubah data instansi gagal');
				
				redirect('admin/instansi','refresh');
			}
		}
	 }

	 public function upload_logo()
	 {
		if (! ($this->session->userdata('email') && $this->session->userdata('level') == '1')) {
			
			redirect('','refresh');
			
		} else {
			
			$nama = $_FILES['userfile']['name'];
			$config['upload_path']          = './img/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				
				$this->session->set_flashdata('pesan_error', $this->upload->display_errors());
				redirect('admin/instansi','refresh');
					
			}
			else
			{
				$object = ['logo' => $nama];
				$this->db->update('tb_instansi', $object);
				
				$this->session->set_flashdata('pesan', 'Ubah logo berhasil');
				redirect('admin/instansi','refresh');
			}
		}
	 }
 
 }
 
 /* End of file Admin.php */
 
// echo "<pre>";
// print_r ($_POST);
// echo "</pre>";