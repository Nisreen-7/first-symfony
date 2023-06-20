<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    #[Route("/courses")]
    public function index(CourseRepository $repo , Request $request): Response
    {

        if($request->request->has('search')){
            $data =$repo->search($request->query->get('search'));
        } else {
            $data = $repo->findAll();

        }

        dump($data);
        // return new Response("Bonjour");
        return $this->render("courses/course.html.twig", [
            "courses" => $data,

        ]);
    }
    #[Route("/courses/{id}")]
    public function oneid(int $id, CourseRepository $repo): Response
    {

        $list = $repo->findById($id);
        if ($list == null) {
            throw new NotFoundHttpException("No cours found with this id");
        }

        return $this->render("courses/single.html.twig", [
            'courses' => $list
        ]);
    }

    #[Route("/add-course")]
    public function addCourse(CourseRepository $rep, Request $request): Response
    {

        $form = $request->request->all();
        if (!empty($form)) {
            $data = new Course($form['title'], $form['subject'], $form['content'], new \DateTime());
            $rep->persist($data);

            // return $this->redirect('/courses/'.$courses->getId());
            return $this->render("courses/add-course.html.twig", [
                'message' => 'Vous avez ajouté avec succes une nouvelle course '
            ]);
        }
        return $this->render("courses/add-course.html.twig", [
        ]);

    }



    #[Route("/update-course/{id}")]
    public function update(int $id, CourseRepository $repo, Request $request): Response
    {

        $list = $repo->findById($id);

        $form = $request->request->all();
        if (!empty($form)) {
            $list->setTitle($form['title'])
                ->setSubject($form['subject'])
                ->setContent($form['content']);
            $repo->update($list);

        }
        return $this->render("courses/update-course.html.twig", [
            'courses' => $list
        ]);
    }

    #[Route("/remove-course/{id}")]
    public function remove(int $id, CourseRepository $repo): Response
    {
        $repo->delete($id);
        return $this->redirect('/courses');
    }

 
}