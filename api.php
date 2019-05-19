<?php
	date_default_timezone_set("Indian/Maldives");
	//error_reporting(1);
	require_once("Rest.inc.php");
	$siteUrl="https://dss.nodescave.com/";
	class API extends REST {
		public $data = "";
		
		const DB_SERVER = "localhost";
		const DB_USER = "dbuser"; //db user
		const DB_PASSWORD = "dbpass"; //db user
		const DB = "dssdb"; //db name
		
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


		# RETURN REPORT FILTERED BY DISEASE
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

		#currentvslast
		#PARAM: param year1
		#		param2 year2
		#		param3 diseaseID
		#		param4 locationID


		private function compareyears() {
			$one = isset($this->_request['param'])?$this->_request['param']:null;
			$two = 	isset($this->_request['param2'])?$this->_request['param2']:null;
			$three = 	isset($this->_request['param3'])?$this->_request['param3']:null;
			$four = 	isset($this->_request['param4'])?$this->_request['param4']:null;
			if($one!=null && $two!=null) { 
				//if year and location given
				$q = "SELECT count(*) as patientpermonth, 
				YEAR(`EntryDateTime`) as year_, 
				MONTH(`EntryDateTime`) as month_,
				CONCAT(YEAR(`EntryDateTime`), MONTH(`EntryDateTime`)) as period_
				FROM `tbl_healthrecords` 
				WHERE  YEAR(`EntryDateTime`) = '$one' OR '$two' group by period_ order by period_ DESC LIMIT 0, 24";
			}


			if($one!=null && $two!=null && $four!=null) { 
				//if year and location given
				$q = "SELECT count(*) as patientpermonth, 
				YEAR(`EntryDateTime`) as year_, 
				MONTH(`EntryDateTime`) as month_,
				CONCAT(YEAR(`EntryDateTime`), MONTH(`EntryDateTime`)) as period_
				FROM `tbl_healthrecords` 
				WHERE `LocationID` = '$four' AND YEAR(`EntryDateTime`) = '$one' OR '$two' group by period_ order by period_ DESC LIMIT 0, 24";
			}

			if($one!=null && $two!=null && $three!=null) { 
				//if year and location given
				$q = "SELECT count(*) as patientpermonth, 
				YEAR(`EntryDateTime`) as year_, 
				MONTH(`EntryDateTime`) as month_,
				CONCAT(YEAR(`EntryDateTime`), MONTH(`EntryDateTime`)) as period_
				FROM `tbl_healthrecords` 
				WHERE `DiseaseID` = '$three' AND YEAR(`EntryDateTime`) = '$one' OR '$two' group by period_ order by period_ DESC LIMIT 0, 24";
			}
			
			if($one!=null && $two!=null && $three!=null && $four!=null) {
			$q = "SELECT count(*) as patientpermonth, 
			YEAR(`EntryDateTime`) as year_, 
			MONTH(`EntryDateTime`) as month_,
			CONCAT(YEAR(`EntryDateTime`), MONTH(`EntryDateTime`)) as period_
			FROM `tbl_healthrecords` 
			WHERE `DiseaseID` = '$three' AND `LocationID` = '$four' AND YEAR(`EntryDateTime`) = '$one' || YEAR(`EntryDateTime`) = '$two' group by period_ order by period_ DESC LIMIT 0, 24";
			}

		// echo $q;

			$res = mysqli_query($this->db, $q);
				$rows= array();
				$indexone = array();
				$indextwo = array();
				while($r = mysqli_fetch_assoc($res)) {
				if($r['year_'] == $one) {
					array_push($indexone, $r);
				} else {
					array_push($indextwo, $r);
				}
				//var_dump($rows);
				}
				array_push($rows, $indexone);
				array_push($rows, $indextwo);


				$this->response($this->json($rows),200);
			
		}
		#get region of the location
		#param LocationID

		private function locationbyid() {
			 $location = isset($this->_request['param'])?$this->_request['param']:null;
			 $res = mysqli_query($this->db, "SELECT * FROM `tbl_location` WHERE `LocationID` = '$location' LIMIT 0,1");
			 $island = array();
			 while($r = mysqli_fetch_assoc($res)) {
			 array_push($island,$r['IslandName']);
			 }
			 $this->response($this->json($island),200);
		}
		
		#breakouts
		#PARAM: none | year
		private function breakouts() {
		//	$timeframe = isset($this->_request['param'])?$this->_request['param']:null;
		$q = "SELECT count(c) as patientperdisease, `DiseaseID`,`LocationID`, monthofyear 
			from 
			(SELECT count(`HealthRecordID`) as c, `DiseaseID`, `LocationID`, month(`EntryDateTime`) as monthofyear from tbl_healthrecords WHERE year(`EntryDateTime`) = 2016 GROUP BY`DiseaseID` ORDER BY `EntryDateTime`) as filter1 
			GROUP BY monthofyear";
		$breaks = array();
		$re = mysqli_query($this->db, $q);
		while($r = mysqli_fetch_assoc($re)) {
				array_push($breaks, $r);
		}
		//echo $this->getRegion(10);

			$this->response($this->json($breaks),200);

			}


		private function topregions() {
			$q = "SELECT count(`HealthRecordID`) as numberofparientsperlocation, tbl_healthrecords.`LocationID`, tbl_location.`IslandName` FROM tbl_healthrecords 
			INNER JOIN tbl_location 
			ON tbl_location.LocationID = tbl_healthrecords.LocationID
			WHERE year(`EntryDateTime`) = '2016' OR '2017' GROUP BY tbl_healthrecords.`LocationID` ORDER BY numberofparientsperlocation DESC LIMIT 0, 4";

			$re = mysqli_query($this->db, $q);
			$top = array();
			while($r = mysqli_fetch_assoc($re)) {
				array_push($top, $r);
			}
			$this->response($this->json($top), 200);
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