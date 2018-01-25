<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\EmployeeTwo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       $EmployeeTwo = $this->getDoctrine()
       ->getRepository('AppBundle:EmployeeTwo')
       ->findAll();
        return $this->render('default/main.html.twig',array('employeeinfo'=>$EmployeeTwo));
    }

    
    /**
     * @Route("view")
     */

    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            // If you use PHP 5.3 or 5.4 you must use
            // ->add('task', 'Symfony\Component\Form\Extension\Core\Type\TextType')
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

      /**
     * @Route("view2", name="myinsert")
     */
    public function newsAction(Request $request)
{
    // just setup a fresh $task object (remove the dummy data)
    $EmployeeTwo = new EmployeeTwo();

    $form = $this->createFormBuilder($EmployeeTwo)
        ->add('lastName', TextType::class)
        ->add('firtsName', TextType::class)
        ->add('middleName', TextType::class)
        ->add('birthDate', TextType::class)
        ->add('address', TextType::class)
        ->add('telNumber', TextType::class)
        ->add('gender', TextType::class)
        ->add('dateEmployed', TextType::class)
        ->add('salary', TextType::class)

        ->add('save', SubmitType::class, array('label' => 'submit'))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $ln = $form['lastName']->getData();
        $fn = $form['firtsName']->getData();
        $mn = $form['middleName']->getData();
        $bd = $form['birthDate']->getData();
        $ad = $form['address']->getData();
        $tn = $form['telNumber']->getData();
        $ge = $form['gender']->getData();
        $de = $form['dateEmployed']->getData();
        $sa = $form['salary']->getData();

        $EmployeeTwo->setLastName($ln);
        $EmployeeTwo->setFirtsName($fn);
        $EmployeeTwo->setMiddleName($mn);
        $EmployeeTwo->setBirthDate($bd);
        $EmployeeTwo->setAddress($ad);
        $EmployeeTwo->setTelNumber($tn);
        $EmployeeTwo->setGender($ge);
        $EmployeeTwo->setDateEmployed($de);
        $EmployeeTwo->setSalary($sa);

        $em = $this->getDoctrine()->getManager();
        $em->persist($EmployeeTwo);
        $em->flush();

        $EmployeeTwo = $form->getData();


        return $this->redirectToRoute('myinsert');
    }

    return $this->render('default/new.html.twig', array(
        'form' => $form->createView(),
    ));
}
    
    /**
    *@Route("/post/delete/{id}", name="delete_post_route")
    */

    public function deletePostAction($id){

        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:EmployeeTwo')->find($id);
        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute('homepage');
    }
    
    /**
    *@Route("/post/views/{id}", name="views_post_route")
    */

    public function viewPostAction($id){

        echo $id;
        exit();

        return true;
    }
    /**
    *@Route("/lucky/number")
    */

    public function indexsAction()
{

    return $this->render('/lucky/bases.html.twig');
}
    
}