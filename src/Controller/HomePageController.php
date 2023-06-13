<?php

namespace App\Controller;

use App\Contract\CalculatorContract;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class HomePageController extends AbstractController
{
    private CalculatorContract $calculator;

    public function __construct(CalculatorContract $calculator){
        $this->calculator = $calculator;
    }

    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    public function index(Request $request, ValidatorInterface $validator): Response
    {
        $errors = $validator->validate($request->query->all(), new Collection([
            'operator' => new Optional(new Choice(['+', '-', '*', '/', '%'])),
            'number_a' => new Optional(),
            'number_b' => new Optional(),
        ]));

        if($errors->count() > 0) {
            return $this->render('home_page/index.html.twig', compact('errors'));
        }
        
        $result = $this->calculator->calculate(
            $request->query->get('number_a'),
            $request->query->get('operator'),
            $request->query->get('number_b')
        );

        return $this->render('home_page/index.html.twig', compact('result'));
    }
}
