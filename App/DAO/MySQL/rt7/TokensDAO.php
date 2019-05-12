<?php

namespace App\DAO\MySQL\rt7;

use App\Models\MySQL\rt7\TokenModel;

class TokensDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createToken(TokenModel $token): void
    {    
        /*
        * Na criação de um novo token, desativa os anteriores por segurança
        */
        $statement = $this->pdo
            ->prepare('UPDATE rt7.tokens
                          SET tkn_active = 0
                        WHERE tkn_usr_id = :tkn_usr_id;');
        $statement->execute([
            'tkn_usr_id' => $token->getUsuarios_id()
        ]);
        
        /*
         * Salva o novo token
         */
        $statement = $this->pdo
            ->prepare('INSERT INTO rt7.tokens(tkn_token
                                            ,tkn_refresh_token
                                            ,tkn_expired_at
                                            ,tkn_usr_id)
                                      VALUES(:tkn_token
                                            ,:tkn_refresh_token
                                            ,:tkn_expired_at
                                            ,:tkn_usr_id);');
        $statement->execute([
            'tkn_token' => $token->getToken(),
            'tkn_refresh_token' => $token->getRefresh_token(),
            'tkn_expired_at' => $token->getExpired_at(),
            'tkn_usr_id' => $token->getUsuarios_id()
        ]);
    }

    public function verifyRefreshToken(string $refresh_token): bool
    {
        /**
         * Verifica se tem token ativo
         */
        $statement = $this->pdo
            ->prepare('SELECT tkn_id
                         FROM rt7.tokens
                        WHERE tkn_refresh_token = :tkn_refresh_token
                          AND tkn_active = 1;');
        $statement->bindParam('tkn_refresh_token', $refresh_token);
        $statement->execute();
        $tokens = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if(count($tokens) === 0){
            return false;
        }
        else{
            /*
            * Desativa o token atual para geração do novo
            * (permitido refresh token apenas uma vez)
            */
            $statement = $this->pdo
                ->prepare('UPDATE rt7.tokens
                              SET tkn_active = 0
                            WHERE tkn_refresh_token = :tkn_refresh_token;');
            $statement->bindParam('tkn_refresh_token', $refresh_token);
            $statement->execute(); 

            return true;
        }
    }
}
