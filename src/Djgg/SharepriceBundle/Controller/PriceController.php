<?php

namespace Djgg\SharepriceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use APY\DataGridBundle\Grid\Source\Entity;
use Djgg\SharepriceBundle\Entity\Price;
use Djgg\SharepriceBundle\Form\PriceType;

/**
 * Price controller.
 *
 */
class PriceController extends Controller
{
	
	public function gridAction()
	{
	
		$source = new Entity('DjggSharepriceBundle:Price');
		$grid = $this->get('grid');
		$grid->setSource($source);
	
		// Manage the grid redirection, exports and the response of the controller
		return $grid->getGridResponse('DjggSharepriceBundle:Price:grid.html.twig');
	}
	
    /**
     * Creates a new Price entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Price();
        $form = $this->createForm(new PriceType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('djgg_shareprice_price_show', array('id' => $entity->getId())));
        }

        return $this->render('DjggSharepriceBundle:Price:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Price entity.
     *
     */
    public function newAction()
    {
        $entity = new Price();
        $form   = $this->createForm(new PriceType(), $entity);

        return $this->render('DjggSharepriceBundle:Price:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Price entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DjggSharepriceBundle:Price')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Price entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DjggSharepriceBundle:Price:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Price entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DjggSharepriceBundle:Price')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Price entity.');
        }

        $editForm = $this->createForm(new PriceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DjggSharepriceBundle:Price:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Price entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DjggSharepriceBundle:Price')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Price entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PriceType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('djgg_shareprice_price_edit', array('id' => $id)));
        }

        return $this->render('DjggSharepriceBundle:Price:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Price entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DjggSharepriceBundle:Price')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Price entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('djgg_shareprice_price'));
    }

    /**
     * Creates a form to delete a Price entity by id.
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
