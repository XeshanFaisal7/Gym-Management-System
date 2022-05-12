<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		
			extract($_POST);		
			$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				if($_SESSION['login_type'] != 1){
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}
					return 2 ;
					exit;
				}
					return 1;
			}else{
				return 3;
			}
	}
	function login2(){
		
			extract($_POST);
			if(isset($email))
				$username = $email;
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			if($_SESSION['login_alumnus_id'] > 0){
				$bio = $this->db->query("SELECT * FROM alumnus_bio where id = ".$_SESSION['login_alumnus_id']);
				if($bio->num_rows > 0){
					foreach ($bio->fetch_array() as $key => $value) {
						if($key != 'passwors' && !is_numeric($key))
							$_SESSION['bio'][$key] = $value;
					}
				}
			}
			if($_SESSION['bio']['status'] != 1){
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}
					return 2 ;
					exit;
				}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = '$type' ";
		if($type == 1)
			$establishment_id = 0;
		$data .= ", establishment_id = '$establishment_id' ";
		$chk = $this->db->query("Select * from users where username = '$username' and id !='$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}
	function signup(){
		extract($_POST);
		$data = " name = '".$firstname.' '.$lastname."' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$uid = $this->db->insert_id;
			$data = '';
			foreach($_POST as $k => $v){
				if($k =='password')
					continue;
				if(empty($data) && !is_numeric($k) )
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if($_FILES['img']['tmp_name'] != ''){
							$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
							$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
							$data .= ", avatar = '$fname' ";

			}
			$save_alumni = $this->db->query("INSERT INTO alumnus_bio set $data ");
			if($data){
				$aid = $this->db->insert_id;
				$this->db->query("UPDATE users set alumnus_id = $aid where id = $uid ");
				$login = $this->login2();
				if($login)
				return 1;
			}
		}
	}
	function update_account(){
		extract($_POST);
		$data = " name = '".$firstname.' '.$lastname."' ";
		$data .= ", username = '$email' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' and id != '{$_SESSION['login_id']}' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("UPDATE users set $data where id = '{$_SESSION['login_id']}' ");
		if($save){
			$data = '';
			foreach($_POST as $k => $v){
				if($k =='password')
					continue;
				if(empty($data) && !is_numeric($k) )
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if($_FILES['img']['tmp_name'] != ''){
							$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
							$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
							$data .= ", avatar = '$fname' ";

			}
			$save_alumni = $this->db->query("UPDATE alumnus_bio set $data where id = '{$_SESSION['bio']['id']}' ");
			if($data){
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				$login = $this->login2();
				if($login)
				return 1;
			}
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['settings'][$key] = $value;
		}

			return 1;
				}
	}

	
	function save_announcement(){
		extract($_POST);
		$data='';
		$data = " announcement_title = '$announcement_title' ";
		$data .= ", audience = '$audience' ";
		$data .= ", announcement = '$announcement' ";

			if(empty($id)){
				$query="INSERT INTO announcements set $data";

				$save = $this->db->query($query);
				

			}else{
				$save = $this->db->query("UPDATE announcements set $data where id = $id");
			}
		if($save)
			return 1;
	}
	function delete_announcement(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM announcements where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_package(){
		extract($_POST);
		$data = " package_id = '$package_id' ";
		$data .= ", package = '$package' ";
		$data .= ", plan = '$plan' ";
		$data .= ", description = '$description' ";
		$data .= ", amount = '$amount' ";
			if(empty($id)){
				$save = $this->db->query("INSERT INTO packages set $data");
			}else{
				$save = $this->db->query("UPDATE packages set $data where id = $id");
			}
		if($save)
			return 1;
	}
	function delete_package(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM packages where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_trainer(){
		extract($_POST);
		$data='';
		

			if(empty($id)){
				$otp=mt_rand(1000,9999);
		$data = " trainer_id = '$trainer_id' ";
		$data .= ", password = '$otp' ";
		$data .= ", name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", experience_years = '$experience_years' ";
		$data .= ", area = '$area' ";
		$data .= ", starting_time = '$starting_time' ";
		$data .= ", ending_time = '$ending_time' ";
				$query="INSERT INTO trainers set $data";

				$save = $this->db->query($query);
				if($save)
	
    $phone_no=$contact;
    $username=$trainer_id;
    $password=$otp;				
	$url = "https://lifetimesms.com/plain";

    $parameters = [
        "api_token" => "e2f9ec0e003b0adb7db8fa89df576ac74362804614",
        "api_secret" => "salmonpuff123",
        "to" => $phone_no,
        "from" => "Lifetimesms",
        "message" => "Thanks For Registering Gym Management System .Here are your trainer login Credentials:
        UserID:".$username." 
        Password:".$otp."
        This is one time password",
    ];

    $ch = curl_init();
    $timeout  =  30;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $response = curl_exec($ch);
    curl_close($ch);	

			}
			else
			{
				$data = " trainer_id = '$trainer_id' ";
		$data .= ", name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", experience_years = '$experience_years' ";
		$data .= ", area = '$area' ";
		$data .= ", starting_time = '$starting_time' ";
		$data .= ", ending_time = '$ending_time' ";
				$save = $this->db->query("UPDATE trainers set $data where id = $id");
			}
		if($save)
			return 1;
	}
	function delete_trainer(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM trainers where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_joiner()
	{

		extract($_POST);

		$data = '';
		
			if(empty($joiner_id)){
	
				$i = 1;
				while($i == 1){
					$rand = mt_rand(1,99999999);
					$rand =sprintf("%'08d",$rand);
					$chk = $this->db->query("SELECT * FROM joiners where joiner_id = '$rand' ")->num_rows;
					if($chk <= 0)
					{
						$data = "joiner_id='$rand' ";
						$data .= ", firstname = '$firstname' ";
		                $data .= ", middlename = '$middlename' ";
		                $data .= ", lastname = '$lastname' ";
		                $data .= ", gender = '$gender' ";
		                $data .= ", contact = '$contact' ";
		                $data .= ", address = '$address' ";
		                $data .= ", email = '$email' ";
		                $data .= ", bmi = '$BMI' ";
		                $data .= ", height = '$height' ";
		                $data .= ", mass = '$mass' ";
                        $data .= ", age = '$age' ";
                        $data .= ", status = '$status' ";
                        $data .= ", session = '$session' ";
               
						
						$i = 0;
					}
				}
			}

		if(empty($id)){
			if(!empty($joiner_id))
			{
				$chk = $this->db->query("SELECT * FROM joiners where joiner_id = '$joiner_id' ")->num_rows;
				if($chk > 0)
				{
					return 2;
					exit;
				}
				$data = "joiner_id='$joiner_id' ";
						$data .= ", firstname = '$firstname' ";
		                $data .= ", middlename = '$middlename' ";
		                $data .= ", lastname = '$lastname' ";
		                $data .= ", gender = '$gender' ";
		                $data .= ", contact = '$contact' ";
		                $data .= ", address = '$address' ";
		                $data .= ", email = '$email' ";
		                $data .= ", bmi = '$BMI' ";
		                $data .= ", height = '$height' ";
		                $data .= ", mass = '$mass' ";
                        $data .= ", age = '$age' ";
                        $data .= ", status = '$status' ";
                        $data .= ", session = '$session' ";
			}
			            
			$query="INSERT INTO joiners set $data ";
			
			$save = $this->db->query($query);
			
			if($save){
	
				$joiner_id = $this->db->insert_id;
				$data = " joiner_id ='$joiner_id' ";
				$data .= ", start_date ='".date("Y-m-d")."' ";
				$data .= ", end_date ='".date("Y-m-d")."' ";
				$query="INSERT INTO registration_info set $data";

				$save = $this->db->query($query);
				
				if(!$save)
					$this->db->query("DELETE FROM joiners where id = $joiner_id");
			}
		}else{
			
			if(!empty($joiner_id)){
				$chk = $this->db->query("SELECT * FROM joiners where joiner_id = '$joiner_id' and id != $id ")->num_rows;
				if($chk > 0){
					return 2;
					exit;
				}
			}
			$save = $this->db->query("UPDATE joiners set $data where id=".$id);
		}

		if($save)
$otp=mt_rand(1000,9999);
$query="UPDATE `joiners` SET `password`='$otp' where id = '$joiner_id'";
$result=$this->db->query($query);

$query1="SELECT * FROM `joiners` where id = '$joiner_id'";
$result=$this->db->query($query1);
$row=mysqli_fetch_assoc($result);
$id=$row['joiner_id'];
$phone_no=$contact;
$username=$id;
$password=$otp;

$url = "https://lifetimesms.com/plain";

    $parameters = [
        "api_token" => "e2f9ec0e003b0adb7db8fa89df576ac74362804614",
        "api_secret" => "salmonpuff123",
        "to" => $contact,
        "from" => "Lifetimesms",
        "message" => "Thanks For Registering Gym Management System.Here are your login Credentials:
        UserID:".$username." 
        Password:".$otp."
        This is one time password",
    ];

    $ch = curl_init();
    $timeout  =  30;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $response = curl_exec($ch);
    curl_close($ch);

			return 1;
	}

	
	function delete_joiner()
	{
	
		extract($_POST);
		$delete = $this->db->query("DELETE FROM joiners where id = ".$id);
		if($delete){
			return 1;
		}
	}

	function update_joiner()
	{
   extract($_POST);
   $data='';


                        $data = "joiner_id='$joiner_id' ";
						$data .= ", firstname = '$firstname' ";
		                $data .= ", middlename = '$middlename' ";
		                $data .= ", lastname = '$lastname' ";
		                $data .= ", gender = '$gender' ";
		                $data .= ", contact = '$contact' ";
		                $data .= ", address = '$address' ";
		                $data .= ", email = '$email' ";
		                $data .= ", bmi = '$BMI' ";
		                $data .= ", height = '$height' ";
		                $data .= ", mass = '$mass' ";
                        $data .= ", age = '$age' ";
                        $data .= ", status = '$status' ";
                        $data .= ", session = '$session' ";
                        $save = $this->db->query("UPDATE joiners set $data where id=".$id);
			if($save)
				return 1;
	}

	function save_schedule(){
		extract($_POST);
		$data = " member_id = '$member_id' ";
		$data .= ", date_from = '{$date_from}-1' ";
		$data .= ", date_to = '".(date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')))."' ";
		$data .= ", time_from = '$time_from' ";
		$data .= ", time_to = '$time_to' ";
		$data .= ", dow = '".(implode(",",$dow))."'";

		if(empty($id)){

			$save = $this->db->query("INSERT INTO schedules set ".$data);
		}else{
			$save = $this->db->query("UPDATE schedules set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_schedule(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM schedules where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function get_schecdule(){
		extract($_POST);
		$data = array();
		$qry = $this->db->query("SELECT s.*,concat(m.lastname,',',m.firstname,' ', m.middlename) as name FROM schedules s inner join members m on m.id = s.member_id");
		while($row=$qry->fetch_assoc()){
			
			$data[] = $row;
		}
			return json_encode($data);
	}
	function save_payment(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k=> $v){
			if(!empty($v)){
				if(empty($data))
				$data .= " $k='{$v}' ";
				else
				$data .= ", $k='{$v}' ";
			}
		}
			$save = $this->db->query("INSERT INTO payments set ".$data);
		if($save)
			return 1;
	}
	function renew_membership(){
		extract($_POST);
		$prev = $this->db->query("SELECT * FROM registration_info where id = $rid")->fetch_array();
		$data = '';
		foreach($prev as $k=> $v){
			if(!empty($v) && !is_numeric($k) && !in_array($k,array('id','start_date','end_date','date_created'))){
				if(empty($data))
				$data .= " $k='{$v}' ";
				else
				$data .= ", $k='{$v}' ";
				$$k=$v;
			}
		}
				$data .= ", start_date ='".date("Y-m-d")."' ";
				$plan = $this->db->query("SELECT * FROM plans where id = $plan_id")->fetch_array()['plan'];
				$data .= ", end_date ='".date("Y-m-d",strtotime(date('Y-m-d').' +'.$plan.' months'))."' ";
				$save = $this->db->query("INSERT INTO registration_info set $data");
				if($save){
					$id = $this->db->insert_id;
					$this->db->query("UPDATE registration_info set status = 0 where member_id = $member_id and id != $id ");
					return $id;
				}

	}
	function end_membership(){
		extract($_POST);
		$update = $this->db->query("UPDATE registration_info set status = 0 where id = ".$rid);
		if($update){
			return 1;
		}
	}
	
	function save_membership(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k=> $v){
		if(!empty($v)){
			if(empty($data))
			$data .= " $k='{$v}' ";
			else
			$data .= ", $k='{$v}' ";
			$$k=$v;
		}
	}
	$data .= ", start_date ='".date("Y-m-d")."' ";
	$plan = $this->db->query("SELECT * FROM plans where id = $plan_id")->fetch_array()['plan'];
	$data .= ", end_date ='".date("Y-m-d",strtotime(date('Y-m-d').' +'.$plan.' months'))."' ";
	$save = $this->db->query("INSERT INTO registration_info set $data");
	if($save){
		$id = $this->db->insert_id;
		$this->db->query("UPDATE registration_info set status = 0 where member_id = $member_id and id != $id ");
		return 1;
	}
	}
}