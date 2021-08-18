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
			
			$connection = mysqli_connect(Config::DB_HOST,  Config::DB_USER, 
			Config::DB_PASS, Config::DB_NAME);

			$sql = "INSERT INTO images (img ) VALUES ('$img')";
			if(mysqli_query($connection, $sql)){
				echo 'Image uploaded uccesfullys';
			} else {
				echo 'not img';
			}
			
		
		}
	}
}