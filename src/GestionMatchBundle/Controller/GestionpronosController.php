<?php

namespace GestionMatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestionMatchBundle\Form\PronosticsType;
use GestionMatchBundle\Entity\Pronostics;
use Symfony\Component\HttpFoundation\Request;
use GestionMatchBundle\Repository\PronosticsRepository;

class GestionpronosController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutPronoAction(Request $request)
    {
        $m = new Pronostics();
        $form = $this->createForm(PronosticsType::class, $m);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
        }
        return $this->render('@GestionMatch/Admin/AjouterProno.html.twig',array('form'=>$form->createView()));
    }

    public function  GoToAffichePronoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        return $this->render('@GestionMatch/Admin/Affichepronos.html.twig', array('m' => $model));

    }

    public function GoToModifierPronoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->find($request->get('id'));
        $form=$this->createForm(PronosticsType::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('affiche_prono');
        }
        return $this->render('@GestionMatch/Admin/ModifierPronos.html.twig',array('form'=>$form->createView()
        ));

    }

    public function  GoToCartAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$model = $em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        return $this->render('@GestionMatch/Front/cart.html.twig');

    }


    public function GoToAffichePronoClientAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $idmatch=$request->get('id');//ne5ou id match
        $model = $em->getRepository("GestionMatchBundle:Matches")->find($idmatch);//afficha 1 match selon id
        $equipea = $em->getRepository ('GestionEJBundle:Equipe')->find($model->getEquipea());
        $equipeb = $em->getRepository ('GestionEJBundle:Equipe')->find($model->getEquipeb());
        $nomequipea=$equipea->getNom();
        $nomequipeb=$equipeb->getNom();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $iduser=$user->getId(); //ne5ou el id mta3 el client

        //bch nejbed e5er pronostique fel bdd
        $model2 = $em->getRepository ('GestionMatchBundle:Pronostics')->findArray();

        /////ken el iduser, idmatch eli nzil alih andou mennou fel bdd

        //Partie 2: ajout dans la table Pronostiques
        foreach($model2 as $m2)
        {
            $id2 = $m2->getIdProno();
            $m2->setIdProno($id2+1); // Auto Increment
            $m2->getIdMatch()->setIdMatch($idmatch);
            $m2->getIdUser()->setId($iduser);
            $this->getDoctrine()->getManager()->flush();

        }


       // var_dump($idmatch);



        //Partie3: Afficher
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findAll();


        return $this->render('@GestionMatch/Front/parier.html.twig', array('m' => $model,'nomeqa'=>$nomequipea,'nomeqb' => $nomequipeb));
    }





    public function AjouterpronoclientAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $choix=$request->get('choix');
        //$model = $em->getRepository ('GestionMatchBundle:Pronostics')->findBy($choix);

        $session = $this->get('session');
        $session->start();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id=$user->getId();

        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findBy(array('idUser' => $id));
        foreach($model as $m2)
        {
            $m2->setChoixutilisateur($choix);
            $this->getDoctrine()->getManager()->flush();

        }



        $em->flush();

        /*
         var_dump($choix);
         die;
         //$model = $em->getRepository ('GestionMatchBundle:Pronostics')->find($request->get('id'));



        // $model->setIdProno($id);



 */        return $this->render('@GestionMatch/Front/Message.html.twig');
    }


    public  function AffichermespronostiquesAction (Request $request)
    {
        $session = $this->get('session');
        $session->start();
       // $user->getUser();
        $id=$session->getId();
        // ici probleme recuperation id ***********************************************
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id=$user->getId();
        var_dump($id);
        //die();*/
        $em = $this->getDoctrine()->getManager();
        //$id=$request->get('id');
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findBy(array('idUser' => $id));

        return $this->render('@GestionMatch/Front/listedespronostiquesclient.html.twig', array('m' => $model));

    }

    public  function PronostiquesValideAction (Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //flush mise a jour
        $user = $em->getRepository("MyAppUserBundle:User")->find($request->get('idU'));//afficha 1 user selon id
        $idp=$request->get('idP');
        $prono = $em->getRepository("GestionMatchBundle:Pronostics")->findBy(array('idProno' => $idp));

        $x="valide";
        foreach($prono as $p)
        {

            $p->setStautParis($x);
            $this->getDoctrine()->getManager()->flush();
        }

/////////////////////////////////////taw narja3lek//////////////////////////
        $solde=$user->getSoldes();
        $user->setSoldes($solde+3);
        $this->getDoctrine()->getManager()->flush();


        return $this->redirectToRoute('affiche_prono');


    }

    public  function PronostiquesNonValideAction (Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //flush mise a jour
        $user = $em->getRepository("MyAppUserBundle:User")->find($request->get('idU'));//afficha 1 user selon id
        $idp=$request->get('idP');
        $prono = $em->getRepository("GestionMatchBundle:Pronostics")->findBy(array('idProno' => $idp));

        $x="Perdu";
        foreach($prono as $p)
        {

            $p->setStautParis($x);
            $this->getDoctrine()->getManager()->flush();
        }

        $solde=$user->getSoldes();
        $user->setSoldes($solde-3);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('affiche_prono');

    }

    /* public function addToCartAction ($id,$choix)
    {
        $session= $this->get('session');

        if (!$session->has('paris')) $session->set('paris',array());
        $paris=$session->get('paris');
        if(array_key_exists($id,$choix)){


     //   $paris[$id]=$paris[$id]*$cote;
        }else $paris[$id]=$choix;

        $session->set('paris',$paris);
        var_dump($session->get('paris'));
        //$session->remove('paris');
        die();
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        if (!$session->has('paris')) $session->GestionMatchBundle('paris',array());

        return $this->render('@GestionMatch/Front/cart.html.twig',array('p'=>$am,'paris'=>$session->get('paris')));
    }

    public function cartAction()
    {

        $session= $this->get('session');
        if (!$session->has('paris')) $session->set('paris',array());

        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository('GestionMatchBundle:Pronostics')->findArray(array_keys($session->get('paris')));
var_dump($produits);
die();
        return $this->render('@GestionMatch/Front/cart.html.twig',array('produits'=>$produits,
            'paris'=>$session->get('paris')));
    }

    public function AfficheDetailsAction($id)

    {
        $em = $this->getDoctrine()->getManager();
        $prod = $em->getRepository("GestionMatchBundle:Pronostics")->find($id);
        return $this->render('@GestionMatchBundle/Front/cart.html.twig',array(
            'p'=>$prod
        ));

    }*/



    }
