<?php
require_once("MysqlBd.php");
     class CarreMannager extends MysqlBd{

        public function __construct(){
            $this->className="Carre";
        }

        public function create($data){
            $sql="insert into carre (longueur) values(".$data->getLongueur().")";
            return $this->ExecuteSelect($sql)!=0;
        }

        public function update($data1){
            $sql="update carre set ";
        }

        public function delete($id){
            $sql="delete carre";
        }

        public function findAll(){
            $sql="select * from carre";
            return $this->ExecuteSelect($sql);
        }

        public function findById($id){
            $sql="select * from carre where id=$id";
        }
     }

?>