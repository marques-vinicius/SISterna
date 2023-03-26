<?php

namespace SISterna\Pdo\Domain\Model;

class Cisterna
{
    private ?int $id;
    private string $tipoConstrucao;
    private string $materiaisConstrucao;
    private string $localizacao;
    private int $entidadeMantenedora;
    private \DateTimeInterface $dataInauguracao;
    public function __construct(?int $id, string $tipoConstrucao, string $materiaisConstrucao, string $localizacao, int $entidadeMantenedora, \DateTimeInterface $dataInauguracao)
    {
        $this->id = $id;
        $this->tipoConstrucao = $tipoConstrucao;
        $this->materiaisConstrucao = $materiaisConstrucao;
        $this->localizacao = $localizacao;
        $this->entidadeMantenedora = $entidadeMantenedora;
        $this->dataInauguracao = $dataInauguracao;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function tipoConstrucao(): string
    {
        return $this->tipoConstrucao;
    }

    public function materiaisConstrucao(): string
    {
        return $this->materiaisConstrucao;
    }
    public function localizacao(): string
    {
        return $this->localizacao;
    }
    public function entidadeMantenedora(): int
    {
        return $this->entidadeMantenedora;
    }
    public function dataInauguracao(): \DateTimeInterface
    {
        return $this->dataInauguracao;
    }

}
