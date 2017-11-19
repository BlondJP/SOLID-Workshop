<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\CsvParser;
use AppBundle\Service\ImportService;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/parse", name="parse")
     */
    public function parseAction(Request $request)
    {
        $csvParser = $this->container->get(CsvParser::class);
        $data = $csvParser->parse(); 

        return new JsonResponse($data);
    }

    /**
     * @Route("/import", name="import")
     */
    public function importAction(Request $request)
    {
        $importService = $this->container->get(ImportService::class);
        $data = $importService->import();

        return new JsonResponse($data);
    }
}
