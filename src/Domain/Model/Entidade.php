<?php

namespace SISterna\Pdo\Domain\Model;

class Entidade
{
    private ?int $id;
    private string $nomeFantasia;
    private string $cnpj;
    private string $endereco;
    private int $telefone;
   public function __construct(?int $id, string $nomeFantasia, string $cnpj, string $endereco, int $telefone)
    {
        $this->id = $id;
        $this->nomeFantasia = $nomeFantasia;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nomeFantasia(): string
    {
        return $this->nomeFantasia;
    }

    public function cnpj(): string
    {
        return $this->cnpj;
    }
    public function endereco(): string
    {
        return $this->endereco;
    }
    public function telefone(): int
    {
        return $this->telefone;
    }
}
