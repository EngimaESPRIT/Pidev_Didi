<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 08/02/2018
 * Time: 22:11
 */

namespace GestionEJBundle\Controller;


use GestionEJBundle\Entity\Equipe;
use GestionEJBundle\Form\AjoutEquipe;
use GestionEJBundle\Form\AjoutJoueur;
use Symfony\Component\HttpFoundation\Request;

class EquipeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutEquipeAction(Request $request)
    {
        $m=new Equipe();
        $form=$this->createForm(AjoutEquipe::class,$m);
        $form->handleRequest($request);
        if ($form->isValid())
        {
$file=$m->getDrapeau();
            $fileName = $m->getNom().'Drapeau'.'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('Equipes_directory'),
                $fileName
            );
            $file1=$m->getPhotoequipe();
            $fileName1 = $m->getNom().'Equipe'.'.'.$file1->guessExtension();
            $file1->move(
                $this->getParameter('Equipes_directory'),
                $fileName1
            );
            $m->setDrapeau($fileName);
            $m->setPhotoequipe($fileName1);
            $file2=$m->getLogo();
            $fileName2 = $m->getNom().'Logo'.'.'.$file2->guessExtension();
            $file2->move(
                $this->getParameter('Equipes_directory'),
                $fileName2
            );
            $m->setLogo($fileName2);
            $em = $this->getDoctrine()->getManager();

            $em->persist($m);
            $em->flush();

        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterequipe.html.twig',array('form'=>$form->createView()));

    }
    public function GoToAfficheEquipeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->findAll();
        return $this->render('@GestionEJ/TemplateAdmin/afficherEquipes.html.twig', array('m' => $model));
    }
    public function GoToTeamsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->findAll();
        return $this->render('GestionEJBundle:template 2:teams.html.twig', array('m' => $model));


    }
    public function GoToTeamAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($request->get('id'));
        $joueurs = $em->getRepository("GestionEJBundle:Joueur")->findBy(array("idEquipe"=>$request->get('id')));
        return $this->render('GestionEJBundle:template 2:single-team.html.twig', array('m' => $model,'j'=>$joueurs));
    }
    public function GoToSuppEquipeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('AfficheEquipe');
}
    public function GoToModifEquipeAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($id);
        $form=$this->createForm(AjoutEquipe::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('AfficheEquipe');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifEquipe.html.twig',array('m'=>$model,'form'=>$form->createView()
        ));

    }
}