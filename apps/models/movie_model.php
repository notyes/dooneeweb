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
				WHERE status = 'ACTIVE'
				ORDER BY movie_id DESC ";
		return $this->fetchPage($sql,$page,$limit);
	}

	public function getMovieRelate($movieID,$limit=3){
		$sql ="SELECT * 
				FROM ".$this->table('movie')." 
				WHERE status = 'ACTIVE' 
				ORDER BY movie_id DESC 
				LIMIT ".$limit." 
				";
		return $this->adodb->GetAll($sql);
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

	public function setMovie($data){
		$this->adodb->debug=true;
		return $this->adodb->AutoExecute($this->table('movie'),$data,'INSERT');
	}

	public function updateMovie($movie_id,$data){
		$data['edit_date'] = date('Y-m-d H:i:s');
		return $this->adodb->AutoExecute($this->table('movie'),$data,'UPDATE',"movie_id='".$movie_id."'");
	}

	public function delete($movie_id){
		return $this->adodb->AutoExecute($this->table('movie'),array('status'=>'INACTIVE'),'UPDATE',"movie_id='".$movie_id."'");	
	}
}

/* End of file movie_model.php */
/* Location: ./application/models/movie_model.php */