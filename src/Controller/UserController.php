<?php 

namespace App\Controller;

use Psr\Log\LoggerInterface;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController{

    /**
     * @Route("/api/users/reset-password", methods={"POST"})
     */
    public function resetPassword(Request $request){

        $data = json_decode($request->getContent(), true);

        $entityManager = $this->getDoctrine()->getManager();
        
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepo->findOneBy([
            "name" => $data["user"]["name"],
            "password" => $data["user"]["currentPassword"]
            ]);

        $result = "failed";
        if($user){
            $user->setPassword($data["user"]["newPassword"]);
            
            $entityManager->persist($user);
            $entityManager->flush();
            
            $result = "Password reset succesfully!";
        }

        return $this->parseJson([
            'result' => $result
        ]);
    }

    /**
     * @Route("/api/users/{name}", methods={"GET"})
     */
    public function getUserByName($name){

        $repo = $this->getDoctrine()->getRepository(User::class);
        $user = $repo->findOneBy(["name" => $name]);

        $result = "not found";
        if($user){
            $result = "found";
        }

        return $this->parseJson([
            'result' => $result
        ]);
    }

    /**
     * @Route("/api/users", methods={"GET"})
     */
    public function listUsers(){
        $repo = $this->getDoctrine()->getRepository(User::class);

        $users = $repo->findAll();
        
        $results = [];
        foreach($users as $user){
            $results[] = [
                "name" => $user->getName(),
                "password" => $user->getPassword()
            ];
        }

        return $this->parseJson([
            'result' => $results
        ]);
    }

    private function parseJson($data) : Response{
        $response = new Response();
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}

?>