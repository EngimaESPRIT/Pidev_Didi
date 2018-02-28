<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 05/02/2018
 * Time: 23:08
 */
namespace GestionEJBundle\Controller;
use GestionEJBundle\Entity\Equipe;
use GestionEJBundle\Form\AjoutEquipe;
use Symfony\Component\HttpFoundation\Request;

class LiensController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{

    public function GoToPlayersAction()
    {
        return $this->render('@GestionEJ/template 2/players.html.twig');

    }
    public function GoToAdminAction()
    {
        $user=$this->getUser();

        if (isset($user)) {
            return $this->render('@GestionEJ/TemplateAdmin/index.html.twig');
        }
        else{
            return $this->render('GestionEJBundle:template 2:page-404.html.twig');

        }

    }
    public function erreurAction()
    {
        return $this->render('GestionEJBundle:template 2:page-404.html.twig');
    }
    public function GoToFixturesAction()
{
    return $this->render('@GestionEJ/template 2/fixtures.html.twig');
}
    public function GoToGroupesAction()
    {
        return $this->render('@GestionEJ/template 2/groups.html.twig');
    }
    public function GoToContactAction()
    {
        return $this->render('@GestionEJ/template 2/contact.html.twig');
    }

}