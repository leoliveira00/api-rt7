<?php

namespace App\Models\MySQL\rt7;

final class EventoModel
{
    /**
     * @var int
     */
    private $evt_id;
    /**
     * @var string
     */
    private $evt_data;
    /**
     * @var string
     */
    private $evt_descr;
    /**
     * @var string
     */
    private $evt_flg_ativo;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->evt_id;
    }

    public function setId(int $evt_id): EventoModel
    {
        $this->evt_id = $evt_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->evt_data;
    }
    /**
     * @param string $evt_data
     * @return EventoModel
     */
    public function setData(string $evt_data): EventoModel
    {
        $this->evt_data = $evt_data;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescr(): string
    {
        return $this->evt_descr;
    }
    /**
     * @param string $evt_descr
     * @return EventoModel
     */
    public function setDescr(string $evt_descr): EventoModel
    {
        $this->evt_descr = $evt_descr;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlgAtivo(): string
    {
        return $this->evt_flg_ativo;
    }
    /**
     * @param string $evt_flg_ativo
     * @return EventoModel
     */
    public function setFlgAtivo(string $evt_flg_ativo): EventoModel
    {
        $this->evt_flg_ativo = $evt_flg_ativo;
        return $this;
    }
}
