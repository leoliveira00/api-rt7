<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\rt7\UsuariosDAO;
use Firebase\JWT\JWT;
use App\DAO\MySQL\rt7\TokensDAO;
use App\Models\MySQL\rt7\TokenModel;

final class LoginController
{
    public function login(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $usr_email = $data['usr_email'];
        $usr_senha = $data['usr_senha'];
        $expireDate = $data['expire_date'];
        
        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->getUsuarioByEmail($usr_email);  
        
        if(is_null($usuario)){
            return  $response->withStatus(401);
        }
        
        if(!password_verify($usr_senha, $usuario->getSenha())){
            return  $response->withStatus(401);
        }

        $tokenPayload = [
            'sub' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'expired_at' => $expireDate
        ];

        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'email' => $usuario->getEmail(),
            'ramdom' => uniqid()
        ];
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        $tokenModel = new TokenModel();
        $tokenModel->setExpired_at($expireDate)
            ->setRefresh_token($refreshToken)
            ->setToken($token)
            ->setUsuarios_id($usuario->getId());

        $tokensDAO = new TokensDAO();
        $tokensDAO->createToken($tokenModel);

        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshToken
        ]);

        return $response;
    }
    
    public function refreshToken(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $refreshToken = $data['refresh_token'];
        $expireDate = $data['expire_date'];

        $tokensDAO = new TokensDAO();
        $existeRefreshToken = $tokensDAO->verifyRefreshToken($refreshToken);

        if(!$existeRefreshToken){
            #echo "teste";
            return $response->withStatus(401);
        }

        $refreshTokenDecoded = JWT::decode(
            $refreshToken,
            getenv('JWT_SECRET_KEY'),
            ['HS256']
        );

        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->getUsuarioByEmail($refreshTokenDecoded->email);
        
        if(is_null($usuario)){
            #echo "teste2";
            return $response->withStatus(401);
        }

        $tokenPayload = [
            'sub' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'expired_at' => $expireDate
        ];
        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'email' => $usuario->getEmail(),
            'ramdom' => uniqid()
        ];
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        $tokenModel = new TokenModel();
        $tokenModel->setExpired_at($expireDate)
            ->setRefresh_token($refreshToken)
            ->setToken($token)
            ->setUsuarios_id($usuario->getId());

        $tokensDAO = new TokensDAO();
        $tokensDAO->createToken($tokenModel);

        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshToken
        ]);

        return $response;
    }
}