<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignedecommande
 *
 * @ORM\Table(name="lignedecommande", indexes={@ORM\Index(name="fk_commande", columns={"commande"}), @ORM\Index(name="fk_prod", columns={"idproduit"})})
 * @ORM\Entity
 */
class Lignedecommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdLigne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idligne;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var \Commandes
     *
     * @ORM\ManyToOne(targetEntity="Commandes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="commande", referencedColumnName="id")
     * })
     */
    private $commande;

    /**
     * @var \Produits
     *
     * @ORM\ManyToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproduit", referencedColumnName="id_produit")
     * })
     */
    private $idproduit;


}

