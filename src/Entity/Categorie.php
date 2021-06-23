<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $retraite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cdi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cdd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRetraite(): ?int
    {
        return $this->retraite;
    }

    public function setRetraite(int $retraite): self
    {
        $this->retraite = $retraite;

        return $this;
    }

    public function getCdi(): ?int
    {
        return $this->cdi;
    }

    public function setCdi(int $cdi): self
    {
        $this->cdi = $cdi;

        return $this;
    }

    public function getCdd(): ?int
    {
        return $this->cdd;
    }

    public function setCdd(int $cdd): self
    {
        $this->cdd = $cdd;

        return $this;
    }

}
