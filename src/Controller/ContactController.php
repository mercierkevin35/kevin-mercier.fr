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
            $email->setMessage(htmlspecialchars($email->getMessage()));
            $email->setFrom(htmlspecialchars($email->getFrom()));
            $email->setSubject(htmlspecialchars($email->getSubject()));
            $headers = 'From: ';
            $headers .= $email->getFrom() . "\r\n";
            $headers .= 'Reply-To: ';
            $headers .= $email->getFrom(). "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            if(@mail($email->getTo(), $email->getSubject(), $email->getMessage(), $headers)){
                return $this->render('send_success.html.twig', ['success' => 1]);
            }else{
                return $this->render('send_success.html.twig', ['success' => 0]);
            }
        }

        return $this->render("contact.html.twig", [
            'form' => $form->createView()
        ]);
    }

}