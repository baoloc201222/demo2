<?php 
class VV_Model{
	private $__host = DB_HOST;
	private $__user = DB_USER;
	private $__pass = DB_PASSWORD;
	private $__db = DB_DATABASE;
	private $__conn;
	function connect(){
		if(!$this->__conn){
			$this->__conn = mysqli_connect($this->__host,$this->__user,$this->__pass,$this->__db) or die('Connect Error !');
			//mysqli_query($this->__conn,"SET character_set_results='utf8',character_set_client='utf8',character_set_database='utf8',character_set_server='utf8' ");
			mysqli_set_charset($this->__conn, 'utf8');
		}
	}
	function dis_connect(){
		if($this->__conn){
			mysqli_close($this->__conn);
		}
	}
	function insert($table,$data){
		$this->connect();
		$field_list = '';
		$field_val = '';
		foreach($data as $key=>$val){
			$field_list .= ",".(string)$key;
			$field_val .= ",'".(string)$val."'";
		}
		$sql = "INSERT INTO ".$table."(".trim($field_list,',').") VALUES(".trim($field_val,',').")";
		return mysqli_query($this->__conn,$sql);
	}
	function insert2($table,$data){ // return id AUTO_INCREMENT
		$this->connect();
		$field_list = '';
		$field_val = '';
		foreach($data as $key=>$val){
			$field_list .= ",".(string)$key;
			$field_val .= ",'".(string)$val."'";
		}
		$sql = "INSERT INTO ".$table."(".trim($field_list,',').") VALUES(".trim($field_val,',').")";
		if (mysqli_query($this->__conn,$sql)) {
		    return mysqli_insert_id($this->__conn);
		} else {
		    return '';
		}
	}
	function update($table,$data,$where){
		$this->connect();
		$sql = '';
		foreach($data as $key=>$val){
			$sql .= ",".$key."='".$val."'";
		}
		$sql = "UPDATE ".$table." SET ".trim($sql,',')." WHERE ".$where;
		return mysqli_query($this->__conn,$sql);
	}
	function vv_query($sql){
		$this->connect();
		mysqli_query($this->__conn,$sql);
		return mysqli_affected_rows($this->__conn); // >0 query thanh cong, =0: ko co hanh dong, =-1: Loi
	}
	function remove($table,$where){
		$this->connect();
		$sql = "DELETE FROM ".$table." WHERE ".$where;
		return mysqli_query($this->__conn,$sql);
	}
	function get_row($sql){
		$this->connect();
		$result = mysqli_query($this->__conn,$sql);
		if(!$result){
			return array();
		}
		$row = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		if($row){
			return $row;
		}else{
			return array();
		}
	}
	function get_list($sql){
		$this->connect();
		$result = mysqli_query($this->__conn,$sql);
		if(!$result){
			return array();
		}
		$data = array();
		if(mysqli_num_rows($result)>0){
			while($rows=mysqli_fetch_assoc($result)){
				$data[] =$rows;
			}
		}
		return $data;
	}
	function get_list2($sql,$field){
		$this->connect();
		$result = mysqli_query($this->__conn,$sql);
		if(!$result){
			return array();
		}
		$data = array();
		if(mysqli_num_rows($result)>0){
			while($rows=mysqli_fetch_assoc($result)){
				$data[] =$rows[$field];
			}
		}
		return $data;
	}
	function get_list3($sql,$field){
		$this->connect();
		$result = mysqli_query($this->__conn,$sql);
		if(!$result){
			return array();
		}
		$data = array();
		if(mysqli_num_rows($result)>0){
			while($rows=mysqli_fetch_assoc($result)){
				$data[$rows[$field]] =$rows;
			}
		}
		return $data;
	}
	function get_count($sql){
		$this->connect();
		$result = mysqli_query($this->__conn,$sql);
		return mysqli_num_rows($result);
	}
}