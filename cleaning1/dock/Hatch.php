<?php
/**
 * Created by PhpStorm.
 * User: Binary Tech Resonance Pvt. Ltd.
 * Date: 27-02-2018
 * Time: 10:37 AM
 */

spl_autoload_register(function ($class_name) {
	include $class_name.'.php';
});

class Hatch {

	// use Database;

	public $admin_folder = 'hatch';

    private $title = 'Klean Max';
    private $page_title = 'Klean Max';

    public $main;
	public $helper = '';
	public $db;

    function __construct() {
    	if(session_status() == PHP_SESSION_NONE){
    		session_start();
	    }
	
	    // $this->db();
    	// $this->setToUnicode();
		

    	$this->main = new D();
		$this->helper = new Helper();
		$this->db = $this->helper->db;
    }

    function getResult($stmt){
        $stmt->store_result();
        $meta = $stmt->result_metadata();
        while ($field = $meta->fetch_field())
        {
            $params[] = &$row[$field->name];
        }

        $result['num_rows'] = $stmt->num_rows;

        call_user_func_array(array($stmt, 'bind_result'), $params);

        while ($stmt->fetch()) {
            foreach($row as $key => $val)
            {
                $c[$key] = $val;
            }
            $result['result'][] = $c;
        }
        return $result;
    }

	function adminLogin($data){
		$pass = $this->encrypt($data['password']);		
		$data['password'] = $pass;		
		
		$query = $this->db->get('ge_admin', '*', $data);		
		if($query) {
			return $query;
		}
        return false;
    }

	function encrypt($pass){
		return crypt($pass,PASSWORD_SALT);
	}

	function adminLogout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        header('location: login.php');
    }

    function check_login() {
        if(isset($_SESSION) && isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
            return true;
        }
        return false;
    }

    function getTitle()
    {
        $page = basename($_SERVER['PHP_SELF']);

        switch ($page){
            case 'index.php':
                $this->title = 'Klean Max';
                break;            
			case 'manage_services.php':
		        $this->title = 'Klean Max';
		        $this->page_title = 'Klean Max';
				break;
			case 'manage_sliders.php':
		        $this->title = 'Klean Max';
		        $this->page_title = 'Klean Max';
				break;
			case 'manage_gallery.php':
		        $this->title = 'Klean Max';
		        $this->page_title = 'Klean Max';
		        break;            
	        case 'manage_contents.php':
		        $this->title = 'Klean Max';
		        $this->page_title = 'Klean Max';
		        break;
        }

        return array('url' => $page,'title' => $this->title,'page_title' => $this->page_title);
    }

    function logMessage() {
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
			return '<div class="alert alert-success"><button data-dismiss="alert" class="close"></button><strong>'.$msg.'</strong></div>';
		}
	    if(isset($_SESSION['err'])){
		    $err = $_SESSION['err'];
		    unset($_SESSION['err']);
		    return '<div class="alert alert-danger"><button data-dismiss="alert" class="close"></button><strong>'.$err.'</strong></div>';
	    }
        return false;
	}
	
// 	LIST/GET SECTION
	
function listSliders(){
	$result = $this->db->select('ge_sliders','*',[
			'ORDER' => [
				'slider_id' => 'DESC'
			]
		]);					

	return $result;
}

function listSectors(){
	$result = $this->db->select('ge_sectors','*',[
			'ORDER' => [
				'sector_id' => 'DESC'
			]
		]);					

	return $result;
}

function listGalleryCategories(){
	$result = $this->db->select('ge_gallery_categories','*',[
			'ORDER' => [
				'category_id' => 'DESC'
			]
		]);					

	return $result;
}

function listServiceCategories(){
	$result = $this->db->select('ge_service_categories', [
		"[>]ge_services" => ["service_id" => "service_id"]
	],'*',[
		'ORDER' => [
			'category_id' => 'DESC'
		]
	]);

	return $result;
}

