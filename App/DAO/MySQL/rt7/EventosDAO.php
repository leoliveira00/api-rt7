<?php

namespace App\DAO\MySQL\rt7;

use App\Models\MySQL\rt7\EventoModel;

class EventosDAO extends Conexao{
    public function __construct(){
        parent::__construct();
    }

    public function getAllEventos(): array
    {
        $eventos = $this->pdo
            ->query('SELECT e.evt_id
						   ,e.evt_data
						   ,e.evt_descr
						   ,e.evt_flg_ativo
					   FROM rt7.eventos e
					  ORDER BY 1 DESC;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $eventos;
    }

    public function insertEvento(EventoModel $evento): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO rt7.eventos VALUES(null
                                                     ,:evt_data
													 ,:evt_descr
													 ,:evt_flg_ativo);');
        
		$statement->execute(['evt_data' => $evento->getData()
							,'evt_descr' => $evento->getDescr()
							,'evt_flg_ativo' => $evento->getFlgAtivo()
        ]);
    }

    public function updateEvento(EventoModel $evento): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE rt7.eventos 
						  SET evt_data = :evt_data
							 ,evt_descr = :evt_descr
							 ,evt_flg_ativo = :evt_flg_ativo
						WHERE evt_id = :evt_id;');
		
        $statement->execute([
            'evt_data' => $evento->getData(),
            'evt_descr' => $evento->getDescr(),
            'evt_flg_ativo' => $evento->getFlgAtivo(),
            'evt_id' => $evento->getId()
        ]);
    }

    public function deleteEvento(int $evt_id): void
    {
        $statement = $this->pdo->prepare('DELETE FROM rt7.eventos WHERE evt_id = :evt_id;');
		$statement->execute(['evt_id' => $evt_id]);
    }
}