<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CritereRepository")
 */
class Critere
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
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $type_value;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personne", mappedBy="idPerson")
     */
    private $idCritere;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Domaine", inversedBy="foDomaine")
     */
    private $foCritere;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ValCritere", mappedBy="idValCri")
     */
    private $idCri;


    public function __construct()
    {
        $this->idCritere = new ArrayCollection();
        $this->idCri = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getTypeValue(): ?bool
    {
        return $this->type_value;
    }

    public function setTypeValue(bool $type_value): self
    {
        $this->type_value = $type_value;

        return $this;
    }

    /**
     * @return Collection|Personne[]
     */
    public function getIdCritere(): Collection
    {
        return $this->idCritere;
    }

    public function addIdCritere(Personne $idCritere): self
    {
        if (!$this->idCritere->contains($idCritere)) {
            $this->idCritere[] = $idCritere;
            $idCritere->addIdPerson($this);
        }

        return $this;
    }

    public function removeIdCritere(Personne $idCritere): self
    {
        if ($this->idCritere->contains($idCritere)) {
            $this->idCritere->removeElement($idCritere);
            $idCritere->removeIdPerson($this);
        }

        return $this;
    }

    public function getFoCritere(): ?Domaine
    {
        return $this->foCritere;
    }

    public function setFoCritere(?Domaine $foCritere): self
    {
        $this->foCritere = $foCritere;

        return $this;
    }

    /**
     * @return Collection|ValCritere[]
     */
    public function getIdCri(): Collection
    {
        return $this->idCri;
    }

    public function addIdCri(ValCritere $idCri): self
    {
        if (!$this->idCri->contains($idCri)) {
            $this->idCri[] = $idCri;
            $idCri->setIdValCri($this);
        }

        return $this;
    }

    public function removeIdCri(ValCritere $idCri): self
    {
        if ($this->idCri->contains($idCri)) {
            $this->idCri->removeElement($idCri);
            // set the owning side to null (unless already changed)
            if ($idCri->getIdValCri() === $this) {
                $idCri->setIdValCri(null);
            }
        }

        return $this;
    }

}
