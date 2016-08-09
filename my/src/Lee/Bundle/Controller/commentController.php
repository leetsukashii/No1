<?php
namespace Lee\Bundle\Controller;

use Lee\Bundle\Entity\comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Created by PhpStorm.
 * User: lee
 * Date: 2016/8/3
 * Time: 19:31
 */
class commentController extends Controller{
    /**
     * @Route("/comment", name = "comment")
     */
    public function commentAction(){
        $em = $this->getDoctrine()->getManager();
        $dql = "select comment from LeeBundle:comment comment order by comment.createAt DESC";
        $query = $em->createQuery($dql)
            ->setMaxResults(5);

        $comments = $query->getResult();

        return $this->render('LeeBundle:Sites:comment.html.twig', array(
            'comments'=>$comments
        ));
    }
    /**
     * @Route("/comment/w", name = "wcomment")
     */
    public function wcommentAction(){
        $wcomment = $_REQUEST['comment'];
        $wdatetime = new \DateTime('now', timezone_open('Asia/Shanghai'));
        $comment = new comment();
        $comment -> setComment($wcomment);
        $comment ->setCreateAt($wdatetime);
        $em = $this->getDoctrine()->getManager();
        $em -> persist($comment);
        $em -> flush();

        $swdatetime = serialize($wdatetime);
        $datetime = substr($swdatetime, 35, 19);

        $data = array(
            'c'=>$wcomment,
            'd'=>$datetime,
        );


        return new Response(json_encode($data));
    }
}
//class data {
//    public $c;
//    public function setc($c){
//        $this->c = $c;
//    }
//    public $d;
//    public function setd($d){
//        $this->d = $d;
//    }
//}