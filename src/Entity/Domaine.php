<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomaineRepository")
 */
class Domaine
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
     * @ORM\OneToMany(targetEntity="App\Entity\Critere", mappedBy="foCritere")
     */
    private $foDomaine;

    public function __construct()
    {
        $this->foDomaine = new ArrayCollection();
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

    /**
     * @return Collection|Critere[]
     */
    public function getFoDomaine(): Collection
    {
        return $this->foDomaine;
    }

    public function addFoDomaine(Critere $foDomaine): self
    {
        if (!$this->foDomaine->contains($foDomaine)) {
            $this->foDomaine[] = $foDomaine;
            $foDomaine->setFoCritere($this);
        }

        return $this;
    }

    public function removeFoDomaine(Critere $foDomaine): self
    {
        if ($this->foDomaine->contains($foDomaine)) {
            $this->foDomaine->removeElement($foDomaine);
            // set the owning side to null (unless already changed)
            if ($foDomaine->getFoCritere() === $this) {
                $foDomaine->setFoCritere(null);
            }
        }

        return $this;
    }

}
