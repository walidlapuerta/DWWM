<?php session_start();
require_once(__DIR__.'/vendor/autoload.php');

use \Mailjet\Resources;

define('API_USER', '4222bd07512baab01209cbc79b04319e');
define('API_LOGIN', '862d52e3b4768be44865a09ba9bb7a37');

$mj = new \Mailjet\Client(API_USER, API_LOGIN,true,['version' => 'v3.1']);


if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message']) ){

    $surname = htmlspecialchars($_POST['surname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "elasriwalid97@gmail.com",
                        'Name' => "Walid"
                    ],
                    'To' => [
                        [
                            'Email' => "elasriwalid97@gmail.com",
                            'Name' => "passenger 1"
                        ]
                    ],
                    'Subject' => "Vous avez reçu un message",
                    'TextPart' => "$email, $message",
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Email envoyé avec succès"
        ];
        header('Location: index.php');

    }else{
        echo "L'email n'est pas valide." ;
    }


}else{
    header('Location: index.php');
}