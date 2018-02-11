<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 08/02/2018
 * Time: 22:11
 */

namespace GestionEJBundle\Controller;


use GestionEJBundle\Entity\Joueur;
use GestionEJBundle\Form\AjoutEquipe;
use GestionEJBundle\Form\AjoutJoueur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class JoueurController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutJoueurAction(Request $request)
    {
        $m=new Joueur();
        $form=$this->createForm(AjoutJoueur::class,$m);
        $form->handleRequest($request);
        if ($form->isValid())
        {

            $file1 = $m->getImagejoueur1();
            $file2 = $m->getImagejoueur2();
            $file3 = $m->getImagejoueur3();
            $fileName = $m->getNom().$m->getPrenom().'1'.'.'.$file1->guessExtension();
            $file1->move(
                $this->getParameter('Joueurs_directory'),
                $fileName
            );
            $fileName2 = $m->getNom().$m->getPrenom().'2'.'.'.$file2->guessExtension();
            $file2->move(
                $this->getParameter('Joueurs_directory'),
                $fileName2
            );
            $fileName3 = $m->getNom().$m->getPrenom().'3'.$file3->guessExtension();
            $file3->move(
                $this->getParameter('Joueurs_directory'),
                $fileName3
            );
            $m->setImagejoueur1($fileName);
            $m->setImagejoueur2($fileName2);
            $m->setImagejoueur3($fileName3);
            $em = $this->getDoctrine()->getManager();

            $em->persist($m);
            $em->flush();

        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterjoueur.html.twig',array('form'=>$form->createView()));

    }
    public function GoToAfficheJoueurAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->findAll();
        return $this->render('@GestionEJ/TemplateAdmin/afficherJoueurs.html.twig', array('m' => $model));
    }
    public function GoToSuppJoueurAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('AfficheJoueur');
    }
    public function GoToModifJoueurAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->find($request->get('id'));
        $form=$this->createForm(AjoutJoueur::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('AfficheJoueur');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifJoueurs.html.twig',array('m'=>$model,'form'=>$form->createView()
        ,'id'=>$request->get('id')));

    }
}