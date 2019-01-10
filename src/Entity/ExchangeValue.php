<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExchangeValueRepository")
 */
class ExchangeValue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=6)
     */
    private $eur;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=6)
     */
    private $usd;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=6)
     */
    private $gbp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEur()
    {
        return $this->eur;
    }

    public function setEur($eur): self
    {
        $this->eur = $eur;

        return $this;
    }

    public function getUsd()
    {
        return $this->usd;
    }

    public function setUsd($usd): self
    {
        $this->usd = $usd;

        return $this;
    }

    public function getGbp()
    {
        return $this->gbp;
    }

    public function setGbp($gbp): self
    {
        $this->gbp = $gbp;

        return $this;
    }

}
