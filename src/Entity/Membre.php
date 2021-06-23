<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaiss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantCotisation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAdhesion;

    /**
     * @ORM\OneToOne(targetEntity=Categorie::class, cascade={"persist", "remove"})
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Cotisation::class, mappedBy="membre")
     */
    private $cotisations;

    /**
     * @ORM\OneToMany(targetEntity=Aide::class, mappedBy="membre")
     */
    private $aides;

    /**
     * @ORM\OneToMany(targetEntity=Prets::class, mappedBy="relation")
     */
    private $prets;

    /**
     * @ORM\OneToMany(targetEntity=Remboursement::class, mappedBy="membre")
     */
    private $remboursements;

    public function __construct()
    {
        $this->cotisations = new ArrayCollection();
        $this->aides = new ArrayCollection();
        $this->prets = new ArrayCollection();
        $this->remboursements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDatenaiss(): ?\DateTimeInterface
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(\DateTimeInterface $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

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

    public function getMontantCotisation(): ?int
    {
        return $this->montantCotisation;
    }

    public function setMontantCotisation(int $montantCotisation): self
    {
        $this->montantCotisation = $montantCotisation;

        return $this;
    }

    public function getDateAdhesion(): ?\DateTimeInterface
    {
        return $this->dateAdhesion;
    }

    public function setDateAdhesion(\DateTimeInterface $dateAdhesion): self
    {
        $this->dateAdhesion = $dateAdhesion;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Cotisation[]
     */
    public function getCotisations(): Collection
    {
        return $this->cotisations;
    }

    public function addCotisation(Cotisation $cotisation): self
    {
        if (!$this->cotisations->contains($cotisation)) {
            $this->cotisations[] = $cotisation;
            $cotisation->setMembre($this);
        }

        return $this;
    }

    public function removeCotisation(Cotisation $cotisation): self
    {
        if ($this->cotisations->removeElement($cotisation)) {
            // set the owning side to null (unless already changed)
            if ($cotisation->getMembre() === $this) {
                $cotisation->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Aide[]
     */
    public function getAides(): Collection
    {
        return $this->aides;
    }

    public function addAide(Aide $aide): self
    {
        if (!$this->aides->contains($aide)) {
            $this->aides[] = $aide;
            $aide->setMembre($this);
        }

        return $this;
    }

    public function removeAide(Aide $aide): self
    {
        if ($this->aides->removeElement($aide)) {
            // set the owning side to null (unless already changed)
            if ($aide->getMembre() === $this) {
                $aide->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Prets[]
     */
    public function getPrets(): Collection
    {
        return $this->prets;
    }

    public function addPret(Prets $pret): self
    {
        if (!$this->prets->contains($pret)) {
            $this->prets[] = $pret;
            $pret->setMembre($this);
        }

        return $this;
    }

    public function removePret(Prets $pret): self
    {
        if ($this->prets->removeElement($pret)) {
            // set the owning side to null (unless already changed)
            if ($pret->getMembre() === $this) {
                $pret->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Remboursement[]
     */
    public function getRemboursements(): Collection
    {
        return $this->remboursements;
    }

    public function addRemboursement(Remboursement $remboursement): self
    {
        if (!$this->remboursements->contains($remboursement)) {
            $this->remboursements[] = $remboursement;
            $remboursement->setMembre($this);
        }

        return $this;
    }

    public function removeRemboursement(Remboursement $remboursement): self
    {
        if ($this->remboursements->removeElement($remboursement)) {
            // set the owning side to null (unless already changed)
            if ($remboursement->getMembre() === $this) {
                $remboursement->setMembre(null);
            }
        }

        return $this;
    }
}
