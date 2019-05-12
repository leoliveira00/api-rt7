<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\DAO\MySQL\rt7\NoticiasDAO;
use App\Models\MySQL\rt7\NoticiaModel;

final class NoticiaController
{
    public function getNoticias(Request $request, Response $response, array $args): Response
    {
        $noticiasDAO = new NoticiasDAO();
        $noticias = $noticiasDAO->getAllNoticias();
        $response = $response->withJson($noticias);
        return $response;
    }

    public function insertNoticia(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $file = $request->getUploadedFiles();
        
        $newimage = $file['imagem'];
        
        if($newimage->getError() === UPLOAD_ERR_OK) {
            $uploadFileName = $newimage->getClientFilename();
            $name = uniqid('img-'.date('Ymd').'-');
            $name.= $uploadFileName;
            $newimage->moveTo("App/img/".$name);

            $noticiasDAO = new NoticiasDAO();
            $noticia = new NoticiaModel();
            
            $noticia->setTitulo($data['ntc_titulo'])
                ->setSubtitulo($data['ntc_subtitulo'])
                ->setTexto($data['ntc_texto'])
                ->setPathImg($name)
                ->setData($data['ntc_data']);
            
            $noticiasDAO->insertNoticia($noticia);

            $response = $response->withJson([
                'message' => 'Noticia inserida com sucesso!'
            ]);
        }
        else{            
            $response = $newimage->getError();
        }
        return $response;
    }

    public function updateNoticia(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $noticiasDAO = new NoticiasDAO();
        $noticia = new NoticiaModel();
        $noticia->setId($data['ntc_id'])
            ->setTitulo($data['ntc_titulo'])
            ->setSubtitulo($data['ntc_subtitulo'])
            ->setTexto($data['ntc_texto'])
            #->setPathImg($data['ntc_path_img'])
            ->setData($data['ntc_data']);
        $noticiasDAO->updateNoticia($noticia);

        $response = $response->withJson([
            'message' => 'Noticia alterada com sucesso!'
        ]);

        return $response;
    }

    public function deleteNoticia(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getParsedBody();

        $noticiasDAO = new NoticiasDAO();
        $ntc_id = (int)$queryParams['ntc_id'];
        $noticiasDAO->deleteNoticia($ntc_id);

        $response = $response->withJson([
            'message' => 'Noticia excluída com sucesso!'
        ]);

        return $response;
    }
}