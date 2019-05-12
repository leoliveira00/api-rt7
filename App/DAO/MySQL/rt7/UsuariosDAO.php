<?php

namespace App\DAO\MySQL\rt7;

use App\Models\MySQL\rt7\UsuarioModel;

class UsuariosDAO extends Conexao{
    public function __construct(){
        parent::__construct();
    }

    public function getUsuarioByEmail(string $usr_email): ?UsuarioModel
    {
        $statement = $this->pdo
            ->prepare('SELECT u.usr_id
                             ,u.usr_nome
                             ,u.usr_email
                             ,u.usr_senha 
                         FROM rt7.usuarios u 
                        WHERE u.usr_email = :usr_email');
        
        $statement->bindParam('usr_email', $usr_email);
        $statement->execute();
        $usuarios = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(count($usuarios) === 0){
            return null;
        }
        else{
            $usuario = new UsuarioModel();
            $usuario->setId($usuarios[0]['usr_id'])
                ->setNome($usuarios[0]['usr_nome'])
                ->setEmail($usuarios[0]['usr_email'])
                ->setSenha($usuarios[0]['usr_senha']);
            return $usuario;
        }            
    }
}