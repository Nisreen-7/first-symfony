<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route("/test")]
    public function test()
    {
        // return new Response("Bonjour");
        return $this->render("first.html.twig", [
            "variable" => "Form php",
            "isOk" => true
        ]);
    }


    #[Route("/exo-twig")]
    public function exoTwig()
    {
        $names = ["Nisreen", "Sara", "Louna", "Sameer"];
        // return new Response("Bonjour");
        return $this->render("exo-twig.html.twig", [
            "names" => $names

        ]);
    }


    #[Route("/exemple/{name}")]
    public function paramExemple(string $name)
    {
        return new Response("Bonjour" . $name);
    }

}