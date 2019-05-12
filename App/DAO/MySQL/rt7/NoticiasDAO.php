<?php

namespace App\DAO\MySQL\rt7;

use App\Models\MySQL\rt7\NoticiaModel;

class NoticiasDAO extends Conexao{
    public function __construct(){
        parent::__construct();
    }

    public function getAllNoticias(): array
    {
        $noticias = $this->pdo
            ->query('SELECT ntc_id
                           ,ntc_titulo
                           ,ntc_subtitulo
                           ,ntc_texto
                           ,ntc_path_img
                           ,ntc_data 
                       FROM RT7.noticias 
                    ORDER BY 1 DESC;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $noticias;
    }

    public function insertNoticia(NoticiaModel $noticia): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO rt7.noticias(ntc_titulo
                                               ,ntc_subtitulo
                                               ,ntc_texto
                                               ,ntc_path_img
                                               ,ntc_data) 
                                        VALUES (:ntc_titulo
                                               ,:ntc_subtitulo
                                               ,:ntc_texto
                                               ,:ntc_path_img
                                               ,:ntc_data);');
        
		$statement->execute(['ntc_titulo' => $noticia->getTitulo()
							,'ntc_subtitulo' => $noticia->getSubtitulo()
							,'ntc_texto' => $noticia->getTexto()
							,'ntc_path_img' => $noticia->getPathImg()
							,'ntc_data' => $noticia->getData()
        ]);
    }

    public function updateNoticia(NoticiaModel $noticia): void
    {        
        $titulo = $noticia->getTitulo();
        $subtitulo = $noticia->getSubtitulo();
        $texto = $noticia->getTexto();
        $data = $noticia->getData();

        $strUpdate = 'UPDATE rt7.noticias SET ';
        if($titulo!="") $strUpdate.= ' ntc_titulo="'.$titulo.'"';
        if($subtitulo!="") $strUpdate.= ' ntc_subtitulo="'.$subtitulo.'"';
        if($texto!="") $strUpdate.= ' ,ntc_texto="'.$texto.'"';
        if($data!="") $strUpdate.= ' ,ntc_data="'.$data.'"';
        $strUpdate.= ' WHERE ntc_id='.$noticia->getId();

        $statement = $this->pdo->prepare($strUpdate);
        $statement->execute();        
    }

    public function deleteNoticia(int $ntc_id): void
    {
        $statement = $this->pdo->prepare('DELETE FROM rt7.noticias WHERE ntc_id = :ntc_id;');
		$statement->execute(['ntc_id' => $ntc_id]);
    }
}