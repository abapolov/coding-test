<?php

namespace App\Controller;

use App\Entity\StoreBranchLocation;
use App\Form\StoreBranchLocationType;
use App\Repository\StoreBranchLocationRepository;
use App\Services\StoreBranchLocationService;
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
     * @var StoreBranchLocationService
     */
    private $storeBranchLocationService;

    /**
     * StoreBranchLocationController constructor.
     *
     * @param StoreBranchLocationService $storeBranchLocationService
     */
    public function __construct(StoreBranchLocationService $storeBranchLocationService)
    {
        $this->storeBranchLocationService = $storeBranchLocationService;
    }

    /**
     * @Route("/", name="store_branch_location_index", methods={"GET"})
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        return $this->render('store_branch_location/index.html.twig', [
            'store_branch_locations' => $this
                ->storeBranchLocationService
                ->getAllBranchLocations([
                    'search_word' => $request->get('search'),
                    'page'        => $request->query->getInt('page', 1)
                ]),
        ]);
    }

    /**
     * @Route("/new", name="store_branch_location_new", methods={"GET","POST"})
     * @param Request $request
     *
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function new(Request $request): Response
    {
        $storeBranchLocation = new StoreBranchLocation();
        $form                = $this
            ->createForm(StoreBranchLocationType::class, $storeBranchLocation)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this
                ->storeBranchLocationService
                ->entityHandler
                ->fullSave($storeBranchLocation);

            $this->addFlash('success', 'Store branch location is successfully created!');

            return $this->redirectToRoute('store_branch_location_index');
        }

        return $this->render('store_branch_location/new.html.twig', [
            'store_branch_location' => $storeBranchLocation,
            'form'                  => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="store_branch_location_show", methods={"GET"})
     * @param StoreBranchLocation $storeBranchLocation
     *
     * @return Response
     */
    public function show(StoreBranchLocation $storeBranchLocation): Response
    {
        return $this->render('store_branch_location/show.html.twig', [
            'store_branch_location' => $storeBranchLocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="store_branch_location_edit", methods={"GET","POST"})
     * @param Request             $request
     * @param StoreBranchLocation $storeBranchLocation
     *
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function edit(Request $request, StoreBranchLocation $storeBranchLocation): Response
    {
        $form = $this
            ->createForm(StoreBranchLocationType::class, $storeBranchLocation)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this
                ->storeBranchLocationService
                ->entityHandler
                ->flush();

            $this->addFlash('success', 'Store branch location is successfully edited!');

            return $this->redirectToRoute('store_branch_location_index');
        }

        return $this->render('store_branch_location/edit.html.twig', [
            'store_branch_location' => $storeBranchLocation,
            'form'                  => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="store_branch_location_delete", methods={"DELETE"})
     * @param Request             $request
     * @param StoreBranchLocation $storeBranchLocation
     *
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function delete(Request $request, StoreBranchLocation $storeBranchLocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$storeBranchLocation->getId(), $request->request->get('_token'))) {
            $this
                ->storeBranchLocationService
                ->entityHandler
                ->remove($storeBranchLocation);

            $this->addFlash('success', 'Store branch location is successfully deleted!');
        }

        return $this->redirectToRoute('store_branch_location_index');
    }
}
