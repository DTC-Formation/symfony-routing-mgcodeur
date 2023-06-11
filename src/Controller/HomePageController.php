<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $queries = $request->query->all();

        if($queries) {
            $result = !isValidOperator($queries['operator']) ? "Invalid Operator" : calculate(
                $queries['number_a'], 
                $queries['operator'], 
                $queries['number_b']
            );
        }

        return $this->render('home_page/index.html.twig', [
            'result' => $result ?? null,
        ]);
    }
}
