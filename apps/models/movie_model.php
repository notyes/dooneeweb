<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/ADODB_Model.php');
class Movie_model extends ADODB_model {

	public function __construct(){
		parent::__construct();
	}

	public function getMovie($movieID){
		$sql = "SELECT * 
				FROM ".$this->table('movie')."
				WHERE movie_id = ".$movieID." 
				AND status = 'ACTIVE' ";
		return $this->adodb->GetRow($sql);
	}

	public function getMovies($page=1,$limit=30){
		$sql ="SELECT * 
				FROM ".$this->table('movie')." 
				WHERE status = 'ACTIVE'
				ORDER BY movie_id DESC";
		return $this->fetchPage($sql,$page,$limit);
	}
	public function getMoviesHot($page=1,$limit=30){
		$sql ="SELECT * 
				FROM ".$this->table('movie')." 
				WHERE is_hot = 'YES' 
				AND status = 'ACTIVE'
				ORDER BY movie_id DESC ";
		return $this->fetchPage($sql,$page,$limit);
	}
	public function getMoviesCategory($category_id,$page=1,$limit=30){
		if(is_array($category_id)){
			$category_id = "mc.category_id IN (".implode(',',$category_id).") ";
		}else{
			$category_id = "mc.category_id = '".$category_id."' ";
		}
		$sql ="SELECT m.* 
				FROM ".$this->table('movie_category','mc')."  
				LEFT JOIN ".$this->table('movie','m')." ON mc.movie_id = m.movie_id
				WHERE ".$category_id." 
				AND m.status = 'ACTIVE'
				ORDER BY movie_id DESC ";
		return $this->fetchPage($sql,$page,$limit);
	}
	public function getMoviesSeries($page=1,$limit=30){
		$sql ="SELECT * 
				FROM ".$this->table('movie')."  
				WHERE is_series='YES' 
				AND status = 'ACTIVE'
				ORDER BY movie_id DESC ";
		return $this->fetchPage($sql,$page,$limit);	
	}
	public function getMovieRelate($movieID,$page=1,$limit=30){
		$sql = "SELECT m.*
				FROM ".$this->table('movie_tags','mt1')."
				LEFT JOIN ".$this->table('movie','m')." ON mt1.movie_id = m.movie_id
				WHERE mt1.tags_id IN (SELECT tags_id FROM ".$this->table('movie_tags','mt2')." WHERE mt2.movie_id = ".$movieID.")
				AND mt1.movie_id != ".$movieID."
				AND m.status = 'ACTIVE' 
				GROUP BY m.movie_id 
				ORDER BY m.movie_id DESC ";
		;
		return $this->fetchPage($sql,$page,$limit);
	}
	public function getMoviesLetter($q,$page=1,$limit=30){
		$sql ="SELECT * 
				FROM ".$this->table('movie')." 
				WHERE (title LIKE '".$q."%' OR title_en LIKE '".$q."%' )
				AND status = 'ACTIVE'
				ORDER BY movie_id DESC";
		return $this->fetchPage($sql,$page,$limit);	
	}
	public function getMoviesSearch($q,$page=1,$limit=30){
		$sql ="SELECT * 
				FROM ".$this->table('movie')." 
				WHERE (title LIKE '%".$q."%' OR title_en LIKE '%".$q."%' )
				AND status = 'ACTIVE'
				ORDER BY movie_id DESC";
		return $this->fetchPage($sql,$page,$limit);	
	}

	public function getMovieEpisode($movieID="",$page=1,$limit=30){
		$sql = "SELECT * 
				FROM ".$this->table('episode')."
				WHERE movie_id = '".$movieID."'
				AND status = 'ACTIVE' 
				ORDER BY title ASC ";
		return $this->fetchPage($sql,$page,$limit);
	}
	public function canWatch($member_id,$movie_id){
		$sql ="SELECT COUNT(*) AS canwatch 
				FROM ".$this->table('user_package','up')." 
				LEFT JOIN ".$this->table('package_category','pc')." ON up.package_id = pc.package_id 
				LEFT JOIN ".$this->table('movie_category','mc')." ON pc.category_id = mc.category_id 
				WHERE up.user_id = ".$member_id." 
				AND up.expire_date > NOW()
				AND up.status = 'ACTIVE'
				AND mc.movie_id = ".$movie_id." ";

		$resp = $this->adodb->GetRow($sql);
		if($resp['canwatch']>0){
			return true;
		}else{
			return false;
		}
		
	}
	
}

/* End of file movie_model.php */
/* Location: ./application/models/movie_model.php */