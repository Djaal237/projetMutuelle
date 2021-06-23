<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
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
    private $nature;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\OneToOne(targetEntity=Aide::class, mappedBy="evenement", cascade={"persist", "remove"})
     */
    private $aide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getAide(): ?Aide
    {
        return $this->aide;
    }

    public function setAide(?Aide $aide): self
    {
        // unset the owning side of the relation if necessary
        if ($aide === null && $this->aide !== null) {
            $this->aide->setEvenement(null);
        }

        // set the owning side of the relation if necessary
        if ($aide !== null && $aide->getEvenement() !== $this) {
            $aide->setEvenement($this);
        }

        $this->aide = $aide;

        return $this;
    }
}
