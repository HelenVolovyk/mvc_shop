<?php
namespace App\Controllers;

use App\Config;
use App\Models\Image;
use Framework\Core\AbsController;
use Framework\Core\AbsView;
use PDO;

class ImageController extends AbsController
{
	public function upload()
	{
		AbsView::render('admin/image.php');
	}
	public function store()
	{		
		$msg = '';
		
		if(isset($_POST['submit'])){
		
			$img = time()."-".$_FILES["file"]["name"];
 
			$tname = $_FILES["file"]["tmp_name"];
		  
	  		$uploads_dir = 'images';
			
			move_uploaded_file($tname, $uploads_dir.'/'.$img);

			 $image = new Image();
			 $image->store($img);
				
			if($img){
				return 'Image uploaded uccesfullys';
				AbsView::site_redirect('image/store/');
			} else {
					return 'not img';
					redirect_back();
				}
		
		}
	}
}