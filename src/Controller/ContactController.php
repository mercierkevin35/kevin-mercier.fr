<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\Type\MessageType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Curl;


class ContactController extends AbstractController{


    /**
     * @Route("/contact", name="contact")
     */

    public function index(Request $request){



        $email = new Message();
        $email->setTo($this->getParameter('app.admin_email'));

        $form = $this->createForm(MessageType::class, $email);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $token = $request->request->get("g-recaptcha-response");
            $curl = new Curl("https://www.google.com/recaptcha/api/siteverify");
            $resp = $curl->sendPostRequest([
                'secret' => $_ENV['RECAPTCHA_KEY'],
                'response' => $token,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ]);
            if($resp->success == true && $resp->score >= 0.5){
                $email->escapeVars();
                $headers = 'From: ';
                $headers .= $email->getTo() . "\r\n";
                $headers .= 'Reply-To: ';
                $headers .= $email->getFrom(). "\r\n";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                if(mail($email->getTo(), $email->getSubject(), $email->getMessage(), $headers)){
                    return $this->render('contact/send_success.html.twig', ['success' => 1]);
                }else{
                    return $this->render('contact/send_success.html.twig', ['success' => 0]);
                }
            }

        }
        return $this->render("contact/contact.html.twig", [
            'form' => $form->createView()
        ]);
    }

}