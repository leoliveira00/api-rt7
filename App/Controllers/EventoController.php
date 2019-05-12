<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\DAO\MySQL\rt7\EventosDAO;
use App\Models\MySQL\rt7\EventoModel;

final class EventoController
{
    public function getEventos(Request $request, Response $response, array $args): Response
    {
        $eventosDAO = new EventosDAO();
        $eventos = $eventosDAO->getAllEventos();
        $response = $response->withJson($eventos);
        return $response;
    }

    public function insertEvento(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $eventosDAO = new EventosDAO();
        $evento = new EventoModel();
        
        $evento->setData($data['evt_data'])
            ->setDescr($data['evt_descr'])
            ->setFlgAtivo($data['evt_flg_ativo']);
        
        $eventosDAO->insertEvento($evento);

        $response = $response->withJson([
            'message' => 'Evento inserido com sucesso!'
        ]);

        return $response;
    }

    public function updateEvento(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        /*echo"<pre>";
        print_r($data);
        echo"</pre>";
        die;*/

        $eventosDAO = new EventosDAO();
        $evento = new EventoModel();
        $evento->setId((int)$data['evt_id'])
            ->setData($data['evt_data'])
            ->setDescr($data['evt_descr'])
            ->setFlgAtivo($data['evt_flg_ativo']);
        $eventosDAO->updateEvento($evento);

        $response = $response->withJson([
            'message' => 'Evento alterado com sucesso!'
        ]);

        return $response;
    }

    public function deleteEvento(Request $request, Response $response, array $args): Response
    {
        $queryParams = $request->getParsedBody();

        $eventosDAO = new EventosDAO();
        $evt_id = (int)$queryParams['evt_id'];
        $eventosDAO->deleteEvento($evt_id);

        $response = $response->withJson([
            'message' => 'Evento excluído com sucesso!'
        ]);

        return $response;
    }
}