<?php


define('POST_METHOD','post');
define('GET_METHOD','get');

define('USER_SALT_START',5);
define('USER_SALT_LENGTH',5);

define('OTP_SALT_START',3);
define('OTP_SALT_LENGTH',6);

define('PASSWORD_SALT','$2aKleanMax');

// DB CONFIG
define('DB_HOST', 'localhost'); // Host name
define('DB_USER', 'root'); // DB User name
define('DB_PASSWORD', ''); // DB Password
define('DB_NAME', 'KleanMax'); // DB Name

require_once 'Zebra_Image.php';
require_once 'PageDealer.php';
require_once 'Database.php';
require_once 'Medoo.php';
require_once 'class.phpmailer.php';

use Medoo\Medoo;

class Helper {

	use PageDealer;
	use Database;

	public $db;

	public function __construct() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start(); //Check whether SESSION already started, if not then start a session.
		}				

		$db_vars = array(
			'database_type' => 'mariadb',
			'server' => DB_HOST,
			'username' => DB_USER,
			'password' => DB_PASSWORD,
			'database_name' => DB_NAME
		);

		// $this->db = new Medoo($db_vars);

		// $this->db(); //Start Mysqli Connection
		$this->renderPageDetails(); //Start Page details Class
	}

	public function _Obj($array = array()){
		foreach ($array as $item){
			$data[] = (object) $item;
		}
		return $data;
	}

	function wrapResult($result = array()){
		return (object) $result;
	}

	function dateFormat($date,$format = 'd-m-Y') {
		if (DateTime::createFromFormat('Y-m-d G:i:s', $date) !== FALSE) {
			$converted = date($format,$date);
		}else{
			$converted = date($format,strtotime($date));
		}
		return $converted;
	}

	function checkEmptyArray($linksArray){
		foreach($linksArray as $key => $link)
		{
			if($link === '')
			{
				unset($linksArray[$key]);
			}else if($key === ''){
				unset($linksArray[$key]);
			}
		}
		return $linksArray;
	}

	function generateOTP() {
		$time = date('F j, Y, g:i a');
		return substr(md5($time),OTP_SALT_START, OTP_SALT_LENGTH);
	}

	function makeMoney($number) {
		return number_format($number,2);
	}

	function readMoreable($string, $max_length = 200, $prefix = '..'){
		if(!empty($string)){
			return mb_strimwidth(htmlspecialchars_decode(strip_tags(htmlspecialchars(filter_var($string,FILTER_SANITIZE_STRING)))), 0, $max_length, $prefix);
		}
		return false;
	}

	function generateAccessKey($method = NULL, $string = NULL) {
		if(!is_null($method)){
			return md5($method.$this->page_url);
		}
		return md5($string);
	}

	function validateAccessKey($method = NULL, $access_key, $string = NULL) {
		if(!empty($access_key) && !is_null($access_key)){
			$current_access_key = md5($method.$this->previous_url);
			if(is_null($method)){
				$current_access_key = md5($string);
			}
			if($current_access_key === $access_key){
				return true;
			}
			return false;
		}
		return false;
	}	

	public function dashesToCamelCase($string, $capitalizeFirstCharacter = false) {
		$str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
		if (!$capitalizeFirstCharacter) {
			$str[0] = strtolower($str[0]);
		}
		return $str;
	}

	public function triggerSweetAlert(){
		if(isset($_SESSION['swal']) && is_array($_SESSION['swal'])){
			$data = $_SESSION['swal'];
			unset($_SESSION['swal']);

			$html = 'swal({
					  title: "'.$data['title'].'",
                      text: "'.$data['text'].'",
                      type: "'.$data['type'].'",					  
					  closeOnConfirm: true,
					  showCancelButton: false		  
					});';

			if($data['code'] == 'not_logged_in'){
				$html = 'swal({
                                title: "'.$data['title'].'",
                                text: "'.$data['text'].'",
                                type: "'.$data['type'].'",
                                showCancelButton: false,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true
                            },function () {
					setTimeout(function () {
						window.location.href = '.($this->base_url).'+\'sign-in.php\';
					},1000);';
			}

			return $html;
		}
		return false;
	}

	public function placeAlert(){
		if(isset($_SESSION['msg']) && $_SESSION['msg'] != ''){
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
			return '<div class="be-row be-wrap clearfix">
                                        <div class="one-col column-block clearfix" data-animation="" style="  ">
                                            <div class="be-custom-column-inner">
                                                <div class="be-notification " style="background-color:#7fc68a;" data-animation="fadeIn">
                                                    <span class="close"><i class="font-icon icon-icon_close"></i></span>
                                                    <h6><span style="color: #ffffff;">'.$msg.'</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
		}
		if(isset($_SESSION['err']) && $_SESSION['err'] != ''){
			$err = $_SESSION['err'];
			unset($_SESSION['err']);

			return '<div class="be-row be-wrap clearfix">
                                        <div class="one-col column-block clearfix" data-animation="" style="  ">
                                            <div class="be-custom-column-inner">
                                                <div class="be-notification " style="background-color:#dd3737;" data-animation="fadeIn">
                                                    <span class="close"><i class="font-icon icon-icon_close"></i></span>
                                                    <h6><span style="color: #ffffff;">'.$err.'</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
		}
		return false;
	}

	public function setSweetAlertMessage($data){
		$_SESSION['swal'] = $data;

		return $this;
	}

	public function setAlertMessage($type = 'msg',$data){
//		$this->unsetAlerts();
		if($type == 'msg'){
			$_SESSION['msg'] = $data;
		}else if ($type == 'err'){
			$_SESSION['err'] = $data;
		}
		return $this;
	}

	public function isEmail($string = NULL){
		if(!is_null($string)){
			if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
				return true;
			}
			return false;
		}
		return false;
	}

	public function isAlpha($string = NULL){
		if(preg_match("/[a-z]/i", $string)){
			return true;
		}
		return false;
	}

	public function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	public function unsetAlerts(){
		unset($_SESSION['msg'],$_SESSION['err'],$_SESSION['login_msg'],$_SESSION['login_err'],$_SESSION['cart_msg'],$_SESSION['cart_err']);
	}

	public function logMessage(){
		if(isset($_SESSION['msg']) && $_SESSION['msg'] != ''){
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
			return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> '.$msg.'</div>';
		}
		if(isset($_SESSION['err']) && $_SESSION['err'] != ''){
			$err = $_SESSION['err'];
			unset($_SESSION['err']);
			return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> '.$err.'</div>';
		}
		return false;
	}

	public function redirect($page,$ext_type = true){
		if($ext_type !== false){
			$page .= '.php';
		}
		header('location: '.$page);
	}

	public static function slugify($text) {
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	public function convertToBase64($imagePath) {
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$type = $finfo->file($imagePath);
		return 'data:'.$type.';base64,'.base64_encode(file_get_contents($imagePath));
	}

	public function imageResize($source,$target,$height=150,$width=150){

		$zebra = new Zebra_Image();

		// if you handle image uploads from users and you have enabled exif-support with --enable-exif
		// (or, on a Windows machine you have enabled php_mbstring.dll and php_exif.dll in php.ini)
		// set this property to TRUE in order to fix rotation so you always see images in correct position
		$zebra->auto_handle_exif_orientation = false;
		$zebra->chmod_value = 0644;

		// indicate a source image (a GIF, PNG or JPEG file)
		$zebra->source_path = $source;

		// indicate a target image
		// note that there's no extra property to set in order to specify the target
		// image's type -simply by writing '.jpg' as extension will instruct the script
		// to create a 'jpg' file
		$zebra->target_path = $target;

		// since in this example we're going to have a jpeg file, let's set the output
		// image's quality
		$zebra->jpeg_quality = 100;

		// some additional properties that can be set
		// read about them in the documentation
		$zebra->preserve_aspect_ratio = true;
		$zebra->enlarge_smaller_images = true;
		$zebra->preserve_time = true;
		$zebra->handle_exif_orientation_tag = true;

		// resize the image to exactly 100x100 pixels by using the "crop from center" method
		// (read more in the overview section or in the documentation)
		//  and if there is an error, check what the error is about
		if (!$zebra->resize( $width, $height, ZEBRA_IMAGE_CROP_CENTER)) {
			// if there was an error, let's see what the error is about
			switch ($zebra->error) {
				case 1:
					echo 'Source file could not be found!';
					break;
				case 2:
					echo 'Source file is not readable!';
					break;
				case 3:
					echo 'Could not write target file!';
					break;
				case 4:
					echo 'Unsupported source file format!';
					break;
				case 5:
					echo 'Unsupported target file format!';
					break;
				case 6:
					echo 'GD library version does not support target file format!';
					break;
				case 7:
					echo 'GD library is not installed!';
					break;
				case 8:
					echo '"chmod" command is disabled via configuration!';
					break;
				case 9:
					echo '"exif_read_data" function is not available';
					break;
			}
			// if no errors
		} else {
			return true;
		}
	}

}