<?php
namespace Lee\Bundle\Controller;

use Lee\Bundle\Entity\user;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Lee\Bundle\Entity\blog;

class blogController extends Controller{
    /**
     * @Route("/blog", name = "blog")
     */
    public function blogAction(){
        return $this->render('LeeBundle:Sites:blog.html.twig');
    }
}
?>