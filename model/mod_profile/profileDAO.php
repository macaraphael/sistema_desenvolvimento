<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_my_profile
 * @method public UserProfileList(public $id_user) listar apenas uma perfil especifico
 * @author Raphael
 */
class profileDAO extends core{
    //put your code here
    private $action;
    public function __construct() {
        $this->action = new core;
        
    }
    //Listando informações de um determindo usuario
    public function UserProfileList($id_user){
        try{
            $sql = "select * from user where id_user = {$id_user}";
            $list = $this->action->query($sql);
            return $list;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    //Atualiza o usuario
    public function UpdateUser($profile_class, $id_user){
        try{
            $sql = "UPDATE user SET name = ?, user_name = ?, password = ?, editor = ? WHERE id_user = {$id_user}";

            $update = $this->action->prepare($sql);

            $update->bindValue(1, $profile_class->getName(), PDO::PARAM_STR);
            $update->bindValue(2, $profile_class->getUser_name(), PDO::PARAM_STR);
            $update->bindValue(3, $profile_class->getPass(), PDO::PARAM_STR);
            $update->bindValue(4, $profile_class->getEditor(), PDO::PARAM_STR);

            $verifica = $update->execute();

            if($verifica === true){
                echo "<script>window.alert('Salvo com sucesso')</script>";
            }else{
                echo "<script>window.alert('Erro ao salvar')</script>";
            }

        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    //Listar apenas a senha
    public function ListPassword($id_user){
        try{
            $sql = "select password from user where id_user = {$id_user}";
            $list = $this->action->query($sql);
            return $list;
        }  catch (Exception $e){
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}

?>
