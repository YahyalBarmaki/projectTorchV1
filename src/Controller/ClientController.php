<?php

namespace App\Controller;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

     /**
     * @Route("/inscris",name="inscris",methods={"POST"})
     */
    public function inscris(Request $request,UserPasswordEncoderInterface $passwordEncoder,EntityManagerInterface $entityManager)
    {
        $values = json_decode($request->getContent());
        if (isset($values->username,$values->password)) {
            $client = new Client();
            $client->setUsername($values->username);
            $client->setNomEntrepr($values->nomEntrepr);
            $client->setNomClien($values->nomClien);
            $client->setPoste($values->poste);
            $client->setPassword($passwordEncoder->encodePassword($client, $values->password));
            $client->setRoles($client->getRoles());
            $entityManager->persist($client);
            $entityManager->flush();

            $data = [
                'status'=>201,
                'message'=>'Le Client  a été ajouté'
            ];
            return new JsonResponse($data,201);
        }
        $data = [
            'status'=>500,
            'message'=>'Vous devez renseigner les clés username et password'
        ];
        return new jsonResponse($data,500);

    }

    /**
     * @Route("/login",name="login", methods={"POST"})
     */
    public function login(Request $request)
    {
        $client = $this->getUser();
        return $this->json([
            'username'=>$client->getUserName(),
            'roles'=>$client->getRoles()
        ]);
    }
}
