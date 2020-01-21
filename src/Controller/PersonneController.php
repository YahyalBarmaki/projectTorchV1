<?php

namespace App\Controller;
use App\Entity\Personne;
use App\Form\PersonneType;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
class PersonneController extends AbstractController
{
    /**
     * @OA\Get(
     *  path="/personne",
     *  @OA\Response(
     *      response="200",
     *      description="L'ensemble des personnes",
     *      @OA\JsonContent(type="string", description="Les primiers personnes"),
     *  )
     * )
     */
    /** 
     * @Route("/personne", name="personne_index")
     */
    public function index(PersonneRepository $repository, SerializerInterface $serializer,Request $request)
    {
       $personne = $this->getDoctrine()
                        ->getRepository(Personne::class)
                        ->findAllPer();
       $data = $serializer->serialize($personne,'json');

        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
     }
     /**
      * @Route("/search",name="search")
      */
      public function search(Request $request): Response
        {
            $search = $request->request->get('tel');
            $qb = $this->getDoctrine()
                  ->getRepository('App\Entity\Personne')
                  ->findAllQueryBuilder($search);
                if ($search) {
                    
                    return new Response(
                        "L'enregistrement a été bien effectue!"
                    );
                }  
        }

    /**
     * @Route("/ajoutPersonne",name="ajoutPer", methods={"GET","POST"})
     */
    public function ajout(Request $request): Response
    {
        $personne = new Personne();
        $form = $this->CreateForm(PersonneType::class,$personne);
        $form->handleRequest($request);
        $values = $request->request->all();
        $form->Submit($values);
        if ($personne) {
            //dump($personne);die();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personne);
            $entityManager->flush();

            return new Response(
                "L'enregistrement a été bien effectue!"
            );  
        }
        return $this->render('affiche_torch/new_pers.html.twig',[
            'personne'=>$personne,
            'form'=> $form->createView(),
        ]);
    }
}
