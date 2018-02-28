<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe", indexes={@ORM\Index(name="fk_groupes", columns={"Groupe"})})
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDEquipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idequipe;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Capital", type="string", length=255, nullable=false)
     */
    private $capital;

    /**
     * @var integer
     *
     * @ORM\Column(name="Participations", type="integer", nullable=false)
     */
    private $participations;

    /**
     * @var string
     *
     * @ORM\Column(name="Continent", type="string", length=255, nullable=false)
     */
    private $continent;

    /**
     * @var integer
     *
     * @ORM\Column(name="Victoires", type="integer", nullable=false)
     */
    private $victoires;

    /**
     * @var string
     *
     * @ORM\Column(name="Entraineur", type="string", length=255, nullable=false)
     */
    private $entraineur;

    /**
     * @var integer
     *
     * @ORM\Column(name="ClassementFifa", type="integer", nullable=false)
     */
    private $classementfifa;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchesCM", type="integer", nullable=false)
     */
    private $matchescm;

    /**
     * @var integer
     *
     * @ORM\Column(name="ButsCM", type="integer", nullable=false)
     */
    private $butscm;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchWins", type="integer", nullable=false)
     */
    private $matchwins;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchLosses", type="integer", nullable=false)
     */
    private $matchlosses;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchDraws", type="integer", nullable=false)
     */
    private $matchdraws;

    /**
     * @var string
     *
     * @ORM\Column(name="Drapeau", type="string", length=255, nullable=false)
     */
    private $drapeau;

    /**
     * @var string
     *
     * @ORM\Column(name="PhotoEquipe", type="string", length=255, nullable=false)
     */
    private $photoequipe;

    /**
     * @var string
     *
     * @ORM\Column(name="LogoFederation", type="string", length=255, nullable=false)
     */
    private $logofederation;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_points", type="integer", nullable=true)
     */
    private $nbrPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_buts", type="integer", nullable=true)
     */
    private $nbrButs;

    /**
     * @var integer
     *
     * @ORM\Column(name="matchesgagnes", type="integer", nullable=true)
     */
    private $matchesgagnes;

    /**
     * @var integer
     *
     * @ORM\Column(name="matchesperdus", type="integer", nullable=true)
     */
    private $matchesperdus;

    /**
     * @var integer
     *
     * @ORM\Column(name="matchesnulles", type="integer", nullable=true)
     */
    private $matchesnulles;

    /**
     * @var \Groupe
     *
     * @ORM\ManyToOne(targetEntity="GestionMatchBundle\Entity\Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Groupe", referencedColumnName="Nom_Groupe")
     * })
     */
    private $groupe;

    /**
     * @return int
     */
    public function getIdequipe()
    {
        return $this->idequipe;
    }

    /**
     * @param int $idequipe
     */
    public function setIdequipe($idequipe)
    {
        $this->idequipe = $idequipe;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param string $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @return int
     */
    public function getParticipations()
    {
        return $this->participations;
    }

    /**
     * @param int $participations
     */
    public function setParticipations($participations)
    {
        $this->participations = $participations;
    }

    /**
     * @return string
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * @param string $continent
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;
    }

    /**
     * @return int
     */
    public function getVictoires()
    {
        return $this->victoires;
    }

    /**
     * @param int $victoires
     */
    public function setVictoires($victoires)
    {
        $this->victoires = $victoires;
    }

    /**
     * @return string
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }

    /**
     * @param string $entraineur
     */
    public function setEntraineur($entraineur)
    {
        $this->entraineur = $entraineur;
    }

    /**
     * @return int
     */
    public function getClassementfifa()
    {
        return $this->classementfifa;
    }

    /**
     * @param int $classementfifa
     */
    public function setClassementfifa($classementfifa)
    {
        $this->classementfifa = $classementfifa;
    }

    /**
     * @return int
     */
    public function getMatchescm()
    {
        return $this->matchescm;
    }

    /**
     * @param int $matchescm
     */
    public function setMatchescm($matchescm)
    {
        $this->matchescm = $matchescm;
    }

    /**
     * @return int
     */
    public function getButscm()
    {
        return $this->butscm;
    }

    /**
     * @param int $butscm
     */
    public function setButscm($butscm)
    {
        $this->butscm = $butscm;
    }

    /**
     * @return int
     */
    public function getMatchwins()
    {
        return $this->matchwins;
    }

    /**
     * @param int $matchwins
     */
    public function setMatchwins($matchwins)
    {
        $this->matchwins = $matchwins;
    }

    /**
     * @return int
     */
    public function getMatchlosses()
    {
        return $this->matchlosses;
    }

    /**
     * @param int $matchlosses
     */
    public function setMatchlosses($matchlosses)
    {
        $this->matchlosses = $matchlosses;
    }

    /**
     * @return int
     */
    public function getMatchdraws()
    {
        return $this->matchdraws;
    }

    /**
     * @param int $matchdraws
     */
    public function setMatchdraws($matchdraws)
    {
        $this->matchdraws = $matchdraws;
    }

    /**
     * @return string
     */
    public function getDrapeau()
    {
        return $this->drapeau;
    }

    /**
     * @param string $drapeau
     */
    public function setDrapeau($drapeau)
    {
        $this->drapeau = $drapeau;
    }

    /**
     * @return string
     */
    public function getPhotoequipe()
    {
        return $this->photoequipe;
    }

    /**
     * @param string $photoequipe
     */
    public function setPhotoequipe($photoequipe)
    {
        $this->photoequipe = $photoequipe;
    }

    /**
     * @return string
     */
    public function getLogofederation()
    {
        return $this->logofederation;
    }

    /**
     * @param string $logofederation
     */
    public function setLogofederation($logofederation)
    {
        $this->logofederation = $logofederation;
    }

    /**
     * @return int
     */
    public function getNbrPoints()
    {
        return $this->nbrPoints;
    }

    /**
     * @param int $nbrPoints
     */
    public function setNbrPoints($nbrPoints)
    {
        $this->nbrPoints = $nbrPoints;
    }

    /**
     * @return int
     */
    public function getNbrButs()
    {
        return $this->nbrButs;
    }

    /**
     * @param int $nbrButs
     */
    public function setNbrButs($nbrButs)
    {
        $this->nbrButs = $nbrButs;
    }

    /**
     * @return int
     */
    public function getMatchesgagnes()
    {
        return $this->matchesgagnes;
    }

    /**
     * @param int $matchesgagnes
     */
    public function setMatchesgagnes($matchesgagnes)
    {
        $this->matchesgagnes = $matchesgagnes;
    }

    /**
     * @return int
     */
    public function getMatchesperdus()
    {
        return $this->matchesperdus;
    }

    /**
     * @param int $matchesperdus
     */
    public function setMatchesperdus($matchesperdus)
    {
        $this->matchesperdus = $matchesperdus;
    }

    /**
     * @return int
     */
    public function getMatchesnulles()
    {
        return $this->matchesnulles;
    }

    /**
     * @param int $matchesnulles
     */
    public function setMatchesnulles($matchesnulles)
    {
        $this->matchesnulles = $matchesnulles;
    }

    /**
     * @return \Groupe
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param \Groupe $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }


}

