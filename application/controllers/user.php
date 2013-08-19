<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	private $jml_kolom_1  = 1;
	private $jml_kolom_2  = 1;
	private $jml_kolom_3  = 1;
	private $jml_kolom_4  = 1;
	private $jml_kolom_5  = 1;
	private $jml_kolom_6  = 1;
	private $jml_kolom_7  = 1;
	private $jml_kolom_8  = 1;
	private $jml_kolom_9  = 1;
	private $jml_kolom_10 = 1;
	private $jml_kolom_11 = 1;
	private $jml_kolom_12 = 1;
	private $jml_kolom_13 = 1;
	
	private $isi_kolom_1  = array();
	private $isi_kolom_2  = array();
	private $isi_kolom_3  = array();
	private $isi_kolom_4  = array();
	private $isi_kolom_5  = array();
	private $isi_kolom_6  = array();
	private $isi_kolom_7  = array();
	private $isi_kolom_8  = array();
	private $isi_kolom_9  = array();
	private $isi_kolom_10 = array();
	private $isi_kolom_11 = array();
	private $isi_kolom_12 = array();
	private $isi_kolom_13 = array();
	
	private $ahp_1        = 0;
	private $ahp_2        = 0;
	private $ahp_3        = 0;
	private $ahp_4        = 0;
	private $ahp_5        = 0;
	private $ahp_6        = 0;
	private $ahp_7        = 0;
	private $ahp_8        = 0;
	private $ahp_9        = 0;
	private $ahp_10       = 0;
	private $ahp_11       = 0;
	private $ahp_12       = 0;
	private $ahp_13       = 0;

	public function index()
	{
		$username = $this->session->userdata('username');
		if($username != "" ){
			if($this->session->userdata('role') == 0){
				$data['isi'] = 'admin_index';
				$data['admin_page'] = 'admin_main';
				$this->load->view('home',$data);
			} elseif($this->session->userdata('role') == 1) {
				$detail = $this->user_model->get_detail($username)->row();
				if($detail->status == 0) $this->question_list('');
				else redirect('user/result');
			} else {
				if($status == 0) redirect('user/ahp_question_list');
				else redirect('user/ahp_result');
			}
		} else {
			$data['isi'] = 'user_login';
			$this->load->view('home',$data);
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if($this->user_model->login($username,$password) == 1 ){
			$detail   = $this->user_model->get_detail($username)->row();
			$role     = $detail->role;
			$id       = $detail->id;
			$status   = $detail->status;
			$userdata = array('username'=>$username,'password'=>$password,'role'=>$role,'id'=>$id);
			$this->session->set_userdata($userdata);
			if($role==0){
				$data['isi'] = 'admin_index';
				$data['admin_page'] = 'admin_main';
				$this->load->view('home',$data);
			}elseif($role==1){
				redirect('user');
			}else{
				if($status == 0) redirect('user/ahp_question_list');
				else redirect('user/ahp_result');
			}
		} else {
			$data['isi']   = 'user_login';
			$data['error'] = '<p><span class="alert alert-danger">Login gagal. Username atau password salah</span></p>';
			$this->load->view('home',$data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function ahp_question_list()
	{
		$proc_array = array();
		$proc_list = $this->metric_model->get_proc_list();
		foreach($proc_list->result() as $proc){
			$proc_array[]=$proc->proc_name;
		}
		$data['proc_array'] = $proc_array;
		$data['isi']        = 'user_index';
		$data['admin_page'] = 'user_ahp_form';
		$this->load->view('home',$data);
	}

	public function ahp_submit()
	{
		$k=1;
		for($i=0;$i<13;$i++){
			/*
			$data = array(
						'row' => $i,
						'column' => $i,
						'value' => '1'
					);
			$this->user_model->insert_raw_table($data);
			*/
			eval('return $this->isi_kolom_'.$k.'['.$i.']="1";');
			//echo $i.'_'.$i.'->1<br>';
			for($j=$k;$j<13;$j++){
				$no_bobot =  'bobot_'.$i.'_'.$j;
				$nilai_bobot = $this->input->post($no_bobot);
				$this->hitung_jumlah_kolom($i,$j,$nilai_bobot);
			}
			$k++;
		}

		//RAW TABLE
		for($i=1;$i<=13;$i++){
			for($j=0;$j<=12;$j++){
				$m=$j+1;
				$data = array(
						'row'     => $m,
						'column'  => $i,
						'value'   => eval('return $this->isi_kolom_'.$i.'['.$j.'];'),
						'user_id' => $this->session->userdata('id')
					);
				$this->ahp_model->insert_raw_table($data);
			}
			$data = array(
					'column_id' => $i,
					'total'     => eval('return $this->jml_kolom_'.$i.';'),
					'user_id'   => $this->session->userdata('id')
				);
			$this->ahp_model->insert_column_sum($data);
			//echo "<hr>";
		}
		
		//NORMALIZED TABLE
		for($i=1;$i<=13;$i++){
			for($j=0;$j<=12;$j++){
				$m=$j+1;
				$nilai = eval('return ($this->isi_kolom_'.$i.'['.$j.'];');
				$jml = eval('return $this->jml_kolom_'.$i.';');
				$data = array(
						'row'     => $m,
						'column'  => $i,
						'value'   => eval('return round($this->isi_kolom_'.$i.'['.$j.']/$this->jml_kolom_'.$i.',3);'),
						'user_id' => $this->session->userdata('id')
					);
				$this->ahp_model->insert_normalized_table($data);
			}
			
			//echo "<hr>";
		}
		
		//AHP
		$m=1;
		for($i=0;$i<=12;$i++){
			for($j=1;$j<=13;$j++){
				eval('return $this->ahp_'.$m.' +=  round($this->isi_kolom_'.$j.'['.$i.']/$this->jml_kolom_'.$j.',3);');
			}
			eval('return $this->ahp_'.$m.' = round($this->ahp_'.$m.'/13,5);');
			//echo eval('return $this->ahp_'.$m.';');
			$m++;
			//echo "<hr>";
		}

		$ahp_data = array('bobot' => $this->ahp_1.','.$this->ahp_2.','.$this->ahp_3.','.$this->ahp_4.','.$this->ahp_5.','.$this->ahp_6.','.$this->ahp_7.','.$this->ahp_8.','.$this->ahp_9.','.$this->ahp_10.','.$this->ahp_11.','.$this->ahp_12.','.$this->ahp_13,
			'user_id' => $this->session->userdata('id')
			);

		$this->ahp_model->insert_ahp($ahp_data);
		$id = $this->session->userdata('id');
		$user_data = array('status'=>'1');
		
		if($this->check_cr($this->session->userdata('id')) >= 0.1){
			$proc_array = array();
			$proc_list = $this->metric_model->get_proc_list();
			foreach($proc_list->result() as $proc){
				$proc_array[]=$proc->proc_name;
			}
			$data['proc_array'] = $proc_array;
			$data['isi']        = 'user_index';
			$data['admin_page'] = 'user_ahp_form';
			$data['error'] = '<p><div class="alert alert-danger"><h4>Pembobotan Gagal</h4>Pembobotan yang anda lakukan tidak konsisten. Silakan ulangi. Terimakasih. </div></p>';
			$this->ahp_model->empty_by_user($this->session->userdata('id'));
			$this->load->view('home',$data);
		} else {
			$this->user_model->set_status($id,$user_data);
			$this->aggregate_ahp();
		}
	}

	public function hitung_jumlah_kolom($baris,$kolom,$nilai_bobot)
	{
		$nilai_bobot_balik = round(1/$nilai_bobot,3);
		if($baris==0){
			$this->jml_kolom_1 += $nilai_bobot_balik;
			$this->isi_kolom_1[] = $nilai_bobot_balik;
		}
		if($kolom==1){
			$this->jml_kolom_2 += $nilai_bobot;
			$this->isi_kolom_2[] = $nilai_bobot;
		}
		if($baris==1){
			$this->jml_kolom_2 += $nilai_bobot_balik;
			$this->isi_kolom_2[] = $nilai_bobot_balik;
		}
		if($kolom==2){
			$this->jml_kolom_3 += $nilai_bobot;
			$this->isi_kolom_3[] = $nilai_bobot;
		}
		if($baris==2){
			$this->jml_kolom_3 += $nilai_bobot_balik;
			$this->isi_kolom_3[] = $nilai_bobot_balik;
		}
		if($kolom==3){
			$this->jml_kolom_4 += $nilai_bobot;
			$this->isi_kolom_4[] = $nilai_bobot;
		}
		if($baris==3){
			$this->jml_kolom_4 += $nilai_bobot_balik;
			$this->isi_kolom_4[] = $nilai_bobot_balik;
		}
		if($kolom==4){
			$this->jml_kolom_5 += $nilai_bobot;
			$this->isi_kolom_5[] = $nilai_bobot;
		}
		if($baris==4){
			$this->jml_kolom_5 += $nilai_bobot_balik;
			$this->isi_kolom_5[] = $nilai_bobot_balik;
		}
		if($kolom==5){
			$this->jml_kolom_6 += $nilai_bobot;
			$this->isi_kolom_6[] = $nilai_bobot;
		}
		if($baris==5){
			$this->jml_kolom_6 += $nilai_bobot_balik;
			$this->isi_kolom_6[] = $nilai_bobot_balik;
		}
		if($kolom==6){
			$this->jml_kolom_7 += $nilai_bobot;
			$this->isi_kolom_7[] = $nilai_bobot;
		}
		if($baris==6){
			$this->jml_kolom_7 += $nilai_bobot_balik;
			$this->isi_kolom_7[] = $nilai_bobot_balik;
		}
		if($kolom==7){
			$this->jml_kolom_8 += $nilai_bobot;
			$this->isi_kolom_8[] = $nilai_bobot;
		}
		if($baris==7){
			$this->jml_kolom_8 += $nilai_bobot_balik;
			$this->isi_kolom_8[] = $nilai_bobot_balik;
		}
		if($kolom==8){
			$this->jml_kolom_9 += $nilai_bobot;
			$this->isi_kolom_9[] = $nilai_bobot;
		}
		if($baris==8){
			$this->jml_kolom_9 += $nilai_bobot_balik;
			$this->isi_kolom_9[] = $nilai_bobot_balik;
		}
		if($kolom==9){
			$this->jml_kolom_10 += $nilai_bobot;
			$this->isi_kolom_10[] = $nilai_bobot;
		}
		if($baris==9){
			$this->jml_kolom_10 += $nilai_bobot_balik;
			$this->isi_kolom_10[] = $nilai_bobot_balik;
		}
		if($kolom==10){
			$this->jml_kolom_11 += $nilai_bobot;
			$this->isi_kolom_11[] = $nilai_bobot;
		}
		if($baris==10){
			$this->jml_kolom_11 += $nilai_bobot_balik;
			$this->isi_kolom_11[] = $nilai_bobot_balik;
		}
		if($kolom==11){
			$this->jml_kolom_12 += $nilai_bobot;
			$this->isi_kolom_12[] = $nilai_bobot;
		}
		if($baris==11){
			$this->jml_kolom_12 += $nilai_bobot_balik;
			$this->isi_kolom_12[] = $nilai_bobot_balik;
		}
		if($kolom==12){
			$this->jml_kolom_13 += $nilai_bobot;
			$this->isi_kolom_13[] = $nilai_bobot;
		}
		if($baris==12){
			$this->jml_kolom_13 += $nilai_bobot_balik;
			$this->isi_kolom_13[] = $nilai_bobot_balik;
		}
	}

	public function check_cr($user_id)
	{
		$eigen_value = array();
		$total       = 0;

		$ahp_result = $this->ahp_model->get_ahp_by_id($user_id)->row();
		$pecah = explode(',',$ahp_result->bobot);
		for($i=0;$i<count($pecah);$i++){
			array_push($eigen_value, $pecah[$i]);
		}
		$j=1;
		for($i=0;$i<count($eigen_value);$i++){
			$column_sum = $this->ahp_model->get_column_sum($j,$user_id)->row();
			$total+=($column_sum->total*$eigen_value[$i]);
			$j++;
		}

		$ri = $this->ahp_model->get_random_index(count($eigen_value))->row();
		$ci = ($total-count($eigen_value))/(count($eigen_value)-1);
		$cr = $ci/$ri->R;
		
		return $cr;
	}

	public function aggregate_ahp()
	{
		$proses_1  =1;
		$proses_2  =1;
		$proses_3  =1;
		$proses_4  =1;
		$proses_5  =1;
		$proses_6  =1;
		$proses_7  =1;
		$proses_8  =1;
		$proses_9  =1;
		$proses_10 =1;
		$proses_11 =1;
		$proses_12 =1;
		$proses_13 =1;

		$ahp_result = $this->ahp_model->get_ahp();
		foreach ($ahp_result as $res) {
			$pecah = explode(',',$res->bobot);
			$i=0;
			do{
				if($i==0) $proses_1=$proses_1*$pecah[$i];
				elseif($i==1) $proses_2=$proses_2*$pecah[$i];
				elseif($i==2) $proses_3=$proses_3*$pecah[$i];
				elseif($i==3) $proses_4=$proses_4*$pecah[$i];
				elseif($i==4) $proses_5=$proses_5*$pecah[$i];
				elseif($i==5) $proses_6=$proses_6*$pecah[$i];
				elseif($i==6) $proses_7=$proses_7*$pecah[$i];
				elseif($i==7) $proses_8=$proses_8*$pecah[$i];
				elseif($i==8) $proses_9=$proses_9*$pecah[$i];
				elseif($i==9) $proses_10=$proses_10*$pecah[$i];
				elseif($i==10) $proses_11=$proses_11*$pecah[$i];
				elseif($i==11) $proses_12=$proses_12*$pecah[$i];
				elseif($i==12) $proses_13=$proses_13*$pecah[$i];
				$i++;
			}while($i<13);
		}

		$count_ahp_data = $this->ahp_model->count_ahp();
		$proses_akhir_1=pow($proses_1,1/$count_ahp_data);
		$proses_akhir_2=pow($proses_2,1/$count_ahp_data);
		$proses_akhir_3=pow($proses_3,1/$count_ahp_data);
		$proses_akhir_4=pow($proses_4,1/$count_ahp_data);
		$proses_akhir_5=pow($proses_5,1/$count_ahp_data);
		$proses_akhir_6=pow($proses_6,1/$count_ahp_data);
		$proses_akhir_7=pow($proses_7,1/$count_ahp_data);
		$proses_akhir_8=pow($proses_8,1/$count_ahp_data);
		$proses_akhir_9=pow($proses_9,1/$count_ahp_data);
		$proses_akhir_10=pow($proses_10,1/$count_ahp_data);
		$proses_akhir_11=pow($proses_11,1/$count_ahp_data);
		$proses_akhir_12=pow($proses_12,1/$count_ahp_data);
		$proses_akhir_13=pow($proses_13,1/$count_ahp_data);

		$isi_data = array(
			'bobot'=>$proses_akhir_1.','.$proses_akhir_2.','.$proses_akhir_3.','.$proses_akhir_4.','.$proses_akhir_5.','.$proses_akhir_6.','.$proses_akhir_7.','.$proses_akhir_8.','.$proses_akhir_9.','.$proses_akhir_10.','.$proses_akhir_11.','.$proses_akhir_12.','.$proses_akhir_13
		);
		$this->ahp_model->empty_aggregated_ahp();
		$this->ahp_model->insert_aggregated_ahp($isi_data);
		$this->ahp_result();
	}

	public function ahp_result()
	{
		$row_1  = array();
		$row_2  = array();
		$row_3  = array();
		$row_4  = array();
		$row_5  = array();
		$row_6  = array();
		$row_7  = array();
		$row_8  = array();
		$row_9  = array();
		$row_10 = array();
		$row_11 = array();
		$row_12 = array();
		$row_13 = array();
		$table_heading = array('Nama Proses');
		$row_data = array();

		$this->load->library('table');

		$template = array('table_open' => '<table class="table table-striped">');

		$this->table->set_template($template);

		$ahp_result = $this->ahp_model->get_ahp();
		foreach ($ahp_result as $res) {
			$user_detail = $this->users_model->get_by_id($res->user_id)->row();
			array_push($table_heading,$user_detail->name);
			$pecah = explode(',',$res->bobot);
			$i=0;
			do{
				if($i==0) array_push($row_1,$pecah[$i]);
				elseif($i==1) array_push($row_2,$pecah[$i]);
				elseif($i==2) array_push($row_3,$pecah[$i]);
				elseif($i==3) array_push($row_4,$pecah[$i]);
				elseif($i==4) array_push($row_5,$pecah[$i]);
				elseif($i==5) array_push($row_6,$pecah[$i]);
				elseif($i==6) array_push($row_7,$pecah[$i]);
				elseif($i==7) array_push($row_8,$pecah[$i]);
				elseif($i==8) array_push($row_9,$pecah[$i]);
				elseif($i==9) array_push($row_10,$pecah[$i]);
				elseif($i==10) array_push($row_11,$pecah[$i]);
				elseif($i==11) array_push($row_12,$pecah[$i]);
				elseif($i==12) array_push($row_13,$pecah[$i]);
				$i++;
			}while($i<13);
		}
		array_push($table_heading,'Hasil aggregasi');

		$count_ahp_data = $this->ahp_model->count_ahp();

		$row = 1;
		$proc_list= $this->metric_model->get_proc_list()->result();
		foreach($proc_list as $proc){
			array_push($row_data,$proc->proc_name);
			for($i=0;$i<$count_ahp_data;$i++){
				array_push($row_data,eval('return $row_'.$row.'['.$i.'];'));
			}

			$aggregated_ahp_result = $this->ahp_model->get_aggregated_ahp()->result();
			foreach($aggregated_ahp_result as $aggregated){
				$pecah = explode(',',$aggregated->bobot);
				array_push($row_data,'<strong>'.$pecah[$row-1].'</strong>');
			}

			$this->table->add_row($row_data);
			$row_data = array();
			$row++;
		}

		$this->table->set_heading($table_heading);
		$data['table']      = $this->table->generate();
		$data['isi']        = 'user_index';
		$data['admin_page'] = 'user_ahp_result';
		$this->load->view('home',$data);

	}

	public function question_list($temp)
	{
		$this->load->library('table');

		$template = array('table_open' => '<table class="table table-striped">');

		$this->table->set_template($template);

		$this->table->set_heading(array('data'=>'No','style'=>'width:30px'), array('data'=>'Pertanyaan','style'=>'width:450px'), array('data'=>'Jawaban','style'=>'width:70px'));
		$metric_list= $this->metric_model->get_metric_all();
		$nomor=1;
		foreach($metric_list as $metric){
			$cat  = $this->metric_model->get_cat_name($metric->cat_id)->row();
			$proc = $this->metric_model->get_proc_name($metric->proc_id)->row();
			$name =  "answer_".$metric->cat_id."_".$metric->proc_id."_".$metric->id.""; 

			if($temp!=''){
				$pieces = explode('=>',$temp[$nomor-1]);
				$answer = $pieces[0];
				$result = $pieces[1];
				$this->table->add_row($nomor++,$metric->question, 
					'<label class="radio">
						<input 	type="radio" 
								name='.$name.'
								id="yes" 
								value="1"
								'.(($result==1)?'checked="checked"':"").'
						/>Ya
					</label>
					<label class="radio">
						<input 	type="radio" 
								name='.$name.'
								id="no" 
								value="0"
								'.(($result==0 && $result!="-")?'checked="checked"':"").'
						/>Tidak
					</label>'
				);
			} else {
				$this->table->add_row($nomor++,$metric->question, 
					'<label class="radio">
						<input 	type="radio" 
								name='.$name.'
								id="yes" 
								value="1"
								
						/>Ya
					</label>
					<label class="radio">
						<input 	type="radio" 
								name='.$name.'
								id="no" 
								value="0"
								
						/>Tidak
					</label>'
				);
			}
		}
		if($temp!='') $data['error'] = '<div class="alert alert-danger"><strong>Submit gagal!</strong><br/>Kuisioner belum diisi dengan lengkap, mohon ulangi.</div>';
		$data['table'] = $this->table->generate();

		$data['isi'] = 'user_index';
		$data['admin_page'] = 'user_main';
		$this->load->view('home',$data);
	}

	public function submit()
	{
		$error = 0;
		$temp = array();
		$metric_list = $this->metric_model->get_metric_all();


		foreach ($metric_list as $metric) {
			$answer = 'answer_'.$metric->cat_id.'_'.$metric->proc_id.'_'.$metric->id;
			$value = $this->input->post($answer);
			if($value=='') {
				$value='-';
				$error++;
			}
			array_push($temp, $answer.'=>'.$value);
		}	
		if($error>0){
			$this->question_list($temp);
		} else {
			$this->count_result($temp);
		}

	}

	public function count_result($temp)
	{
		$bobot_nilai_tiap_kategori	= 0;
		$bobot_nilai_tiap_proses  	= 0;
		$bobot_nilai_kriteria		= 0;
		$nilai_kualitas_kategori	= 0;
		$nilai_kualitas_proses		= 0;
		$nilai_kualitas_kriteria	= 0;
		$nilai_total				= 0;
		$kategori 					= 0;
		$proses 					= 0;
		$kriteria 					= 0;
		$count 						= 0;
		$nilai_kategori_1			= 0;
		$nilai_kategori_2			= 0;
		$nilai_proses_1 			= 0;
		$nilai_proses_2 			= 0;
		$nilai_proses_3 			= 0;
		$nilai_proses_4 			= 0;
		$nilai_proses_5 			= 0;
		$nilai_proses_6 			= 0;
		$nilai_proses_7 			= 0;
		$nilai_proses_8 			= 0;
		$nilai_proses_9 			= 0;
		$nilai_proses_10 			= 0;
		$nilai_proses_11 			= 0;
		$nilai_proses_12 			= 0;
		$nilai_proses_13 			= 0;
		$recommendation				= array();
		$rec 						= '';

		/*
		echo $bobot_nilai_tiap_kategori.'<br>';
		echo $bobot_nilai_tiap_proses.'<br>';
		echo $bobot_nilai_kriteria.'<br>';
		echo '==============================<br>';
		*/
		
		foreach($temp as $tem){
			$pecah       = explode('=>',$tem);
			$nama        = $pecah[0];
			$nilai       = $pecah[1];
			
			$pecah_lagi  = explode('_',$nama);
			
			if($kategori != $pecah_lagi[1]) $count++;
			
			$kategori    = $pecah_lagi[1];
			$proses      = $pecah_lagi[2];
			$kriteria    = $pecah_lagi[3];

			if($proses==1){$nilai_proses_1 = $nilai_proses_1+$nilai;}
			elseif($proses==2){$nilai_proses_2 = $nilai_proses_2+$nilai;}
			elseif($proses==3){$nilai_proses_3 = $nilai_proses_3+$nilai;}
			elseif($proses==4){$nilai_proses_4 = $nilai_proses_4+$nilai;}
			elseif($proses==5){$nilai_proses_5 = $nilai_proses_5+$nilai;}
			elseif($proses==6){$nilai_proses_6 = $nilai_proses_6+$nilai;}
			elseif($proses==7){$nilai_proses_7 = $nilai_proses_7+$nilai;}
			elseif($proses==8){$nilai_proses_8 = $nilai_proses_8+$nilai;}
			elseif($proses==9){$nilai_proses_9 = $nilai_proses_9+$nilai;}
			elseif($proses==10){$nilai_proses_10 = $nilai_proses_10+$nilai;}
			elseif($proses==11){$nilai_proses_11 = $nilai_proses_11+$nilai;}
			elseif($proses==12){$nilai_proses_12 = $nilai_proses_12+$nilai;}
			else{$nilai_proses_13 = $nilai_proses_13+$nilai;}

			if($nilai == 0){
				$rec = $this->metric_model->get_by_id($kriteria)->row();
				array_push($recommendation, $rec->recommendation);
			}
			
		}
		for($i=1;$i<=10;$i++){
			$nilai_kategori_1 = $nilai_kategori_1 + eval('return $nilai_proses_'.$i.';');
		}

		for($i=11;$i<=13;$i++){
			$nilai_kategori_2 = $nilai_kategori_2 + eval('return $nilai_proses_'.$i.';');
		}

		$nilai_total = $nilai_kategori_1 + $nilai_kategori_2;

		$recommendation_list = '';
		foreach ($recommendation as $rec) {
			$recommendation_list = $rec.';'.$recommendation_list;
		}

		$id = $this->session->userdata('id');
		$isi_data = array(
			'user_id'        =>$id,
			'elearning_id'   =>'1',
			'score_process'  =>$nilai_proses_1.','.$nilai_proses_2.','.$nilai_proses_3.','.$nilai_proses_4.','.$nilai_proses_5.','.$nilai_proses_6.','.$nilai_proses_7.','.$nilai_proses_8.','.$nilai_proses_9.','.$nilai_proses_10.','.$nilai_proses_11.','.$nilai_proses_12.','.$nilai_proses_13,
			'recommendation' =>$recommendation_list
		);
		$this->user_model->insert_result($isi_data);
		$user_data = array('status'=>'1');
		$this->user_model->set_status($id,$user_data);

		$this->result();

		
	}

	public function result()
	{
		$nilai_kategori_1 = 0;
		$nilai_kategori_2 = 0;
		$nilai_proses     = array();
		$ahp_list         = array();
		$recommendation   = array();
		$id               = $this->session->userdata('id');
		$result           = $this->user_model->get_result($id)->row();
		$user_id          = $result->user_id;
		$elearning_id     = $result->elearning_id;
		$score_process    = $result->score_process;

		$recommendation_list = $result->recommendation;

		//----------------------------------------------------
		$ahp_result = $this->ahp_model->get_aggregated_ahp()->row();
		$ahp_score = $ahp_result->bobot;

		
		$ahp_list = explode(',',$ahp_score);
		$score_per_process = explode(',',$score_process);
		for($i=0;$i<=12;$i++){
			$j=$i+1;
			$criteria = $this->user_model->count_criteria_by_process($j);
			$nilai_bersih = ($score_per_process[$i]/$criteria)*$ahp_list[$i];
			array_push($nilai_proses, $nilai_bersih);

			if($i<11){
				$nilai_kategori_1+=$nilai_bersih;
			} else {
				$nilai_kategori_2+=$nilai_bersih;
			}
		}
		//----------------------------------------------------		


		//----------------------------------------------------
		$rec = explode(';',$recommendation_list);
		$k=0;
		do{ 
			if($rec[$k]=='') break;
			array_push($recommendation, $rec[$k]);
			$k++;
		}while(true);
		//----------------------------------------------------

		$data['isi']            = 'user_index';
		$data['nilai_kategori'] = array($nilai_kategori_1,$nilai_kategori_2);			
		$data['nilai_proses']   = $nilai_proses;
		$data['recommendation'] = $recommendation;
		$data['admin_page']     = 'user_result';
		$this->load->view('home',$data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */