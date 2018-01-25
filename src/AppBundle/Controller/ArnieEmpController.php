<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArnieEmp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Arnieemp controller.
 *
 * @Route("arnieemp")
 */
class ArnieEmpController extends Controller
{
    /**
     * Lists all arnieEmp entities.
     *
     * @Route("/", name="arnieemp_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $arnieEmps = $em->getRepository('AppBundle:ArnieEmp')->findAll();

        return $this->render('arnieemp/index.html.twig', array(
            'arnieEmps' => $arnieEmps,
        ));
    }

    /**
     * Creates a new arnieEmp entity.
     *
     * @Route("/new", name="arnieemp_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $arnieEmp = new Arnieemp();
        $form = $this->createForm('AppBundle\Form\ArnieEmpType', $arnieEmp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($arnieEmp);
            $em->flush();

            return $this->redirectToRoute('arnieemp_show', array('id' => $arnieEmp->getId()));
        }

        return $this->render('arnieemp/new.html.twig', array(
            'arnieEmp' => $arnieEmp,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a arnieEmp entity.
     *
     * @Route("/{id}", name="arnieemp_show")
     * @Method("GET")
     */
    public function showAction(ArnieEmp $arnieEmp)
    {
        $deleteForm = $this->createDeleteForm($arnieEmp);

        return $this->render('arnieemp/show.html.twig', array(
            'arnieEmp' => $arnieEmp,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing arnieEmp entity.
     *
     * @Route("/{id}/edit", name="arnieemp_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ArnieEmp $arnieEmp)
    {
        $deleteForm = $this->createDeleteForm($arnieEmp);
        $editForm = $this->createForm('AppBundle\Form\ArnieEmpType', $arnieEmp);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('arnieemp_edit', array('id' => $arnieEmp->getId()));
        }

        return $this->render('arnieemp/edit.html.twig', array(
            'arnieEmp' => $arnieEmp,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a arnieEmp entity.
     *
     * @Route("/{id}", name="arnieemp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ArnieEmp $arnieEmp)
    {
        $form = $this->createDeleteForm($arnieEmp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($arnieEmp);
            $em->flush();
        }

        return $this->redirectToRoute('arnieemp_index');
    }

    /**
     * Creates a form to delete a arnieEmp entity.
     *
     * @param ArnieEmp $arnieEmp The arnieEmp entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ArnieEmp $arnieEmp)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arnieemp_delete', array('id' => $arnieEmp->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
