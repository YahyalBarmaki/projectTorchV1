<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AccountType", inversedBy="client", cascade={"persist", "remove"})
     */
    private $idclien;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Campagnie", inversedBy="client", cascade={"persist", "remove"})
     */
    private $idClienCamp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEntrepr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomClien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_CLIENT';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getIdclien(): ?AccountType
    {
        return $this->idclien;
    }

    public function setIdclien(?AccountType $idclien): self
    {
        $this->idclien = $idclien;

        return $this;
    }

    public function getIdClienCamp(): ?Campagnie
    {
        return $this->idClienCamp;
    }

    public function setIdClienCamp(?Campagnie $idClienCamp): self
    {
        $this->idClienCamp = $idClienCamp;

        return $this;
    }

    public function getNomEntrepr(): ?string
    {
        return $this->nomEntrepr;
    }

    public function setNomEntrepr(string $nomEntrepr): self
    {
        $this->nomEntrepr = $nomEntrepr;

        return $this;
    }

    public function getNomClien(): ?string
    {
        return $this->nomClien;
    }

    public function setNomClien(string $nomClien): self
    {
        $this->nomClien = $nomClien;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }
}
