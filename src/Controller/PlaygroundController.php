<?php 

namespace App\Controller;

use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PlaygroundController extends AbstractController{

    /**
     * @Route("/api/fizzbuzz")
     */
    public function fizzbuzz(): Response{

        $numbers = array();

        for($i = 1; $i <= 100; $i++){
            if($this->modulos($i, 3) && $this->modulos($i, 5)){
                $numbers[] = [
                    "val" => $i,
                    "class" => "fizzbuzz"
                ];
            }else if($this->modulos($i, 3)){
                $numbers[] = [
                    "val" => $i,
                    "class" => "fizz"
                ];
            }else if($this->modulos($i, 5)){
                $numbers[] = [
                    "val" => $i,
                    "class" => "buzz"
                ];
            }
            else{
                $numbers[] = [
                    "val" => $i,
                    "class" => ""
                ];
            }
        }

        return $this->parseJson([
            'fizzbuzz' => $numbers
        ]);
    }

    /**
     * @Route("/api/reversal", methods="POST")
     */
    public function reversal(Request $request): Response{

        $data = json_decode($request->getContent(), true);

        $strSplit = preg_split("//u", $data["inputValue"]);
        $reversedArr = array_reverse($strSplit);
        $reversedStr = implode("", $reversedArr);

        return $this->parseJson([
            'result' => $reversedStr
        ]);
    }

    /**
     * @Route("/playground/{vueRouting}", requirements={"vueRouting"=".*"})
     */
    public function index(){
        return $this->render('index.html.twig', []);
    }

    /**
     * Utils
     */
    private function modulos($number, $mod) : bool{
        return ($number % $mod) == 0;
    }

    private function parseJson($data) : Response{
        $response = new Response();
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}

?>