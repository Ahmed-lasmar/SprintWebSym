<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offreemploi
 *
 * @ORM\Table(name="offreemploi")
 * @ORM\Entity
 */
class Offreemploi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="nomOffre", type="string", length=50, nullable=false)
     */
    private $nomoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="string", length=50, nullable=false)
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=50, nullable=false)
     */
    private $picture;

    public function getIdOffre(): ?int
    {
        return $this->idOffre;
    }

    public function getNomoffre(): ?string
    {
        return $this->nomoffre;
    }

    public function setNomoffre(string $nomoffre): self
    {
        $this->nomoffre = $nomoffre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(string $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }


}
