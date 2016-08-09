<?php

namespace Lee\Bundle\Controller;

use Lee\Bundle\Entity\user;
use Lee\Bundle\Entity\blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class indexController extends Controller
{
    //        $em = $this->getDoctrine()->getManager();
//        $repository = $em->getRepository('LeeBundle:user');
//        /**
//         * @var $email \Lee\Bundle\Entity\user
//         */
//        $results = $repository->findAll();
//        $bs = [0,1,2,3,4];
//        return $this->render('LeeBundle:Sites:index.html.twig', array(
//            'results' => $results
//        ));
//    /**
//     * @Route("/user", name="user", requirements={"id"="\d+"})
//     * */

//    /**
//     * @Route("/user", name="user")
//     */
//    public function userAction(){
//        $id = $this->getRequest()->get('id');
//        $em = $this->getDoctrine()->getManager();
//        $repository = $em->getRepository('LeeBundle:user');
//    }
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $repository = $em->getRepository('LeeBundle:blog');
//        $result = $repository->find(2);
//        $r = $result->getUsername();
//        $blogs = $repository->findBy(array(), array('create_at'=>''), 5);
//        $em = $this->getDoctrine()->getManager();
        $dql = "select blog from LeeBundle:blog blog ORDER BY blog.createAt DESC";
        $query = $em->createQuery($dql)
            ->setMaxResults(5);
//
        $blogs = $query->getResult();

        return $this->render('LeeBundle:Sites:index.html.twig'
            , array(
                'blogs' => $blogs
            )
        );
    }

//一个是路由地址，一个是form里action的内容！！！
    /**
     * @Route("/signup", name = "signup")
     * @Method("POST")
     */
    public function signupAction()
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $username = $_REQUEST['username'];

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('LeeBundle:user');
        $usernameIndb = $repository->findOneBy(array('username' => $username));
        $emailIndb = $repository->findOneBy(array('email' => $email));

        if ($usernameIndb || $emailIndb) {
            return $this->redirect('LeeBundle:Sites:index.html.twig', array(
                'signupError' => '用户名或邮箱已存在！！！'
            ));
        } else {
            $user = new user();
            $user->setUsername($username);
            $user->setPassword(md5($password));
            $user->setEmail($email);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect('LeeBundle:Sites:index.html.twig');
        }
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        $request = $this->getRequest();
        $email = $request->get('email');
        $password = $request->get('password');

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('LeeBundle:user');

        $emailIndb = $repository->findOneBy(array(
            'email' => $email,
        ));
        if (!$emailIndb) {
            $error = "账号不存在=。=";
            return new Response($error);
        } else {
            $passwordIndb = $emailIndb['password'];
            if ($password != $passwordIndb) {
                $error = "对不起=。=密码错误！";
                return new Response($error);
            } else {
                $userIndb = $emailIndb['username'];
//                是否需要创建用户数组呢？
//                $user = array(
//                    'username' => $userIndb,
//                    'password' => $password,
//                );
                $request->getSession()->set('username', $userIndb);
                $request->getSession()->set('password', $passwordIndb);
                $request->cookies->add(array(
                    'username'=>$userIndb,
                    'password'=>$password,
                ));
                $success = '登录成功';
                return new Response($success);
            }
        }
//        $em = $this->getDoctrine()->getManager();
//        $repository = $em->getRepository('LeeBundle:user');
//        $userIndb = $repository->findOneBy(array('email' => $email, 'password' => $password));
//        if (!$userIndb) {
//            return $this->redirect('LeeBundle:Sites:index.html.twig', array(
//                'loginError' => '邮箱或密码错误！！'
//            ));
//        } else {
//            $this->getRequest()->getSession()->set('email', $email);
        //        这是原生PHP写法！！！
//        $email = $_REQUEST['email'];
//        $password = $_REQUEST['password'];

    }
}


