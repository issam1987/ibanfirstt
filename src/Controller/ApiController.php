<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\ApiHelper;



class ApiController extends AbstractController
{


    /**
     * @Route("/wallets", name="wallets")
     */
    public function wallets(ApiHelper $api)
    {


        $url 		= "https://sandbox2.ibanfirst.com/api/wallets/";


        $someJSON = $api->res_api($url);
        // Convert JSON string to Array
        $someArray = json_decode($someJSON, true);
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
            'wallets2'=>$someJSON,
            'wallets'=>$someArray["wallets"]
        ]);


    }

    /**
     * @Route("/wallets/info/{id}", name="infow")
     */
    public function info($id, ApiHelper $api)
    {

        $url 		= "https://sandbox2.ibanfirst.com/api/wallets/-".$id;


        $someJSON = $api->res_api($url);

        // Convert JSON string to Array
        $someArray = json_decode($someJSON, true);

        return $this->render('api/info_wallet.html.twig', [
            'controller_name' => 'ApiController',
            'wallet'=>$someArray["wallet"]
        ]);


    }




    /**
     * @Route("/wallets/info_financial/{id}", name="infof")
     */
    public function info_financial($id, ApiHelper $api)
    {

        $url 		= "https://sandbox2.ibanfirst.com/api/financialMovements/";

        $someJSON = $api->res_api($url);

        // Convert JSON string to Array
        $someArray = json_decode($someJSON, true);


        return $this->render('api/info_financial_wallet.html.twig', [
            'controller_name' => 'ApiController',
            'id'=>$id,
            'financialMovements'=>$someArray["financialMovements"]
        ]);

    }








    /**
     * @Route("/financialMovements", name="financialMovements")
     */
    public function financialMovements(ApiHelper $api)
    {

        $url 		= "https://sandbox2.ibanfirst.com/api/financialMovements/";

        $someJSON = $api->res_api($url);
        // Convert JSON string to Array
        $someArray = json_decode($someJSON, true);

        return $this->render('api/financialMovements.html.twig', [
            'controller_name' => 'ApiController',
            'financialMovements'=>$someArray["financialMovements"]
        ]);

    }
}
