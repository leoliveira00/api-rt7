<?php

namespace App\Models\MySQL\rt7;

final class TokenModel
{
    /**
     * @var int
     */
    private $tkn_id;
    /**
     * @var string
     */
    private $tkn_token;
    /**
     * @var string
     */
    private $tkn_refresh_token;
    /**
     * @var string
     */
    private $tkn_expired_at;
    /**
     * @var int
     */
    private $tkn_usr_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->tkn_id;
    }

    /**
     * @param int $tkn_id
     * @return self
     */
    public function setId(int $tkn_id): self
    {
        $this->id = $tkn_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->tkn_token;
    }

    /**
     * @param string $tkn_token
     * @return self
     */
    public function setToken(string $tkn_token): self
    {
        $this->tkn_token = $tkn_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefresh_token(): string
    {
        return $this->tkn_refresh_token;
    }

    /**
     * @param string $tkn_refresh_token
     * @return self
     */
    public function setRefresh_token(string $tkn_refresh_token): self
    {
        $this->tkn_refresh_token = $tkn_refresh_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpired_at(): string
    {
        return $this->tkn_expired_at;
    }

    /**
     * @param string $tkn_expired_at
     * @return self
     */
    public function setExpired_at(string $tkn_expired_at): self
    {
        $this->tkn_expired_at = $tkn_expired_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getUsuarios_id(): int
    {
        return $this->tkn_usr_id;
    }

    /**
     * @param int $tkn_usr_id
     * @return self
     */
    public function setUsuarios_id(int $tkn_usr_id): self
    {
        $this->tkn_usr_id = $tkn_usr_id;
        return $this;
    }
}
