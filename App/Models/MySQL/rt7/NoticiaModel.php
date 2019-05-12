<?php

namespace App\Models\MySQL\rt7;

final class NoticiaModel
{
    /**
     * @var int
     */
    private $ntc_id;
    /**
     * @var string
     */
    private $ntc_titulo;
    /**
     * @var string
     */
    private $ntc_subtitulo;
    /**
     * @var string
     */
    private $ntc_texto;
    /**
     * @var string
     */
    private $ntc_path_img;
    /**
     * @var string
     */
    private $ntc_data;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->ntc_id;
    }

    /**
     * @param int $ntc_id
     * @return NoticiaModel
     */
    public function setId(int $ntc_id): NoticiaModel
    {
        $this->ntc_id = $ntc_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->ntc_titulo;
    }
    /**
     * @param string $ntc_titulo
     * @return NoticiaModel
     */
    public function setTitulo(string $ntc_titulo): NoticiaModel
    {
        $this->ntc_titulo = $ntc_titulo;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitulo(): string
    {
        return $this->ntc_subtitulo;
    }
    /**
     * @param string $ntc_subtitulo
     * @return NoticiaModel
     */
    public function setSubtitulo(string $ntc_subtitulo): NoticiaModel
    {
        $this->ntc_subtitulo = $ntc_subtitulo;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto(): string
    {
        return $this->ntc_texto;
    }

    /**
     * @param string $ntc_texto
     * @return NoticiaModel
     */
    public function setTexto(string $ntc_texto): NoticiaModel
    {
        $this->ntc_texto = $ntc_texto;
        return $this;
    }

    /**
     * @return string
     */
    public function getPathImg(): string
    {
        return $this->ntc_path_img;
    }

    /**
     * @param string $ntc_path_img
     * @return NoticiaModel
     */
    public function setPathImg(string $ntc_path_img): NoticiaModel
    {
        $this->ntc_path_img = $ntc_path_img;
        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->ntc_data;
    }

    /**
     * @param string $ntc_data
     * @return NoticiaModel
     */
    public function setData(string $ntc_data): NoticiaModel
    {
        $this->ntc_data = $ntc_data;
        return $this;
    }
}
