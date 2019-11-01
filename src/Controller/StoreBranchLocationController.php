<?php

namespace App\Controller;

use App\Entity\StoreBranchLocation;
use App\Form\StoreBranchLocationType;
use App\Repository\StoreBranchLocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StoreBranchLocationController
 *
 * @package App\Controller
 */
class StoreBranchLocationController extends AbstractController
{
    /**
     * @Route("/", name="store_branch_location_index", methods={"GET"})
     */
    public function index(StoreBranchLocationRepository $storeBranchLocationRepository): Response
    {
        return $this->render('store_branch_location/index.html.twig', [
            'store_branch_locations' => $storeBranchLocationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="store_branch_location_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $storeBranchLocation = new StoreBranchLocation();
        $form = $this->createForm(StoreBranchLocationType::class, $storeBranchLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($storeBranchLocation);
            $entityManager->flush();

            return $this->redirectToRoute('store_branch_location_index');
        }

        return $this->render('store_branch_location/new.html.twig', [
            'store_branch_location' => $storeBranchLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="store_branch_location_show", methods={"GET"})
     */
    public function show(StoreBranchLocation $storeBranchLocation): Response
    {
        return $this->render('store_branch_location/show.html.twig', [
            'store_branch_location' => $storeBranchLocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="store_branch_location_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StoreBranchLocation $storeBranchLocation): Response
    {
        $form = $this->createForm(StoreBranchLocationType::class, $storeBranchLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('store_branch_location_index');
        }

        return $this->render('store_branch_location/edit.html.twig', [
            'store_branch_location' => $storeBranchLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="store_branch_location_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StoreBranchLocation $storeBranchLocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$storeBranchLocation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($storeBranchLocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('store_branch_location_index');
    }
}
