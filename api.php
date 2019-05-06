<?php
	date_default_timezone_set("Indian/Maldives");
	//error_reporting(1);
	require_once("Rest.inc.php");
	$siteUrl="https://dss.nodescave.com/";
	class API extends REST {
		public $data = "";
		
		const DB_SERVER = "localhost";
		const DB_USER = "dbuser";
		const DB_PASSWORD = "dbpass";
		const DB = "dssdb";
		
		private $db = NULL;
	
		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}
		
		/*
		 *  Database connection 
		*/
		private function dbConnect(){
			$this->db = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD, self::DB);
			// if($this->db)
			// 	mysqli_select_db(self::DB,$this->db);
			// 	mysqli_query("SET character_set_client=utf8", $this->db);
			// 	mysqli_query("SET character_set_connection=utf8", $this->db);
		}
		
		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 *
		 */
		public function processApi(){	
			$func = null;
			if(isset($_REQUEST['rquest'])) {
				$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			}
	
			if((int)method_exists($this,$func) > 0) {
				$this->$func();
			}
			else {
			$result=array("status"=>"failed","msg"=>"method not exist");
				$this->response($this->json($result),404);
			}
		}

	
		# LIST OF DISEASES

		private function diseases() {
			$res = mysqli_query($this->db, "SELECT * FROM `tbl_disease` group by `DiseaseCode`");
			$rows= array();
			while($r = mysqli_fetch_assoc($res)) {
				array_push($rows, $r);
			}
			$this->response($this->json($rows),200);
		}

		
		# LIST OF LOCATIONS

		private function locations() {
			$res = mysqli_query($this->db, "SELECT * FROM `tbl_location`");
			$rows= array();
			while($r = mysqli_fetch_assoc($res)) {
				array_push($rows, $r);
			}
			$this->response($this->json($rows),200);
		}

		
		private function records() {
			$res = mysqli_query($this->db, "SELECT * FROM `tbl_report`");
			$rows= array();
			while($r = mysqli_fetch_assoc($res)) {
				array_push($rows, $r);
			}
			$this->response($this->json($rows),200);
		}


		# DISEASE STAT | getDiseaseStat
		# PARAM : id

		private function dstat() {
		$id = isset($this->_request['param'])?$this->_request['param']:null;
		
			if($id!=null) {
		
				$res = mysqli_query($this->db, "SELECT * FROM `tbl_report` WHERE `DISEASE_ID` = $id");
				$rows= array();
				while($r = mysqli_fetch_assoc($res)) {
					array_push($rows, $r);
				}
				$this->response($this->json($rows),200);
			} else {
				exit("Bye");
			}
		}

		# NUMBER OF PATIENTS 
		# PARAM : timeframe / last n number of days

		private function numberofpatients() {
			$days = isset($this->_request['param'])?$this->_request['param']:null;
			if($days!=null) {
		
			//	$date = strtotime('-'.$days.' days');
				//$days = date('Y-m-d', $date);
				$res = mysqli_query($this->db, "SELECT count(*) as patientperday  FROM `tbl_healthrecords` group by `EntryDateTime` order by `EntryDateTime` LIMIT 0, $days");
				$rows= array();
				while($r = mysqli_fetch_assoc($res)) {
					array_push($rows, $r);
				}
				//var_dump($rows);
				$this->response($this->json($rows),200);
			} else {
				exit("Bye");
			}

		}


		
		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return $jsn = json_encode($data);
			}
		}
	}

	header('Content-type:application/json;charset=utf-8');
	header('Access-Control-Allow-Origin: *');
	$api = new API;

	$api->processApi();
?>