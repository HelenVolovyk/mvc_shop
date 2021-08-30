<?php
namespace App\Controllers;

use App\Models\Image;
use Framework\Core\AbsController;
use Framework\Core\AbsView;


class ImageController extends AbsController
{
	public function upload()
	{
		AbsView::render('admin/image.php');
	}
	
	public function store()
	{		
		if(isset($_POST['submit'])){
		
			$img = time()."-".$_FILES["file"]["name"];
 
			$tname = $_FILES["file"]["tmp_name"];
		  
	  		$uploads_dir = 'images';
			
			move_uploaded_file($tname, $uploads_dir.'/'.$img);

			 $image = new Image();
			 $image->store($img);
				
			if($img){
				$_SESSION['error']['login']['common'] = 'image successfully saved';
				AbsView::site_redirect('image');
				
			} else {
				$_SESSION['error']['login']['common'] = 'not img';
				redirect_back(); 
					
				}
		
		}
	}
}