function listPostCategories(){
	$result = $this->db->select('ge_blog_categories','*',[
		'ORDER' => [
			'category_id' => 'DESC'
		]
	]);

	return $result;
}

function listGallery() {
	$result = $this->db->select('ge_gallery',[
		"[>]ge_gallery_categories" => ["gallery_category" => "category_id"]
		],
		'*',
		[		
		'ORDER' => [
			'gallery_id' => 'DESC'
		]
	]);					

	return $result;
}

function listTestimonials(){
	$result = $this->db->select('ge_testimonials','*',[
			'ORDER' => [
				'testimonial_id' => 'DESC'
			]
		]);					

	return $result;
}

function listContents() {
	$result = $this->db->select('ge_content_management','*',[
		'ORDER' => [
			'id' => 'DESC'
		]
	]);					

return $result;
}

function listServices(){
	$result = $this->db->select('ge_services', [
		"[>]ge_service_categories" => ['main_category' => 'category_id']
	],
		['ge_services.service_id as service_id', 'service_title', 'service_slug', 'service_description', 'service_image', 'service_strip_image', 'service_status', 'category_title'],
		[
			'ORDER' => [
				'service_id' => 'DESC'
			]
		]);					

	return $result;
}

function listProjects(){
	$result = $this->db->select('ge_projects','*',[
		'ORDER' => [
			'project_id' => 'DESC'
		]
	]);

	return $result;
}

function listBlog(){
	$result = $this->db->select('ge_blog','*',[
		'ORDER' => [
			'blog_id' => 'DESC'
		]
	]);

	return $result;
}


function getServiceContents($sid) {
	return $this->db->select('ge_service_rows','*', [
		'row_service_id' => $sid
	]);	
}


function getServiceVideos($sid) {
	return $this->db->select('ge_service_videos','*', [
		'service_id' => $sid
	]);
}

