<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValCritereRepository")
 */
class ValCritere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Critere", inversedBy="idCri")
     */
    private $idValCri;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getIdValCri(): ?Critere
    {
        return $this->idValCri;
    }

    public function setIdValCri(?Critere $idValCri): self
    {
        $this->idValCri = $idValCri;

        return $this;
    }
}
