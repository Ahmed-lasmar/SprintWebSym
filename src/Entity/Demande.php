<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="Id_Per", columns={"Id_Per"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_dem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDem;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Per", type="integer", nullable=false)
     */
    private $idPer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_depot", type="date", nullable=false)
     */
    private $dateDepot;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_demande", type="string", length=255, nullable=false)
     */
    private $typeDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_demande", type="string", length=255, nullable=false)
     */
    private $etatDemande;

    public function getIdDem(): ?int
    {
        return $this->idDem;
    }

    public function getIdPer(): ?int
    {
        return $this->idPer;
    }

    public function setIdPer(int $idPer): self
    {
        $this->idPer = $idPer;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getTypeDemande(): ?string
    {
        return $this->typeDemande;
    }

    public function setTypeDemande(string $typeDemande): self
    {
        $this->typeDemande = $typeDemande;

        return $this;
    }

    public function getEtatDemande(): ?string
    {
        return $this->etatDemande;
    }

    public function setEtatDemande(string $etatDemande): self
    {
        $this->etatDemande = $etatDemande;

        return $this;
    }


}
