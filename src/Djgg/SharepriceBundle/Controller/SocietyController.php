<?php

namespace Djgg\SharepriceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use APY\DataGridBundle\Grid\Source\Entity;
use Djgg\SharepriceBundle\Entity\Society;
use Djgg\SharepriceBundle\Form\SocietyType;

/**
 * Society controller.
 *
 */
class SocietyController extends Controller
{

	public function gridAction()
	{
	
		$source = new Entity('DjggSharepriceBundle:Society');
		$grid = $this->get('grid');
		$grid->setSource($source);
	
		// Manage the grid redirection, exports and the response of the controller
		return $grid->getGridResponse('DjggSharepriceBundle:Society:grid.html.twig');
	}
	
    /**
     * Creates a new Society entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Society();
        $form = $this->createForm(new SocietyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('society_show', array('id' => $entity->getId())));
        }

        return $this->render('DjggSharepriceBundle:Society:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Society entity.
     *
     */
    public function newAction()
    {
        $entity = new Society();
        $form   = $this->createForm(new SocietyType(), $entity);

        return $this->render('DjggSharepriceBundle:Society:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Society entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DjggSharepriceBundle:Society')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Society entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DjggSharepriceBundle:Society:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Society entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DjggSharepriceBundle:Society')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Society entity.');
        }

        $editForm = $this->createForm(new SocietyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DjggSharepriceBundle:Society:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Society entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DjggSharepriceBundle:Society')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Society entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SocietyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('society_edit', array('id' => $id)));
        }

        return $this->render('DjggSharepriceBundle:Society:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Society entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DjggSharepriceBundle:Society')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Society entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('society'));
    }

    /**
     * Creates a form to delete a Society entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
