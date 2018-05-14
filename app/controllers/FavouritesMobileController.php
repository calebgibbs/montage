<?php  
class FavouritesController extends PageController { 
	public function __construct($dbc){ 
		parent::__construct();  
		$this->dbc = $dbc;  
		$this->getFavourites();
	}  
	public function buildHTML(){ 
		echo $this->plates->render('mobileFavourites', $this->data); 
	} 

	private function getFavourites(){ 
		if(isset($_SESSION['id'])){ 
			$id = $_SESSION['id'];
			$sql = "SELECT product_id FROM favourites WHERE user_id = '$id'"; 
			$favourites = $this->dbc->query($sql); 
			
			if( !$favourites || $favourites->num_rows != 0 ){ 
				$favourites = $favourites->fetch_all(MYSQLI_ASSOC);  
				$fav = array();
				$counter = 0;
				foreach( $favourites as $f ){ 
					$id = $f['product_id'];  
					$sql = "SELECT p.id, p.title, 
					i.image 
					FROM products as p 
					JOIN product_images as i 
					WHERE p.id = '$id' 
					AND i.product_id = '$id' 
					AND i.image_position = 1"; 
					$result = $this->dbc->query($sql);  
					if( !$result || $result->num_rows != 0){ 
						$result = $result->fetch_all(MYSQLI_ASSOC);	 
						array_push($fav, $result);
					}

				} 

				$this->data['fav'] = $fav;

			}else{ 	
				$fav = array();
			}
		}else{ 
			$cookie = isset($_COOKIE['favourites']) ? $_COOKIE['favourites'] : "";
			$cookie = stripslashes($cookie);
			$favourites = json_decode($cookie, true);
			if (!$favourites) {
				$favourites = array();
			}
			$fav = array();
			
			foreach( $favourites as $f ){ 
				$id = $f; 
				$sql = "SELECT p.id, p.title, 
					i.image 
					FROM products as p 
					JOIN product_images as i 
					WHERE p.id = '$id' 
					AND i.product_id = '$id' 
					AND i.image_position = 1"; 
					$result = $this->dbc->query($sql);  
					if( !$result || $result->num_rows != 0){ 
						$result = $result->fetch_all(MYSQLI_ASSOC);	 
						array_push($fav, $result);
					}  
			}  

			$this->data['fav'] = $fav;

		}
	}
}