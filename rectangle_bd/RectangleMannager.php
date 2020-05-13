<?php
    require_once("MysqlBd.php");
    class RectangleMannager extends MysqlBd{

        public function __construct(){
            $this->className="rectangle";
        }

        public function create($data){
            $sql="insert into rectangle  values (".$data->getLongueur().",".$data->getLargeur().") ";
            return $this->ExecuteSelect($sql)!=0;
        }

        public function update($data){
            $sql="update rectangle";
        }

        public function delete($id){
            $sql="delete rectangle";
        }

        public function findAll(){
            $sql="select * from rectangle";
            return $this->ExecuteSelect($sql);
        }

        public function findById($id){
            $sql="select * from rectangle where id=$id";
        }
    }

?>