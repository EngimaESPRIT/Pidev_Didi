<?php

namespace GestionMatchBundle\Controller;

use GestionMatchBundle\Form\GroupeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestionMatchBundle\Form\MatchesType;
use GestionMatchBundle\Entity\Groupe;
use Symfony\Component\HttpFoundation\Request;


class GestionGroupeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAfficheGroupesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $EQA = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'A'));
        $EQB = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'B'));
        $EQC = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'C'));
        $EQD = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'D'));
        $EQE = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'E'));
        $EQF = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'F'));
        $EQG = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'G'));
        $EQH = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe'=>'H'));



        return $this->render('@GestionMatch/Admin/AfficherGroupe.html.twig', array('GA' => $EQA,'GB' => $EQB,'GC' => $EQC,'GD' => $EQD,'GE' => $EQE,'GF' => $EQF,'GG' => $EQG,'GH' => $EQH));

    }

    public function GoToAfficheGroupesFrontAction()
    {
        $em = $this->getDoctrine()->getManager();
        $EQA = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'A'));
        $EQB = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'B'));
        $EQC = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'C'));
        $EQD = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'D'));
        $EQE = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'E'));
        $EQF = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'F'));
        $EQG = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'G'));
        $EQH = $em->getRepository("GestionEJBundle:Equipe")->findBy(array('groupe' => 'H'));

        return $this->render('@GestionMatch/Front/affichegroupes.html.twig', array('GA' => $EQA, 'GB' => $EQB, 'GC' => $EQC, 'GD' => $EQD, 'GE' => $EQE, 'GF' => $EQF, 'GG' => $EQG, 'GH' => $EQH));

    }

  /*  public function GoToModifGroupeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Groupe")->find($request->get('id'));
        $form=$this->createForm(GroupeType::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('affiche_groupe');
        }
        return $this->render('@GestionMatch/Admin/ModifGroupe.html.twig',array('form'=>$form->createView()
        ));

    }*/
}
