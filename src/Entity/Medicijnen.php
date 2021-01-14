<?php

namespace App\Entity;

use App\Repository\MedicijnenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicijnenRepository::class)
 */
class Medicijnen
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
     * @ORM\Column(type="text")
     */
    private $werking;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bijwerking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verzekerd;

    /**
     * @ORM\Column(type="integer")
     */
    private $prijs;

    /**
     * @ORM\OneToMany(targetEntity=Recepten::class, mappedBy="medicijn")
     */
    private $recepts;

    public function __construct()
    {
        $this->recepts = new ArrayCollection();
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

    public function getWerking(): ?string
    {
        return $this->werking;
    }

    public function setWerking(?string $werking): self
    {
        $this->werking = $werking;

        return $this;
    }

    public function getBijwerking(): ?string
    {
        return $this->bijwerking;
    }

    public function setBijwerking(?string $bijwerking): self
    {
        $this->bijwerking = $bijwerking;

        return $this;
    }

    public function getVerzekerd(): ?bool
    {
        return $this->verzekerd;
    }

    public function setVerzekerd(int $verzekerd): self
    {
        $this->verzekerd = $verzekerd;

        return $this;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(?int $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * @return Collection|Recepten[]
     */
    public function getRecepts(): Collection
    {
        return $this->recepts;
    }

    public function addRecept(Recepten $recept): self
    {
        if (!$this->recepts->contains($recept)) {
            $this->recepts[] = $recept;
            $recept->setMedicijn($this);
        }

        return $this;
    }

    public function removeRecept(Recepten $recept): self
    {
        if ($this->recepts->removeElement($recept)) {
            // set the owning side to null (unless already changed)
            if ($recept->getMedicijn() === $this) {
                $recept->setMedicijn(null);
            }
        }

        return $this;
    }
}
