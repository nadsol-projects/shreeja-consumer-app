<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {
    
    public function __construct(){
			
    	parent::__construct();
    	
    // 	$this->secure->loginCheck();
    	
    }
    
    public function index(){
        
        $this->load->view("sql_backup");
        
    }
    
	public function restore_order(){
        
        $this->load->view("restore_order");
        
    }

	public function restoreOrder(){

		$order_id = $this->input->post('order_id');
		$date = $this->input->post('date');

		$odata = [];
		$opdata = [];
		$sddata = [];
		$orderscsv = array_map('str_getcsv', file(base_url()."uploads/backups/orders_$date.csv"));
		$order_productscsv = array_map('str_getcsv', file(base_url()."uploads/backups/orders_products_$date.csv"));
		$subscribed_deliveriescsv = array_map('str_getcsv', file(base_url()."uploads/backups/subscribed_deliveries_$date.csv"));

		if(count($orderscsv) > 0){
			foreach($orderscsv as $key => $order){
				if($order[1] == $order_id){
					$odata = $orderscsv[$key];
				}
			}
		}else{
			$this->session->set_flashdata('err','<div class="alert alert-danger">Order Details Not Found.</div>');
			redirect('backup/restore_order');
		}

		if(count($order_productscsv) > 0){
			foreach($order_productscsv as $key1 => $order_product){
				if($order_product[1] == $order_id){
					array_push($opdata,$order_productscsv[$key1]);
				}
			}
		}

		if(count($subscribed_deliveriescsv) > 0){
			foreach($subscribed_deliveriescsv as $key2 => $subscribed_delivery){
				if($subscribed_delivery[4] == $order_id){
					array_push($sddata,$subscribed_deliveriescsv[$key2]);
				}
			}
		}

		if($odata){
			$this->db->where("order_id", $order_id)->update("orders", [
				"sub_start_date" => $odata[18], 
				"sub_end_date" => $odata[19], 
				"sdate"=>$odata[20],
				"edate"=>$odata[21],
			]);
		}

		if(count($sddata) > 0){
			$keys = $subscribed_deliveriescsv[0];

			foreach($sddata as $skey => $s){
				$sddata[$skey] = array_combine($keys, $s);
			} 
			$this->db->delete("subscribed_deliveries", ["order_id"=>$order_id]);
			$this->db->insert_batch("subscribed_deliveries", $sddata);
		}

		$this->session->set_flashdata('err','<div class="alert alert-success">Order Details Updated Successfully.</div>');
		redirect('backup/restore_order');
		
	}

	public function Zip( $source, $destination , $excludes=[],$db="") {
	
		$root = $source."/".str_replace("\\","/",$_SERVER["DOCUMENT_ROOT"])."/";
		
		if ( is_string( $source ) )$source_arr = array( $source ); // convert it to array

		if ( !extension_loaded( 'zip' ) ) {
			return false;
		}

		$zip = new ZipArchive();
		if ( !$zip->open( $destination, ZIPARCHIVE::CREATE ) ) {
			return false;
		}
		if (is_file($source) === false)
			$zip->addEmptyDir($source);

		if($source != "database"){
		
			foreach ( $source_arr as $source ) {
				if ( !file_exists( $source ) ) continue;

				$asource = $source;
				$source = str_replace( '\\', '/', realpath( $source ) );

				if ( is_dir( $source ) === true ) {
					$files = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $source ), RecursiveIteratorIterator::SELF_FIRST );
					foreach ( $files as $file ) {
						$file = str_replace( '\\', '/', realpath( $file ) );

						if ( is_dir( $file ) === true ) {

							$dfile = str_replace( $source . '/', '', $file . '/' );
							$dfile = $asource."/".$dfile;
	//						echo "Dir - ".$dfile."<br>";		

							if($dfile != $root)
								$zip->addEmptyDir($dfile);

						} else if (is_file( $file ) === true) {

							$ffile = str_replace( $source . '/', '', $file );
							$ffile = $asource."/".$ffile;
		//					echo "File- ".$ffile."<br>";
							$dname = pathinfo($ffile, PATHINFO_DIRNAME);


							if(($asource != "uploads") && (!in_array($dname,$excludes))){
		//						echo $asource." ".$ffile."<br>";
								$zip->addFromString($ffile, file_get_contents( $ffile ) );
							}
						}
					}
				} else if ( is_file( $source ) === true ) {
					$zip->addFromString( basename( $source ), file_get_contents( $source ) );
				}

			}

			return $zip->close();
			
		}else{
			
			$zip->addFromString($source."/".basename($db), file_get_contents( $db ) );
			return $zip->close();
			
		}

	}

	public function backupsource_code(){
		
		$outputfile_name = "uploads/backups/source/vfair_".strtotime(date("Y-m-d H:i:s")).".zip";
		
		$this->Zip("application",$outputfile_name,["application/logs"]);
		$this->Zip("uploads",$outputfile_name,["uploads"]);
		$this->Zip("services",$outputfile_name);
		$this->Zip("system",$outputfile_name);
		$this->Zip("tests",$outputfile_name);
		$this->Zip("vendor",$outputfile_name);
		$this->Zip("assets",$outputfile_name,["assets/advertise","assets/auditorium","assets/auditorium/images","assets/categories","assets/clients","assets/experts","assets/images/blog","assets/images/brochure","assets/images/cards","assets/images/front","assets/images/gallery","assets/images/guests","assets/images/homepage","assets/images/image-gallery","assets/images/partners","assets/images/lg","assets/images/picsadd","assets/images/professors","assets/images/testimonials","assets/images/webinars","assets/institutes","assets/institutes/studentplacement","assets/news","assets/placements","assets/questions","assets/speakers","assets/videos","assets/zoomvideos"]);

		$this->Zip(".htaccess",$outputfile_name);
		$this->Zip(".user.ini",$outputfile_name);
		$this->Zip("composer.json",$outputfile_name);
		$this->Zip("composer.lock",$outputfile_name);
		$this->Zip("index.php",$outputfile_name);
		
		$d = $this->db->insert("tbl_backups",["type"=>"source","source_file"=>$outputfile_name,"created_date"=>date("Y-m-d H:i:s")]);
		
		if($d){
		
			$backup_name = "uploads/backups/database/vfair" . "_" . date('H-i-s') . "_" . date('d-m-Y') . ".sql";
			
			$this->dbdata($backup_name,["countries","states","tbl_admin_menu","tbl_countries","tbl_footer_menu","tbl_footer_menu","tbl_footer_submenu","tbl_menu_header","tbl_states","tbl_types"]);
			
			$this->Zip("database",$outputfile_name,[],$backup_name);
			unlink($backup_name);
			
			header("Content-type: application/zip"); 
			header("Content-Disposition: attachment; filename=vfair_".strtotime(date("Y-m-d H:i:s")).".zip");
			header("Content-length: " . filesize($outputfile_name));
			header("Pragma: no-cache"); 
			header("Expires: 0"); 
			readfile("$outputfile_name");
			
		}
	}
	
	public function db_backup(){
       date_default_timezone_set('Asia/Calcutta');
      // Load the DB utility class 
      $this->load->dbutil(); 
      $prefs = array(
		  		'format' => 'zip',
                'filename' => 'backup_'.date('d_m_Y_H_i_s').'.sql', 
                'add_drop' => TRUE,
                'add_insert'=> TRUE,
                'newline' => "\n"
              ); 
         // Backup your entire database and assign it to a variable 
         $backup =& $this->dbutil->backup($prefs); 
         // Load the file helper and write the file to your server 
         $this->load->helper('file'); 
        //  write_file('uploads/backups/database/'.'dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup); 
		
		$this->db->insert("tbl_backups",["type"=>"database","source_file"=>'uploads/backups/database/'.'dbbackup_'.date('d_m_Y_H_i_s').'.zip',"created_date"=>date("Y-m-d H:i:s")]);
         // Load the download helper and send the file to your desktop 
         $this->load->helper('download'); 
         force_download('dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup);

	}
	
	public function dbdata($backup_name="",$rtables=[]){
		
		$host = $this->db->hostname;
		$user = $this->db->username;
		$pass = $this->db->password;
		$name = $this->db->database;
		$tables = false;
	
		$mysqli = new mysqli($host, $user, $pass, $name);
		$mysqli->select_db($name);
		$mysqli->query("SET NAMES 'utf8'");
		$queryTables = $mysqli->query('SHOW TABLES');
		while ($row = $queryTables->fetch_row())
		{
			$target_tables[] = $row[0];
		}
		if ($tables !== false)
		{
			$target_tables = array_intersect($target_tables, $tables);
		}

//		echo '<pre>';

		try
		{
			foreach ($target_tables as $table)
			{
				$result = $mysqli->query('SELECT * FROM ' . $table);
				$fields_amount = $result->field_count;
				$rows_num = $mysqli->affected_rows;
				$res = $mysqli->query('SHOW CREATE TABLE ' . $table);
				$TableMLine = $res->fetch_row();

				$content = (!isset($content) ? '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";
				for ($i = 0, $st_counter = 0; $i < $fields_amount; $i ++, $st_counter = 0)
				{

					if(in_array($table,$rtables)){

						while ($row = $result->fetch_row())
						{ //when started (and every after 100 command cycle):
//							print_r($row);
							if ($st_counter % 100 == 0 || $st_counter == 0)
							{
								$content .= "\nINSERT INTO " . $table . " VALUES";
							}
							$content .= "\n(";
							for ($j = 0; $j < $fields_amount; $j ++)
							{
								$row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
								if (isset($row[$j]))
								{
									$content .= '"' . $row[$j] . '"';
								} else
								{
									$content .= '""';
								}
								if ($j < ($fields_amount - 1))
								{
									$content .= ',';
								}
							}
							$content .= ")";
							//every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
							if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num)
							{
								$content .= ";";
							} else
							{
								$content .= ",";
							}
							$st_counter = $st_counter + 1;
						}
					}
				}

				$content .= "\n\n\n";
			}
		} catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage(), "\n";
		}
//		echo $content;
		
		$this->load->helper('file'); 
        write_file($backup_name, $content); 
		
	}
	
	public function backup_orders_datewise(){

		$this->load->dbutil();

		$date = date("Y-m-d", strtotime('-1 day'));
		
		$orders_query = "SELECT * FROM orders where DATE(date_of_order) = '$date'";
        $orders_result = $this->db->query($orders_query);

		$orders_products_query = "SELECT * FROM order_products where DATE(delivery_date) = '$date'";
        $orders_products_result = $this->db->query($orders_products_query);

		$subscribed_deliveries_query = "SELECT * FROM tbl_subscribed_deliveries where DATE(created_date) = '$date'";
        $subscribed_deliveries_result = $this->db->query($subscribed_deliveries_query);

        if ($orders_result->num_rows() > 0) {
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($orders_result, $delimiter, $newline);
            $filename = "orders_$date.csv";
            $path = FCPATH . 'uploads/backups/' . $filename;
            if (write_file($path, $data)) {
				$this->db->insert("tbl_backups", ["type"=>"transactions", "source_file"=>'uploads/backups/' . $filename,"created_date"=> date("Y-m-d H:i:s")]);
                log_message('info', 'Data exported successfully to ' . $filename);
            } else {
				log_message('error', 'Unable to write data to ' . $filename);
            }
        } else {
            log_message('error', 'No data found for orders of '.$date);
        }

// order_products
		if ($orders_products_result->num_rows() > 0) {
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($orders_products_result, $delimiter, $newline);
            $filename = "orders_products_$date.csv";
            $path = FCPATH . 'uploads/backups/' . $filename;
            if (write_file($path, $data)) {
				$this->db->insert("tbl_backups", ["type"=>"transactions", "source_file"=>'uploads/backups/' . $filename,"created_date"=> date("Y-m-d H:i:s")]);
				log_message('info', 'Data exported successfully to ' . $filename);
            } else {
				log_message('error', 'Unable to write data to ' . $filename);
            }
        } else {
            log_message('error', 'No data found for orders_products of '.$date);
        }

// subscribed_deliveries
		if ($subscribed_deliveries_result->num_rows() > 0) {
			$delimiter = ",";
			$newline = "\r\n";
			$data = $this->dbutil->csv_from_result($subscribed_deliveries_result, $delimiter, $newline);
			$filename = "subscribed_deliveries_$date.csv";
			$path = FCPATH . 'uploads/backups/' . $filename;
			if (write_file($path, $data)) {
				$this->db->insert("tbl_backups", ["type"=>"transactions", "source_file"=>'uploads/backups/' . $filename,"created_date"=> date("Y-m-d H:i:s")]);
				log_message('info', 'Data exported successfully to ' . $filename);
            } else {
				log_message('error', 'Unable to write data to ' . $filename);
            }
        } else {
            log_message('error', 'No data found for subscribed_deliveries of '.$date);
        }
	}

}
