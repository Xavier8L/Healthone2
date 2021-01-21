<?php

namespace App\Entity;

use App\Repository\PatientenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientenRepository::class)
 */
class Patienten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="date")
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefoonummer;

    /**
     * @ORM\Column(type="integer")
     */
    private $verzekeringsnummer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aandoeningen;

    /**
     * @ORM\OneToMany(targetEntity=Recepten::class, mappedBy="patient")
     */
    private $receptens;

    public function __construct()
    {
        $this->receptens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getGeboortedatum(): ?\DateTimeInterface
    {
        return $this->geboortedatum;
    }

    public function setGeboortedatum(\DateTimeInterface $geboortedatum): self
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefoonummer(): ?int
    {
        return $this->telefoonummer;
    }

    public function setTelefoonummer(int $telefoonummer): self
    {
        $this->telefoonummer = $telefoonummer;

        return $this;
    }

    public function getVerzekeringsnummer(): ?int
    {
        return $this->verzekeringsnummer;
    }

    public function setVerzekeringsnummer(int $verzekeringsnummer): self
    {
        $this->verzekeringsnummer = $verzekeringsnummer;

        return $this;
    }

    public function getAandoeningen(): ?string
    {
        return $this->aandoeningen;
    }

    public function setAandoeningen(?string $aandoeningen): self
    {
        $this->aandoeningen = $aandoeningen;

        return $this;
    }

    /**
     * @return Collection|Recepten[]
     */
    public function getReceptens(): Collection
    {
        return $this->receptens;
    }

    public function addRecepten(Recepten $recepten): self
    {
        if (!$this->receptens->contains($recepten)) {
            $this->receptens[] = $recepten;
            $recepten->setPatient($this);
        }

        return $this;
    }

    public function removeRecepten(Recepten $recepten): self
    {
        if ($this->receptens->removeElement($recepten)) {
            // set the owning side to null (unless already changed)
            if ($recepten->getPatient() === $this) {
                $recepten->setPatient(null);
            }
        }

        return $this;
    }
}