function getServiceByID($sid) {
	return $this->db->get('ge_services','*', [
		'service_id' => $sid
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

function getPostByID($post_id) {
	return $this->db->get('ge_blog','*', [
		'blog_id' => $post_id
	]);
}

function getSectorByID($sid) {
	return $this->db->get('ge_sectors','*', [
		'sector_id' => $sid
	]);	
}

function getTestimonialByID($tid) {
	return $this->db->get('ge_testimonials','*', [
		'testimonial_id' => $tid
	]);	
}

function getCategoryByID($cid){
	return $this->db->get('ge_gallery_categories','*', [
		'category_id' => $cid,		
	]);	
}

function getServiceCategoryByID($cid){
	return $this->db->get('ge_service_categories','*', [
		'category_id' => $cid,
	]);
}

function getPostCategoryByID($cid){
	return $this->db->get('ge_blog_categories','*', [
		'category_id' => $cid,
	]);
}

function getGalleryByID($gid) {
	return $this->db->get('ge_gallery','*', [
		'gallery_id' => $gid,		
	]);	
}

function getContentByID($cid){
	return $this->db->get('ge_content_management','*', [
		'id' => $cid
	]);	
}

function getSliderByID($sid) {
	return $this->db->get('ge_sliders','*', [
		'slider_id' => $sid
	]);	
}	


//   DELETE/REMOVE SECTION
		
	function deleteServiceContents($sid) {
		return $this->db->delete('ge_service_rows', [
			'row_service_id' => $sid
		]);
	}

	function deleteService($sid) {
		$deleted = $this->db->delete('ge_services', [
			'service_id' => $sid
		]);

		if($deleted){
			$this->db->delete('ge_service_videos', ['service_id' => $sid]);
			$this->deleteServiceContents($sid);
			return array('msg' => 'Service was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Service.');
	}

	function deleteProjectGalleries($pid) {
		return $this->db->delete('ge_project_gallery', [
			'project_id' => $pid
		]);
	}

	function deleteProject($pid) {
		$deleted = $this->db->delete('ge_projects', [
			'project_id' => $pid
		]);

		if($deleted){
			$this->deleteProjectGalleries($pid);
			return array('msg' => 'Project was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Project.');
	}

	function deletePost($post_id) {
		$deleted = $this->db->delete('ge_blog', [
			'blog_id' => $post_id
		]);

		if($deleted){
			return array('msg' => 'Blog Post has been removed successfully.');
		}
		return array('err' => 'Error occur while deleting Blog Post.');
	}
	
	function deleteSlider($sid) {
		$deleted = $this->db->delete('ge_sliders', [
			'slider_id' => $sid
		]);

		if($deleted){			
			return array('msg' => 'Slider was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Slider.');
	}

	function deleteTestimonial($tid) {
		$deleted = $this->db->delete('ge_testimonials', [
			'testimonial_id' => $tid
		]);
		
		if($deleted){
			return array('msg' => 'Testimonial was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Testimonial.');
	}

	function deleteGallery($gid){
		$deleted = $this->db->delete('ge_gallery', [
			'gallery_id' => $gid
		]);
		
		if($deleted){
			return array('msg' => 'Gallery Image was removed successfully.');
		}
		return array('err' => 'Error occur while removing Gallery Image.');
	}

	function deleteCategory($cid){
		$deleted = $this->db->delete('ge_gallery_categories', [
			'category_id' => $cid
		]);
		
		if($deleted){
			return array('msg' => 'Category was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Category.');
	}

	function deleteServiceCategory($cid){
		$deleted = $this->db->delete('ge_service_categories', [
			'category_id' => $cid
		]);

		if($deleted){
			return array('msg' => 'Service Category was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Category.');
	}

	function deleteBlogCategory($cid) {
		$deleted = $this->db->delete('ge_blog_categories',
		[
			'category_id' => $cid
		]);

		if($deleted){
			return array('msg' => 'Post Category was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Post Category.');
	}

	function deleteSector($sid) {
		$deleted = $this->db->delete('ge_sectors', [
			'sector_id' => $sid
		]);
		
		if($deleted){
			return array('msg' => 'Sector was removed successfully.');
		}
		return array('err' => 'Error occur while deleting Sector.');
	}

// 	ADD/CREATE SECTION

	function addServiceContent($id, $data) {
		$contents = array();				
		foreach($data as $datum){
			$uploaded_image = NULL;
			if(strlen($datum['row_image']['image_name']))
			{
				list($txt, $ext) = explode(".", $datum['row_image']['image_name']);
				$ext = pathinfo($datum['row_image']['image_name'],PATHINFO_EXTENSION);
				if(in_array($ext,$datum['row_image']['format'])) {
					if($datum['row_image']['image_size'] < (1024*1024*4))
					{
						$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						if(move_uploaded_file($datum['row_image']['temp'], $datum['row_image']['path'].$actual_image_name)) {
							$this->helper->imageResize($datum['row_image']['path'].$actual_image_name,$datum['row_image']['thumb_path'].$actual_image_name,300,300);
							$this->helper->imageResize($datum['row_image']['path'].$actual_image_name,$datum['row_image']['path'].$actual_image_name,663,829);

							$uploaded_image = $actual_image_name;
						}
					}
				}
			}else{
				if(isset($datum['row_image']['old'])){
					$uploaded_image = $datum['row_image']['old'];
				}
			}

			$datum['row_service_id'] = $id;
			$datum['row_image'] = $uploaded_image;
			
			$contents[] = $datum;
		}
		
		return $this->db->insert('ge_service_rows', $contents);
	}

	public function addService($data) {		
		$today = date('Y-m-d H:i:s');

		$strip_image = NULL;
		if(strlen($data['service_strip_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['service_strip_image']['image_name']);
			$ext = pathinfo($data['service_strip_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['service_strip_image']['format']))
			{
				if($data['service_strip_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['service_strip_image']['temp'], $data['service_strip_image']['path'].$actual_image_name)){
						$strip_image = $actual_image_name;
					}
				}
			}
		}

		$data['service_strip_image'] = $strip_image;
		if(is_null($strip_image)){
			unset($data['service_strip_image']);
		}

		if(strlen($data['service_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['service_image']['image_name']);
			$ext = pathinfo($data['service_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['service_image']['format']))
			{
				if($data['service_image']['image_size'] < (1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['service_image']['temp'], $data['service_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['service_image']['path'].$actual_image_name,$data['service_image']['thumb_path'].$actual_image_name,300,300);
						$this->helper->imageResize($data['service_image']['path'].$actual_image_name,$data['service_image']['path'].$actual_image_name,663,829);

						$service_contents = $data['service_rows'];
						$service_videos = $data['service_videos'];
						unset($data['service_rows'], $data['service_videos']);

						$data['service_image'] = $actual_image_name;

						$add_service = $this->db->insert('ge_services', $data);

						if($add_service) {
							$service_id = $this->db->id();

							if(count($service_videos) > 0) {
								foreach ($service_videos as $service_video) {
									$service_video['service_id'] = $service_id;
									$this->db->insert('ge_service_videos', $service_video);
								}
							}

							if(count($service_contents) > 0){
								$this->addServiceContent($service_id, $service_contents);
							}

							return array('msg'=>'Service has been created successfully');
						}
						
						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

	function addProjectGallery($id, $data) {
		$gallery = array();
		foreach($data as $datum){
			$uploaded_image = NULL;
			if(strlen($datum['gallery_image']['image_name']))
			{
				list($txt, $ext) = explode(".", $datum['gallery_image']['image_name']);
				$ext = pathinfo($datum['gallery_image']['image_name'],PATHINFO_EXTENSION);
				if(in_array($ext,$datum['gallery_image']['format'])) {
					if($datum['gallery_image']['image_size'] < (1024*1024*10))
					{
						$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						if(move_uploaded_file($datum['gallery_image']['temp'], $datum['gallery_image']['path'].$actual_image_name)) {
							$this->helper->imageResize($datum['gallery_image']['path'].$actual_image_name,$datum['gallery_image']['thumb_path'].$actual_image_name,385,650);

							$uploaded_image = $actual_image_name;
						}
					}
				}
			}else{
				if(isset($datum['gallery_image']['old'])){
					$uploaded_image = $datum['gallery_image']['old'];
				}
			}

			$datum['project_id'] = $id;
			$datum['gallery_image'] = $uploaded_image;

			$gallery[] = $datum;
		}

		return $this->db->insert('ge_project_gallery', $gallery);
	}

	public function addProject($data) {
		$today = date('Y-m-d H:i:s');

		if(strlen($data['project_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['project_image']['image_name']);
			$ext = pathinfo($data['project_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['project_image']['format']))
			{
				if($data['project_image']['image_size'] < (1024*1024*10))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['project_image']['temp'], $data['project_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['project_image']['path'].$actual_image_name,$data['project_image']['thumb_path'].$actual_image_name,385,650);
//						$this->helper->imageResize($data['project_image']['path'].$actual_image_name,$data['project_image']['path'].$actual_image_name,385,829);

						$project_gallery = $data['project_gallery'];
						unset($data['project_gallery']);

						$data['project_image'] = $actual_image_name;
						$data['created_at'] = $today;

						$add_project = $this->db->insert('ge_projects', $data);

						if($add_project) {
							$project_id = $this->db->id();

							if(count($project_gallery) > 0){
								$this->addProjectGallery($project_id, $project_gallery);
							}

							return array('msg'=>'Project has been created successfully');
						}

						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

	public function addPost($data) {
	   // var_dump($data);exit;
		$today = date('Y-m-d H:i:s');
		if(strlen($data['blog_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['blog_image']['image_name']);
			$ext = pathinfo($data['blog_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['blog_image']['format']))
			{
				if($data['blog_image']['image_size'] < (1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['blog_image']['temp'], $data['blog_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['blog_image']['path'].$actual_image_name,$data['blog_image']['thumb_path'].$actual_image_name,258,370);
						$this->helper->imageResize($data['blog_image']['path'].$actual_image_name,$data['blog_image']['path'].$actual_image_name,324,781);

						$data['blog_image'] = $actual_image_name;

						$add_service = $this->db->insert('ge_blog', $data);

						if($add_service) {
							return array('msg'=>'Blog Post has been created successfully');
						}

						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

	public function addSlider($data) {		
		if(strlen($data['slider_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['slider_image']['image_name']);
			$ext = pathinfo($data['slider_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['slider_image']['format']))
			{
				if($data['slider_image']['image_size'] < (1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['slider_image']['temp'], $data['slider_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['slider_image']['path'].$actual_image_name,$data['slider_image']['thumb_path'].$actual_image_name,300,300);
						$this->helper->imageResize($data['slider_image']['path'].$actual_image_name,$data['slider_image']['path'].$actual_image_name,1317,1920);

						$data['slider_image'] = $actual_image_name;

						$added = $this->db->insert('ge_sliders',$data);						

						if($added) {
							return array('msg'=>'Slider has been created successfully');
						}
						
						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

	public function addCategory($data){
		$added = $this->db->insert('ge_gallery_categories',$data);						
		if($added) {
			return array('msg'=>'Category for Gallery has been created successfully');
		}	
		return array('err'=>'Error Occur while inserting into DB.');
	}

	public function addServiceCategory($data){
		$added = $this->db->insert('ge_service_categories',$data);
		if($added) {
			return array('msg'=>'Category for Services has been created successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
	}

	public function addBlogCategory($data){
		$added = $this->db->insert('ge_blog_categories',$data);
		if($added) {
			return array('msg'=>'Category for Blog Post has been created successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
	}

	public function addSector($data) {
		if(strlen($data['sector_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['sector_image']['image_name']);
			$ext = pathinfo($data['sector_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['sector_image']['format']))
			{
				if($data['sector_image']['image_size'] < (1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['sector_image']['temp'], $data['sector_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['sector_image']['path'].$actual_image_name,$data['sector_image']['thumb_path'].$actual_image_name,250,185);
						$this->helper->imageResize($data['sector_image']['path'].$actual_image_name,$data['sector_image']['path'].$actual_image_name,500,370);

						$data['sector_image'] = $actual_image_name;

						$added = $this->db->insert('ge_sectors',$data);						

						if($added) {
							return array('msg'=>'Sector has been created successfully');
						}
						
						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

	public function addGallery($data) {	
		// print_r($data);exit;
		if(strlen($data['gallery_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['gallery_image']['image_name']);
			$ext = pathinfo($data['gallery_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['gallery_image']['format']))
			{
				if($data['gallery_image']['image_size'] < (1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['gallery_image']['temp'], $data['gallery_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['gallery_image']['path'].$actual_image_name,$data['gallery_image']['thumb_path'].$actual_image_name,60,60);						
						$this->helper->imageResize($data['gallery_image']['path'].$actual_image_name,$data['gallery_image']['path'].$actual_image_name,280,370);						

						$data['gallery_image'] = $actual_image_name;

						$added = $this->db->insert('ge_gallery',$data);						

						if($added) {
							return array('msg'=>'Gallery has been created successfully');
						}
						
						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

	public function addTestimonial($data) {
		if(strlen($data['testimonial_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['testimonial_image']['image_name']);
			$ext = pathinfo($data['testimonial_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['testimonial_image']['format']))
			{
				if($data['testimonial_image']['image_size'] < (1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['testimonial_image']['temp'], $data['testimonial_image']['path'].$actual_image_name)) {
						$this->helper->imageResize($data['testimonial_image']['path'].$actual_image_name,$data['testimonial_image']['thumb_path'].$actual_image_name,60,60);						

						$data['testimonial_image'] = $actual_image_name;

						$added = $this->db->insert('ge_testimonials',$data);						

						if($added) {
							return array('msg'=>'Testimonial has been created successfully');
						}
						
						return array('err'=>'Error Occur while inserting into DB.');
					}
					else {
						return array('err'=>'Error occur while uploading image, Try Again.');
					}
				}
				else {
					return array('err'=>'File Size Error. It should be less than 4Mb');
				}
			}
			else {
				return array('err'=>'Please Select a Valid Image file format.(JPG, JPEG, PNG, GIF)');
			}
		}
		return false;
	}

// 	EDIT/UPDATE SECTION

	public function updateCategory($id, $data) {

		$updated = $this->db->update('ge_gallery_categories', $data, ['category_id' => $id]);					

		if($updated){			
			return array('msg'=>'Category for Gallery has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
		
	}

	public function updateServiceCategory($id, $data) {
		$updated = $this->db->update('ge_service_categories', $data, ['category_id' => $id]);
		if($updated){
			return array('msg'=>'Category for Services has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');

	}

	public function updateBlogCategory($id, $data) {

		$updated = $this->db->update('ge_blog_categories', $data, ['category_id' => $id]);

		if($updated){
			return array('msg'=>'Category for Blog Post has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');

	}

	public function updateService($id, $data) {

		$uploaded_image = NULL;
		if(strlen($data['service_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['service_image']['image_name']);
			$ext = pathinfo($data['service_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['service_image']['format']))
			{
				if($data['service_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;					

					if(move_uploaded_file($data['service_image']['temp'], $data['service_image']['path'].$actual_image_name)){					
						$this->helper->imageResize($data['service_image']['path'].$actual_image_name,$data['service_image']['thumb_path'].$actual_image_name,300,300);
						$this->helper->imageResize($data['service_image']['path'].$actual_image_name,$data['service_image']['path'].$actual_image_name,663,829);

						$uploaded_image = $actual_image_name;																		
					}					
				}				
			}			
		}

		$data['service_image'] = $uploaded_image;
		if(is_null($uploaded_image)){
			unset($data['service_image']);
		}

		$strip_image = NULL;
		if(strlen($data['service_strip_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['service_strip_image']['image_name']);
			$ext = pathinfo($data['service_strip_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['service_strip_image']['format']))
			{
				if($data['service_strip_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
					if(move_uploaded_file($data['service_strip_image']['temp'], $data['service_strip_image']['path'].$actual_image_name)){
						$strip_image = $actual_image_name;
					}
				}
			}
		}

		$data['service_strip_image'] = $strip_image;
		if(is_null($strip_image)){
			unset($data['service_strip_image']);
		}

		$service_contents = $data['service_rows'];
		$service_videos = $data['service_videos'];
		unset($data['service_rows'], $data['service_videos']);

		$updated = $this->db->update('ge_services', $data, ['service_id' => $id]);					

		if($updated){

			$this->db->delete('ge_service_videos', ['service_id' => $id]);
			if(count($service_videos) > 0) {
				foreach ($service_videos as $service_video) {
					$service_video['service_id'] = $id;
					$this->db->insert('ge_service_videos', $service_video);
				}
			}

			$this->deleteServiceContents($id);
			if(count($service_contents) > 0){
				$this->addServiceContent($id, $service_contents);
			}
			return array('msg'=>'Service has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
	}

	public function updateProject($id, $data) {

		$uploaded_image = NULL;
		if(strlen($data['project_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['project_image']['image_name']);
			$ext = pathinfo($data['project_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['project_image']['format']))
			{
				if($data['project_image']['image_size']<(1024*1024*10))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['project_image']['temp'], $data['project_image']['path'].$actual_image_name)){
						$this->helper->imageResize($data['project_image']['path'].$actual_image_name,$data['project_image']['thumb_path'].$actual_image_name,385,650);
//						$this->helper->imageResize($data['project_image']['path'].$actual_image_name,$data['project_image']['path'].$actual_image_name,663,829);

						$uploaded_image = $actual_image_name;
					}
				}
			}
		}

		$data['project_image'] = $uploaded_image;
		if(is_null($uploaded_image)){
			unset($data['project_image']);
		}

		$project_gallery = $data['project_gallery'];

		unset($data['project_gallery']);

		$updated = $this->db->update('ge_projects', $data, ['project_id' => $id]);

		if($updated){

			$this->deleteProjectGalleries($id);
			if(count($project_gallery) > 0){
				$this->addProjectGallery($id, $project_gallery);
			}
			return array('msg'=>'Project has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
	}

	public function updatePost($id, $data) {

		$uploaded_image = NULL;
		if(strlen($data['blog_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['blog_image']['image_name']);
			$ext = pathinfo($data['blog_image']['image_name'],PATHINFO_EXTENSION);
			if(in_array($ext,$data['blog_image']['format']))
			{
				if($data['blog_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['blog_image']['temp'], $data['blog_image']['path'].$actual_image_name)){
						$this->helper->imageResize($data['blog_image']['path'].$actual_image_name,$data['blog_image']['thumb_path'].$actual_image_name,258,370);
						$this->helper->imageResize($data['blog_image']['path'].$actual_image_name,$data['blog_image']['path'].$actual_image_name,324,781);

						$uploaded_image = $actual_image_name;
					}
				}
			}
		}

		$data['blog_image'] = $uploaded_image;

		if(is_null($uploaded_image)){
			unset($data['blog_image']);
		}

		$updated = $this->db->update('ge_blog', $data, ['blog_id' => $id]);

		if($updated){
			return array('msg'=>'Blog Post has been updated successfully');
		}
		return array('err' => 'Error Occur while inserting into DB.');
	}

	public function updateContent($id, $data) {
		
		$uploaded_image = NULL;
		if(strlen($data['image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['image']['image_name']);
			$ext = pathinfo($data['image']['image_name'], PATHINFO_EXTENSION);
			if(in_array($ext,$data['image']['format']))
			{
				if($data['image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['image']['temp'], $data['image']['path'].$actual_image_name)){						
						// $this->helper->imageResize($data['image']['path'].$actual_image_name,$data['image']['path'].$actual_image_name,940,1920);
						$uploaded_image = $actual_image_name;
					}					
				}				
			}			
		}				

		$data['image'] = $uploaded_image;		

		if(is_null($uploaded_image)){
			unset($data['image']);
		}
		
		$updated = $this->db->update('ge_content_management', $data, ['id' => $id]);

		if($updated){			
			return array('msg'=>'Content has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
	}

	public function updateSlider($id, $data) {		

		$uploaded_image = NULL;
		if(strlen($data['slider_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['slider_image']['image_name']);
			$ext = pathinfo($data['slider_image']['image_name'], PATHINFO_EXTENSION);
			if(in_array($ext,$data['slider_image']['format']))
			{
				if($data['slider_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['slider_image']['temp'], $data['slider_image']['path'].$actual_image_name)){
						$this->helper->imageResize($data['slider_image']['path'].$actual_image_name,$data['slider_image']['thumb_path'].$actual_image_name,300,300);
						$this->helper->imageResize($data['slider_image']['path'].$actual_image_name,$data['slider_image']['path'].$actual_image_name,1317,1920);

						$uploaded_image = $actual_image_name;
					}					
				}				
			}			
		}		

		$data['slider_image'] = $uploaded_image;		

		if(is_null($uploaded_image)){
			unset($data['slider_image']);
		}	
		
		$updated = $this->db->update('ge_sliders', $data, ['slider_id' => $id]);		

		if($updated){			
			return array('msg'=>'Slider has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
		
	}

	public function updateSector($id, $data) {		

		$uploaded_image = NULL;
		if(strlen($data['sector_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['sector_image']['image_name']);
			$ext = pathinfo($data['sector_image']['image_name'], PATHINFO_EXTENSION);
			if(in_array($ext,$data['sector_image']['format']))
			{
				if($data['sector_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['sector_image']['temp'], $data['sector_image']['path'].$actual_image_name)){
						$this->helper->imageResize($data['sector_image']['path'].$actual_image_name,$data['sector_image']['thumb_path'].$actual_image_name,250,185);
						$this->helper->imageResize($data['sector_image']['path'].$actual_image_name,$data['sector_image']['path'].$actual_image_name,500,370);

						$uploaded_image = $actual_image_name;
					}					
				}				
			}			
		}		

		$data['sector_image'] = $uploaded_image;		

		if(is_null($uploaded_image)){
			unset($data['sector_image']);
		}	
		
		$updated = $this->db->update('ge_sectors', $data, ['sector_id' => $id]);		

		if($updated){			
			return array('msg'=>'Sector has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');
		
	}

	public function updateTestimonial($id, $data) {

		$uploaded_image = NULL;
		if(strlen($data['testimonial_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['testimonial_image']['image_name']);
			$ext = pathinfo($data['testimonial_image']['image_name'], PATHINFO_EXTENSION);
			if(in_array($ext,$data['testimonial_image']['format']))
			{
				if($data['testimonial_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['testimonial_image']['temp'], $data['testimonial_image']['path'].$actual_image_name)){
						$this->helper->imageResize($data['testimonial_image']['path'].$actual_image_name,$data['testimonial_image']['thumb_path'].$actual_image_name,60,60);						

						$uploaded_image = $actual_image_name;
					}					
				}				
			}			
		}		

		$data['testimonial_image'] = $uploaded_image;		

		if(is_null($uploaded_image)){
			unset($data['testimonial_image']);
		}	
		
		$updated = $this->db->update('ge_testimonials', $data, ['testimonial_id' => $id]);		

		if($updated){			
			return array('msg'=>'Testimonial has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');	
	}

	public function updateGallery($id, $data) {

		$uploaded_image = NULL;
		if(strlen($data['gallery_image']['image_name']))
		{
			list($txt, $ext) = explode(".", $data['gallery_image']['image_name']);
			$ext = pathinfo($data['gallery_image']['image_name'], PATHINFO_EXTENSION);
			if(in_array($ext,$data['gallery_image']['format']))
			{
				if($data['gallery_image']['image_size']<(1024*1024*4))
				{
					$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;

					if(move_uploaded_file($data['gallery_image']['temp'], $data['gallery_image']['path'].$actual_image_name)){
						$this->helper->imageResize($data['gallery_image']['path'].$actual_image_name,$data['gallery_image']['thumb_path'].$actual_image_name,60,60);						
						$this->helper->imageResize($data['gallery_image']['path'].$actual_image_name,$data['gallery_image']['path'].$actual_image_name,280,370);						

						$uploaded_image = $actual_image_name;
					}					
				}				
			}			
		}		

		$data['gallery_image'] = $uploaded_image;		

		if(is_null($uploaded_image)){
			unset($data['gallery_image']);
		}	
		
		$updated = $this->db->update('ge_gallery', $data, ['gallery_id' => $id]);		

		if($updated){			
			return array('msg'=>'Gallery has been updated successfully');
		}
		return array('err'=>'Error Occur while inserting into DB.');	
	}

// 	OTHERS SECTION


    function getOldPassword($id,$db = NULL){
        $this->query('SELECT password FROM `room_admin` WHERE id=?');
        $this->assign(array('i',$id));
        if($this->proceed()){
            $result = $this->row();
            if($this->no_of_rows > 0){
                return $result;
            }
        }
        return false;
    }

    function changePassword($id,$new,$db = NULL) {
        $newPass = $this->encrypt($new);
        $this->query('UPDATE `room_admin` SET password=? WHERE id=?');
        $this->assign(array('si',$newPass,$id));
        if($this->proceed()){
            return true;
        }
        return false;
    }

}