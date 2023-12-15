<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Serializer\SerializerInterface;

use App\Entity\Salutation;
use App\Document\Production;

class ApiController extends AbstractController
{
    
    private $documentManager;
    private $serializer;

    public function __construct(DocumentManager $documentManager, SerializerInterface $serializer) {
        $this->documentManager = $documentManager;
        $this->serializer = $serializer;
    }

    /**
     * 
     * Récupère tous les enregistrements
     * 
     * @return Response
     * @api
     */    
    #[Route('/production', name: 'energie_all', methods:['GET'])] #tout afficher
    public function all(): Response
    {
        $production = $this->documentManager->getRepository(Production::class)->findAll();

        if ($production) {
            return $this->json($production);
        } else {
            return $this->json(["error" => "Not found"], 404);
        }
    }

    #[Route('/production/{id}', name: 'prod_id', methods:['GET'])] #afficher un seul par Id
    public function getById($id): Response {
        $production = $this->documentManager->getRepository(Production::class)->find($id);  
        
        if ($production) {
            return $this->json($production);
        } else {
            return $this->json(["error" => "Production was not found by id:" . $id], 404);
        }
    }

        
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        dd($this->documentManager);

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api2', name: 'app_api2', methods:['GET'])]
    public function index2(): Response
    {
     $id = '657b7e76627aa8242e343500';

        $station = $this->documentManager->getRepository(Production::class)->find($id);

        return $this->json($station);
    }



    /**
     * @param Request $request
     * @return Response
     */

    /*
    private $documentManager;
    public function __construct(DocumentManager $documentManager) {
        $this->documentManager = $documentManager;
    }*/
     #[Route('/hello', name: 'hello', methods:['GET'])]
     public function sayHello(Request $request): Response
     {
        $name = $request->get('name') ?? 'Symfony';
        $data = Salutation::of('Hello '.$name);
        # return new JsonResponse($data, 200, [], true);
        return $this->json($data);
     }
    
}