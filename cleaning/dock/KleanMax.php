<?php


require_once 'Helper.php';


class KleanMx extends Helper {

	public $base_url = 'http://kleanmax.com/cleaning/';
	public $con;

	public $contact_no = '+91 97101 48218';
	public $address = 'No. 6, Jayam Industrial Estate, Chettyar Agaram 1st Street, Opp to Ishwarya Appartment, Vanagaram, Chennai - 600095';
    public $email = 'info@kleanmax.com';
    
	public $enquiry_email = 'info@kleanmax.com';
	public $enquiry_mobile = '9710148218';
	public $mail_function;

	public function __construct() {
		parent::__construct();
	}

	public function activeFunciton($file){
		$path = basename($_SERVER['PHP_SELF']);
		if($file == $path){
			return ' dropdown active';
		}else{
			return false;
		}
	}

	function dateFormat($date,$format = 'd-m-Y') {
		if (DateTime::createFromFormat('Y-m-d G:i:s', $date) !== FALSE) {
			$converted = date($format,$date);
		}else{
			$converted = date($format,strtotime($date));
		}
		return $converted;
	}

	function sendSMS($target_mobile, $message){
		$ch = curl_init('');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_exec($ch);
		curl_close($ch);
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

	function makeMoney($number) {
		return number_format($number,2);
	}

	function makeDecimal($number) {
		return number_format($number,2,'.','');
	}

	function encrypt($pass){
		return crypt($pass, PASSWORD_SALT);
	}

	function encryptID($id){
		return sha1($id);
	}

	function clearLog(){
		unset($_SESSION['msg'],
			$_SESSION['err'],
			$_SESSION['cart_msg'],
			$_SESSION['cart_err'],
			$_SESSION['login_err'],
			$_SESSION['login_msg'],
			$_SESSION['user_msg'],
			$_SESSION['user_err']
		);
	}

	function userLogout($redirect = NULL){
		if($this->isUserLoggedIn()){
			unset($_SESSION['__uid'],
				$_SESSION['checkout_stat'],
				$_SESSION['__order_id'],
				$_SESSION['_order_step'],
				$_SESSION['fb_access_token'],
				$_SESSION['order_check']
			);

			if(!is_null($redirect))
				header('location: '.$redirect.'.php');
			else
				$this->redirect($_SERVER['HTTP_REFERER'],false);
		}
		return false;
	}

	function isUserLoggedIn(){
		if(isset($_SESSION['__uid'])){
			return true;
		}
		return false;
	}

	function currency($code = NULL) {
		$currency_symbols = array(
			'AED' => '&#1583;.&#1573;', // ?
			'AFN' => '&#65;&#102;',
			'ALL' => '&#76;&#101;&#107;',
			'AMD' => '',
			'ANG' => '&#402;',
			'AOA' => '&#75;&#122;', // ?
			'ARS' => '&#36;',
			'AUD' => '&#36;',
			'AWG' => '&#402;',
			'AZN' => '&#1084;&#1072;&#1085;',
			'BAM' => '&#75;&#77;',
			'BBD' => '&#36;',
			'BDT' => '&#2547;', // ?
			'BGN' => '&#1083;&#1074;',
			'BHD' => '.&#1583;.&#1576;', // ?
			'BIF' => '&#70;&#66;&#117;', // ?
			'BMD' => '&#36;',
			'BND' => '&#36;',
			'BOB' => '&#36;&#98;',
			'BRL' => '&#82;&#36;',
			'BSD' => '&#36;',
			'BTN' => '&#78;&#117;&#46;', // ?
			'BWP' => '&#80;',
			'BYR' => '&#112;&#46;',
			'BZD' => '&#66;&#90;&#36;',
			'CAD' => '&#36;',
			'CDF' => '&#70;&#67;',
			'CHF' => '&#67;&#72;&#70;',
			'CLF' => '', // ?
			'CLP' => '&#36;',
			'CNY' => '&#165;',
			'COP' => '&#36;',
			'CRC' => '&#8353;',
			'CUP' => '&#8396;',
			'CVE' => '&#36;', // ?
			'CZK' => '&#75;&#269;',
			'DJF' => '&#70;&#100;&#106;', // ?
			'DKK' => '&#107;&#114;',
			'DOP' => '&#82;&#68;&#36;',
			'DZD' => '&#1583;&#1580;', // ?
			'EGP' => '&#163;',
			'ETB' => '&#66;&#114;',
			'EUR' => '&#8364;',
			'FJD' => '&#36;',
			'FKP' => '&#163;',
			'GBP' => '&#163;',
			'GEL' => '&#4314;', // ?
			'GHS' => '&#162;',
			'GIP' => '&#163;',
			'GMD' => '&#68;', // ?
			'GNF' => '&#70;&#71;', // ?
			'GTQ' => '&#81;',
			'GYD' => '&#36;',
			'HKD' => '&#36;',
			'HNL' => '&#76;',
			'HRK' => '&#107;&#110;',
			'HTG' => '&#71;', // ?
			'HUF' => '&#70;&#116;',
			'IDR' => '&#82;&#112;',
			'ILS' => '&#8362;',
			'INR' => '&#8377;',
			'IQD' => '&#1593;.&#1583;', // ?
			'IRR' => '&#65020;',
			'ISK' => '&#107;&#114;',
			'JEP' => '&#163;',
			'JMD' => '&#74;&#36;',
			'JOD' => '&#74;&#68;', // ?
			'JPY' => '&#165;',
			'KES' => '&#75;&#83;&#104;', // ?
			'KGS' => '&#1083;&#1074;',
			'KHR' => '&#6107;',
			'KMF' => '&#67;&#70;', // ?
			'KPW' => '&#8361;',
			'KRW' => '&#8361;',
			'KWD' => '&#1583;.&#1603;', // ?
			'KYD' => '&#36;',
			'KZT' => '&#1083;&#1074;',
			'LAK' => '&#8365;',
			'LBP' => '&#163;',
			'LKR' => '&#8360;',
			'LRD' => '&#36;',
			'LSL' => '&#76;', // ?
			'LTL' => '&#76;&#116;',
			'LVL' => '&#76;&#115;',
			'LYD' => '&#1604;.&#1583;', // ?
			'MAD' => '&#1583;.&#1605;.', //?
			'MDL' => '&#76;',
			'MGA' => '&#65;&#114;', // ?
			'MKD' => '&#1076;&#1077;&#1085;',
			'MMK' => '&#75;',
			'MNT' => '&#8366;',
			'MOP' => '&#77;&#79;&#80;&#36;', // ?
			'MRO' => '&#85;&#77;', // ?
			'MUR' => '&#8360;', // ?
			'MVR' => '.&#1923;', // ?
			'MWK' => '&#77;&#75;',
			'MXN' => '&#36;',
			'MYR' => '&#82;&#77;',
			'MZN' => '&#77;&#84;',
			'NAD' => '&#36;',
			'NGN' => '&#8358;',
			'NIO' => '&#67;&#36;',
			'NOK' => '&#107;&#114;',
			'NPR' => '&#8360;',
			'NZD' => '&#36;',
			'OMR' => '&#65020;',
			'PAB' => '&#66;&#47;&#46;',
			'PEN' => '&#83;&#47;&#46;',
			'PGK' => '&#75;', // ?
			'PHP' => '&#8369;',
			'PKR' => '&#8360;',
			'PLN' => '&#122;&#322;',
			'PYG' => '&#71;&#115;',
			'QAR' => '&#65020;',
			'RON' => '&#108;&#101;&#105;',
			'RSD' => '&#1044;&#1080;&#1085;&#46;',
			'RUB' => '&#1088;&#1091;&#1073;',
			'RWF' => '&#1585;.&#1587;',
			'SAR' => '&#65020;',
			'SBD' => '&#36;',
			'SCR' => '&#8360;',
			'SDG' => '&#163;', // ?
			'SEK' => '&#107;&#114;',
			'SGD' => '&#36;',
			'SHP' => '&#163;',
			'SLL' => '&#76;&#101;', // ?
			'SOS' => '&#83;',
			'SRD' => '&#36;',
			'STD' => '&#68;&#98;', // ?
			'SVC' => '&#36;',
			'SYP' => '&#163;',
			'SZL' => '&#76;', // ?
			'THB' => '&#3647;',
			'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
			'TMT' => '&#109;',
			'TND' => '&#1583;.&#1578;',
			'TOP' => '&#84;&#36;',
			'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
			'TTD' => '&#36;',
			'TWD' => '&#78;&#84;&#36;',
			'TZS' => '',
			'UAH' => '&#8372;',
			'UGX' => '&#85;&#83;&#104;',
			'USD' => '&#36;',
			'UYU' => '&#36;&#85;',
			'UZS' => '&#1083;&#1074;',
			'VEF' => '&#66;&#115;',
			'VND' => '&#8363;',
			'VUV' => '&#86;&#84;',
			'WST' => '&#87;&#83;&#36;',
			'XAF' => '&#70;&#67;&#70;&#65;',
			'XCD' => '&#36;',
			'XDR' => '',
			'XOF' => '',
			'XPF' => '&#70;',
			'YER' => '&#65020;',
			'ZAR' => '&#82;',
			'ZMK' => '&#90;&#75;', // ?
			'ZWL' => '&#90;&#36;',
		);
		return (!is_null($code)?$currency_symbols[$code]:$currency_symbols);
    }
    
    
    public function getContents($key){
		$key = $key.'%';		
        $result = $this->db->select('ge_content_management','*',[                  
            "content_placeholder[~]" => [$key, 'GREEN_%']
		]);					

	    return $result;
    }
    
    function getAllProjects(){
        $result = $this->db->select('ge_projects','*',[
                'ORDER' => [
                    'project_id' => 'DESC'
                ]
            ]);					
    
        return $result;
    }

	function getRecentProjects($limit = 4){
		$result = $this->db->select('ge_projects','*',[
			'ORDER' => [
				'project_id' => 'DESC'
			],
			'LIMIT' => $limit
		]);

		return $result;
	}

	function getAllCategories(){
		$result = $this->db->select('ge_gallery_categories','*',[
			'ORDER' => [
				'category_id' => 'DESC'
			]
		]);

		return $result;
	}

	function getAllPostCategories() {
		$result = $this->db->select('ge_blog_categories',
		[
			"[>]ge_blog" => ["category_id" => "blog_category_id"]
		],
		[
			'total_posts' => \Medoo\Medoo::raw('COUNT(<blog_id>)'),
			'category_id',
			'category_slug',
			'category_title'
		],
		[
			'ORDER' => [
				'category_id' => 'DESC'
			],
			'GROUP' => [
				'category_id'
			]
		]);

		return $result;
	}

    function getAllGallery($limit = NULL) {
        $result = $this->db->select('ge_gallery',[
            "[>]ge_gallery_categories" => ["gallery_category" => "category_id"]
            ],
            '*',
            [		
            'LIMIT' => $limit,
            'ORDER' => [
                'gallery_id' => 'DESC'
            ]
        ]);					
    
        return $result;
    }

    function totalBlogPosts($category_id = NULL) {
	    $condition = NULL;
		if(!is_null($category_id)){
			$condition['category_slug'] = $category_id;
		}

	    $result = $this->db->count('ge_blog',[
		    "[>]ge_blog_categories" => ["blog_category_id" => "category_id"]
	    ],
	    '*',
	    $condition);

	    return $result;
    }

	function getAllBlogPosts($category_id = NULL, $limit = NULL, $offset = 1) {
		$start_from = ($offset - 1) * $limit;

		$condition = array(
			'LIMIT' => [$start_from, $limit],
			'ORDER' => [
				'blog_id' => 'DESC'
			]
		);

		if(!is_null($category_id)) {
			$condition['category_slug'] = $category_id;
		}

		$result = $this->db->select('ge_blog',[
			"[>]ge_blog_categories" => ["blog_category_id" => "category_id"]
		],
			'*',
			$condition);

		return $result;
	}

	function getLatestBlogPosts($limit = 3) {

		$result = $this->db->select('ge_blog',[
			"[>]ge_blog_categories" => ["blog_category_id" => "category_id"]
		],
			'*',
			[
				'LIMIT' => $limit,
				'ORDER' => [
					'blog_id' => 'DESC'
				]
			]);

		return $result;
	}

	function getPostBySlug($slug) {
		$result = $this->db->get('ge_blog',[
			"[>]ge_blog_categories" => ["blog_category_id" => "category_id"]
		],
		"*",
		[
			'blog_slug' => $slug
		]);

		return $result;
	}

	function getSetting($id = 1) {
		$result = $this->db->get('ge_settings', "*", [
				'id' => $id
			]);

		return $result;
	}

    function getAllSliders(){
        $result = $this->db->select('ge_sliders','*',[
                'ORDER' => [
                    'slider_id' => 'ASC'
                ]
            ]);					
    
        return $result;
    }

	function getAllServiceCategories($limit = NULL, $order = 'DESC')
	{
		return $this->db->select('ge_service_categories', [
			"[>]ge_services" => ["service_id" => "service_id"]
		],
			'*',
		[
			'ORDER' => [
				'category_id' => $order
			],
			'LIMIT' => $limit
		]);
	}

	function getServicesByCategory($category_id)
	{
		return $this->db->select('ge_services', '*', [
			'main_category' => $category_id
		]);
	}

	function getServiceVideos($sid) {
		return $this->db->select('ge_service_videos','*', [
			'service_id' => $sid
		]);
	}

    function getAllServices($limit = NULL, $order = 'DESC')
    {        
        return $this->db->select('ge_services', '*', [
            'ORDER' => [
                'service_id' => $order
            ],
            'LIMIT' => $limit,
            'service_status' => '1'
        ]);
    }

    function getServiceRowsBySid($sid) {
        return $this->db->select('ge_service_rows', '*', [
            'ORDER' => [
                'row_service_id' => 'ASC'
            ],            
            'row_service_id' => $sid
        ]);
    }

    function getServiceByID($id)
    {
        return $this->db->get('ge_services', '*', [        
            'service_id' => $id
        ]);
    }

	function getProjectGalleryByPid($pid) {
		return $this->db->select('ge_project_gallery', '*', [
			'ORDER' => [
				'gallery_id' => 'ASC'
			],
			'project_id' => $pid
		]);
	}

	function getProjectByID($id)
	{
		return $this->db->get('ge_projects', '*', [
			'project_id' => $id
		]);
	}

	function getProjectBySlug($slug)
	{
		return $this->db->get('ge_projects', '*', [
			'project_slug' => $slug
		]);
	}

    function getServiceBySlug($slug)
    {
        return $this->db->get('ge_services', '*', [        
            'service_slug' => $slug
        ]);
    }
    
	public function quickEnquiry($data){
		$mail = new PHPMailer();

		$mail->From = $this->email;
		$mail->FromName = 'Klean Max';

		$mail->addAddress($this->enquiry_email);
		$mail->addCc('kishore@binaryresonance.com');
		$mail->addCc('bobby@kleanmax.com');

		$mail->isHTML(true);
		$mail->Subject = 'Quick Enquiry - Klean Max';

		$html = '<!DOCTYPE html>
                <html>
                <head>
                <title>Klean Max - Enquiry Details</title>               
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <style type="text/css">
                    /* CLIENT-SPECIFIC STYLES */
                    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
                    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
                    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
                
                    /* RESET STYLES */
                    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
                    table{border-collapse: collapse !important;}
                    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
                
                    /* iOS BLUE LINKS */
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                        text-decoration: none !important;
                        font-size: inherit !important;
                        font-family: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                    }
                
                    /* MOBILE STYLES */
                    @media screen and (max-width: 525px) {
                
                        /* ALLOWS FOR FLUID TABLES */
                        .wrapper {
                          width: 100% !important;
                            max-width: 100% !important;
                        }
                
                        /* ADJUSTS LAYOUT OF LOGO IMAGE */
                        .logo img {
                          margin: 0 auto !important;
                        }
                
                        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
                        .mobile-hide {
                          display: none !important;
                        }
                
                        .img-max {
                          max-width: 100% !important;
                          width: 100% !important;
                          height: auto !important;
                        }
                
                        /* FULL-WIDTH TABLES */
                        .responsive-table {
                          width: 100% !important;
                        }
                
                        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
                        .padding {
                          padding: 10px 5% 15px 5% !important;
                        }
                
                        .padding-meta {
                          padding: 30px 5% 0px 5% !important;
                          text-align: center;
                        }
                
                        .padding-copy {
                             padding: 10px 5% 10px 5% !important;
                          text-align: center;
                        }
                
                        .no-padding {
                          padding: 0 !important;
                        }
                
                        .section-padding {
                          padding: 50px 15px 50px 15px !important;
                        }
                
                        /* ADJUST BUTTONS ON MOBILE */
                        .mobile-button-container {
                            margin: 0 auto;
                            width: 100% !important;
                        }
                
                        .mobile-button {
                            padding: 15px !important;
                            border: 0 !important;
                            font-size: 16px !important;
                            display: block !important;
                        }
                
                    }
                
                    /* ANDROID CENTER FIX */
                    div[style*="margin: 16px 0;"] { margin: 0 !important; }
                </style>
                </head>
                <body style="margin: 0 !important; padding: 0 !important;">
                
                <!-- HIDDEN PREHEADER TEXT -->
                <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
                    Klean Max
                </div>
                
                <!-- HEADER -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <!--[if (gte mso 9)|(IE)]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                            <tr>
                            <td align="center" valign="top" width="500">
                            <![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                                <tr>
                                    <td align="center" valign="top" style="background: #55b5a9;color: white;padding: 5px 0px;" class="logo">
                                        Enquiry Details
                                    </td>
                                </tr>
                            </table>
                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="padding">
                            <!--[if (gte mso 9)|(IE)]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                            <tr>
                            <td align="center" valign="top" width="500">
                            <![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                                <tr>
                                    <td style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;">
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Name</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['name'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Mobile No.</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['phone'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Email</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['email'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Date</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['date'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Message</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['message'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                </table>
                
                </body>
                </html>';

		$mail->Body = $html;

		if($mail->send()) {

            $secondary = new PHPMailer();

            $secondary->From = $this->email;
            $secondary->FromName = 'Klean Max';
            $secondary->addAddress($data['email']);
            $secondary->isHTML(true);
            $secondary->Subject = 'Thank you for Enquiring with Klean Max.';

            $secondary_html = '<html>
			<head>
			<style type="text/css">
		  body {
		   padding-top: 0 !important;
		   padding-bottom: 0 !important;
		   padding-top: 0 !important;
		   padding-bottom: 0 !important;
		   margin:0 !important;
		   width: 100% !important;
		   -webkit-text-size-adjust: 100% !important;
		   -ms-text-size-adjust: 100% !important;
		   -webkit-font-smoothing: antialiased !important;
		 }
		 .tableContent img {
		   border: 0 !important;
		   display: block !important;
		   outline: none !important;
		 }
		 a{
		  color:#382F2E;
		}

		p, h1,h2,ul,ol,li,div{
		  margin:0;
		  padding:0;
		}

		h1,h2{
		  font-weight: normal;
		  background:transparent !important;
		  border:none !important;
		}

		@media only screen and (max-width:480px)

		{

		table[class="MainContainer"], td[class="cell"]
			{
				width: 100% !important;
				height:auto !important;
			}
		td[class="specbundle"]
			{
				width: 100% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:15px !important;
			}
		td[class="specbundle2"]
			{
				width:80% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:10px !important;
				padding-left:10% !important;
				padding-right:10% !important;
			}

		td[class="spechide"]
			{
				display:none !important;
			}
			    img[class="banner"]
			{
			          width: 100% !important;
			          height: auto !important;
			}
				td[class="left_pad"]
			{
					padding-left:15px !important;
					padding-right:15px !important;
			}

		}

		@media only screen and (max-width:540px)

		{

		table[class="MainContainer"], td[class="cell"]
			{
				width: 100% !important;
				height:auto !important;
			}
		td[class="specbundle"]
			{
				width: 100% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:15px !important;
			}
		td[class="specbundle2"]
			{
				width:80% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:10px !important;
				padding-left:10% !important;
				padding-right:10% !important;
			}

		td[class="spechide"]
			{
				display:none !important;
			}
			    img[class="banner"]
			{
			          width: 100% !important;
			          height: auto !important;
			}
				td[class="left_pad"]
			{
					padding-left:15px !important;
					padding-right:15px !important;
			}

		}

		.contentEditable h2.big,.contentEditable h1.big{
		  font-size: 26px !important;
		}

		 .contentEditable h2.bigger,.contentEditable h1.bigger{
		  font-size: 37px !important;
		}

		td,table{
		  vertical-align: top;
		}
		td.middle{
		  vertical-align: middle;
		}

		a.link1{
		  font-size:13px;
		  color:#27A1E5;
		  line-height: 24px;
		  text-decoration:none;
		}
		a{
		  text-decoration: none;
		}

		.link2{
		color:#ffffff;
		border-top:10px solid #27A1E5;
		border-bottom:10px solid #27A1E5;
		border-left:18px solid #27A1E5;
		border-right:18px solid #27A1E5;
		border-radius:3px;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		background:#27A1E5;
		}

		.link3{
		color:#555555;
		border:1px solid #cccccc;
		padding:10px 18px;
		border-radius:3px;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		background:#ffffff;
		}

		.link4{
		color:#27A1E5;
		line-height: 24px;
		}

		h2,h1{
		line-height: 20px;
		}
		p{
		  font-size: 14px;
		  line-height: 21px;
		  color:#AAAAAA;
		}

		.contentEditable li{

		}

		.appart p{

		}
		.bgItem{
		background: #ffffff;
		}
		.bgBody{
		background: #ffffff;
		}

		img {
		  outline:none;
		  text-decoration:none;
		  -ms-interpolation-mode: bicubic;
		  width: auto;
		  max-width: 100%;
		  clear: both;
		  display: block;
		  float: none;
		}

		</style></head><body>';
            $secondary_html .= '<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td height="40"></td>
					</tr>
					<tr>
						<td style="background:#F6F6F6; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td width="40" valign="top">&nbsp;</td>
						<td valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
								<tr><td height="25"></td></tr>
								<tr>
									<td>
										<div class="contentEditableContainer contentTextEditable">
	                                        <div class="contentEditable" style="text-align: center;">
	                                            <img src="'.$this->base_url.'images/klean-logo.png" alt="Klean Max Logo">
	                                            <h2 style="font-size: 20px;"> Klean Max</h2>																														
	                                        </div>
	                                        <div class="contentEditable">
	                                            <br>
	                                             <p style="color: #000;font-weight: 600;">Dear '.strtoupper($data['name']).'</p>
	                                                <br>
	                                                <br>
	                                                <p style="color: #000;font-weight: 400;">Greetings from Klean Max.</p> 
	                                                <p style="color: #000;font-weight: 400;">Thank you for reaching out to us. We will get back to you at the earliest. In case of urgency, pls call +91 '.$this->enquiry_mobile.'</p>
	                                                <p style="color: #000;font-weight: 400;">Best Wishes</p>
	                                                <br><br>
	                                                <p style="color: #000;font-weight: 400;">Team Klean Max</p>
	                                        </div>
										</div>
									</td>
								</tr>
								<tr></tr>
								<tr><td height="24"></td></tr>
							</table>
						</td>
						<td width="40" valign="top">&nbsp;</td>
					</tr>
				</tbody>
				</table>
				</td>
					</tr>
				</tbody>
			</table>
			</div></body></html>';

            $secondary->Body = $secondary_html;
            $secondary->send();

			return true;
		}
		return false;
	}

	public function contactEnquiry($data){
		$mail = new PHPMailer();

		$mail->From = $this->email;
		$mail->FromName = 'Klean Max';

		$mail->addAddress($this->enquiry_email);
		$mail->addCc('kishore@binaryresonance.com');
		$mail->addCc('bobby@kleanmax.com');

		$mail->isHTML(true);
		$mail->Subject = 'Contact Enquiry - Klean Max';

		$html = '<!DOCTYPE html>
                <html>
                <head>
                <title>Klean Max - Enquiry Details</title>               
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <style type="text/css">
                    /* CLIENT-SPECIFIC STYLES */
                    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
                    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
                    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
                
                    /* RESET STYLES */
                    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
                    table{border-collapse: collapse !important;}
                    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
                
                    /* iOS BLUE LINKS */
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                        text-decoration: none !important;
                        font-size: inherit !important;
                        font-family: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                    }
                
                    /* MOBILE STYLES */
                    @media screen and (max-width: 525px) {
                
                        /* ALLOWS FOR FLUID TABLES */
                        .wrapper {
                          width: 100% !important;
                            max-width: 100% !important;
                        }
                
                        /* ADJUSTS LAYOUT OF LOGO IMAGE */
                        .logo img {
                          margin: 0 auto !important;
                        }
                
                        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
                        .mobile-hide {
                          display: none !important;
                        }
                
                        .img-max {
                          max-width: 100% !important;
                          width: 100% !important;
                          height: auto !important;
                        }
                
                        /* FULL-WIDTH TABLES */
                        .responsive-table {
                          width: 100% !important;
                        }
                
                        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
                        .padding {
                          padding: 10px 5% 15px 5% !important;
                        }
                
                        .padding-meta {
                          padding: 30px 5% 0px 5% !important;
                          text-align: center;
                        }
                
                        .padding-copy {
                             padding: 10px 5% 10px 5% !important;
                          text-align: center;
                        }
                
                        .no-padding {
                          padding: 0 !important;
                        }
                
                        .section-padding {
                          padding: 50px 15px 50px 15px !important;
                        }
                
                        /* ADJUST BUTTONS ON MOBILE */
                        .mobile-button-container {
                            margin: 0 auto;
                            width: 100% !important;
                        }
                
                        .mobile-button {
                            padding: 15px !important;
                            border: 0 !important;
                            font-size: 16px !important;
                            display: block !important;
                        }
                
                    }
                
                    /* ANDROID CENTER FIX */
                    div[style*="margin: 16px 0;"] { margin: 0 !important; }
                </style>
                </head>
                <body style="margin: 0 !important; padding: 0 !important;">
                
                <!-- HIDDEN PREHEADER TEXT -->
                <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">Klean Max</div>
                
                <!-- HEADER -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <!--[if (gte mso 9)|(IE)]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                            <tr>
                            <td align="center" valign="top" width="500">
                            <![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                                <tr>
                                    <td align="center" valign="top" style="background: #55b5a9;color: white;padding: 5px 0px;" class="logo">
                                        Enquiry Details
                                    </td>
                                </tr>
                            </table>
                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="padding">
                            <!--[if (gte mso 9)|(IE)]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                            <tr>
                            <td align="center" valign="top" width="500">
                            <![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                                <tr>
                                    <td style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;">
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Name</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['name'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>     
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Email</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['email'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                           
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Mobile No.</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['phone'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- TWO COLUMNS -->
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                                    <!-- LEFT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="left">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">Message</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- RIGHT COLUMN -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" style="width: 47%;" align="right">
                                                        <tr>
                                                            <td style="padding: 0 0 10px 0;">
                                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                    <tr>
                                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$data['message'].'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                             
                            </table>
                            <!--[if (gte mso 9)|(IE)]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                </table>
                
                </body>
                </html>';

		$mail->Body = $html;

		if($mail->send()) {

			$secondary = new PHPMailer();

			$secondary->From = $this->email;
			$secondary->FromName = 'Klean Max';
			$secondary->addAddress($data['email']);
			$secondary->isHTML(true);
			$secondary->Subject = 'Thank you for Enquiring with Klean Max.';

			$secondary_html = '<html>
			<head>
			<style type="text/css">
		  body {
		   padding-top: 0 !important;
		   padding-bottom: 0 !important;
		   padding-top: 0 !important;
		   padding-bottom: 0 !important;
		   margin:0 !important;
		   width: 100% !important;
		   -webkit-text-size-adjust: 100% !important;
		   -ms-text-size-adjust: 100% !important;
		   -webkit-font-smoothing: antialiased !important;
		 }
		 .tableContent img {
		   border: 0 !important;
		   display: block !important;
		   outline: none !important;
		 }
		 a{
		  color:#382F2E;
		}

		p, h1,h2,ul,ol,li,div{
		  margin:0;
		  padding:0;
		}

		h1,h2{
		  font-weight: normal;
		  background:transparent !important;
		  border:none !important;
		}

		@media only screen and (max-width:480px)

		{

		table[class="MainContainer"], td[class="cell"]
			{
				width: 100% !important;
				height:auto !important;
			}
		td[class="specbundle"]
			{
				width: 100% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:15px !important;
			}
		td[class="specbundle2"]
			{
				width:80% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:10px !important;
				padding-left:10% !important;
				padding-right:10% !important;
			}

		td[class="spechide"]
			{
				display:none !important;
			}
			    img[class="banner"]
			{
			          width: 100% !important;
			          height: auto !important;
			}
				td[class="left_pad"]
			{
					padding-left:15px !important;
					padding-right:15px !important;
			}

		}

		@media only screen and (max-width:540px)

		{

		table[class="MainContainer"], td[class="cell"]
			{
				width: 100% !important;
				height:auto !important;
			}
		td[class="specbundle"]
			{
				width: 100% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:15px !important;
			}
		td[class="specbundle2"]
			{
				width:80% !important;
				float:left !important;
				font-size:13px !important;
				line-height:17px !important;
				display:block !important;
				padding-bottom:10px !important;
				padding-left:10% !important;
				padding-right:10% !important;
			}

		td[class="spechide"]
			{
				display:none !important;
			}
			    img[class="banner"]
			{
			          width: 100% !important;
			          height: auto !important;
			}
				td[class="left_pad"]
			{
					padding-left:15px !important;
					padding-right:15px !important;
			}

		}

		.contentEditable h2.big,.contentEditable h1.big{
		  font-size: 26px !important;
		}

		 .contentEditable h2.bigger,.contentEditable h1.bigger{
		  font-size: 37px !important;
		}

		td,table{
		  vertical-align: top;
		}
		td.middle{
		  vertical-align: middle;
		}

		a.link1{
		  font-size:13px;
		  color:#27A1E5;
		  line-height: 24px;
		  text-decoration:none;
		}
		a{
		  text-decoration: none;
		}

		.link2{
		color:#ffffff;
		border-top:10px solid #27A1E5;
		border-bottom:10px solid #27A1E5;
		border-left:18px solid #27A1E5;
		border-right:18px solid #27A1E5;
		border-radius:3px;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		background:#27A1E5;
		}

		.link3{
		color:#555555;
		border:1px solid #cccccc;
		padding:10px 18px;
		border-radius:3px;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		background:#ffffff;
		}

		.link4{
		color:#27A1E5;
		line-height: 24px;
		}

		h2,h1{
		line-height: 20px;
		}
		p{
		  font-size: 14px;
		  line-height: 21px;
		  color:#AAAAAA;
		}

		.contentEditable li{

		}

		.appart p{

		}
		.bgItem{
		background: #ffffff;
		}
		.bgBody{
		background: #ffffff;
		}

		img {
		  outline:none;
		  text-decoration:none;
		  -ms-interpolation-mode: bicubic;
		  width: auto;
		  max-width: 100%;
		  clear: both;
		  display: block;
		  float: none;
		}

		</style></head><body>';
			$secondary_html .= '<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td height="40"></td>
					</tr>
					<tr>
						<td style="background:#F6F6F6; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td width="40" valign="top">&nbsp;</td>
						<td valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
								<tr><td height="25"></td></tr>
								<tr>
									<td>
										<div class="contentEditableContainer contentTextEditable">
	                                        <div class="contentEditable" style="text-align: center;">
	                                            <img src="'.$this->base_url.'images/klean-logo.png" alt="Klean Max Logo">
	                                            <h2 style="font-size: 20px;"> Klean Max</h2>																														
	                                        </div>
	                                        <div class="contentEditable">
	                                            <br>
	                                             <p style="color: #000;font-weight: 600;">Dear '.strtoupper($data['name']).'</p>
	                                                <br>
	                                                <br>
	                                                <p style="color: #000;font-weight: 400;">Greetings from Klean Max.</p> 
	                                                <p style="color: #000;font-weight: 400;">Thank you for reaching out to us. We will get back to you at the earliest. In case of urgency, pls call +91 '.$this->enquiry_mobile.'</p>
	                                                <p style="color: #000;font-weight: 400;">Best Wishes</p>
	                                                <br><br>
	                                                <p style="color: #000;font-weight: 400;">Team Klean Max</p>
	                                        </div>
										</div>
									</td>
								</tr>
								<tr></tr>
								<tr><td height="24"></td></tr>
							</table>
						</td>
						<td width="40" valign="top">&nbsp;</td>
					</tr>
				</tbody>
				</table>
				</td>
					</tr>
				</tbody>
			</table>
			</div></body></html>';

			$secondary->Body = $secondary_html;
			$secondary->send();


			return true;
		}
		return false;
	}


}