<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formatteur
 *
 * @ORM\Table(name="formatteur")
 * @ORM\Entity
 */
class Formatteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_formatteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormatteur;

    /**
     * @var int
     *
     * @ORM\Column(name="horaire", type="integer", nullable=false)
     */
    private $horaire;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=false)
     */
    private $specialite;

    /**
     * @var string
     *
     * @ORM\Column(name="membres", type="string", length=255, nullable=false)
     */
    private $membres;

    public function getIdFormatteur(): ?int
    {
        return $this->idFormatteur;
    }

    public function getHoraire(): ?int
    {
        return $this->horaire;
    }

    public function setHoraire(int $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getMembres(): ?string
    {
        return $this->membres;
    }

    public function setMembres(string $membres): self
    {
        $this->membres = $membres;

        return $this;
    }


}
