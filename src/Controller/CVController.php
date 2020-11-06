<?php

namespace App\Controller;

use App\Entity\CV;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CVController extends AbstractController
{
    /**
     * @Route("/cv", name="cv")
     */
    public function index()
    {
        //$entityManager = $this->getDoctrine()->getManager();
        // $cv = $this->getDoctrine()
        //     ->getRepository(CV::class)
        //     ->findAll()[0];
        
        $cv = new CV();
        $cv->setFirstName("Kévin");
        $cv->setLastName("Mercier");
        $cv->setTitle("Développeur PHP");
        $cv->setSubtitle("En contrat de professionnalisation");
        $cv->setAddress("1, rue Jean-Marie Ecorchard\nAppartement B12\n35 131 Chartres-de-Bretagne");
        $cv->setPhone("0768590601");

        $cv->addCompetence([
                "name" => "Travail en équipe, précision, gestion des priorités",
                "desc" => ""
            ])
        ->addCompetence([
            "name" => "Languages informatiques",
            "desc" => "PHP, MySQL, Python, HTML/JS/CSS/SCSS, C/C++"
        ])
        ->addCompetence([
            "name" => "Frameworks, librairies, bibliothèques et autres outils de développement",
            "desc" => "Symfony(PHP), Numpy/Pandas/Matplotlib(Python), JQuery(JS), WebPack"
        ])
        ->addCompetence([
            "name" => "Pack office, SolidWorks(CAO)",
            "desc" => ""
        ]);

        $cv->addExperience([
            "name" => "Juillet 2018 - Aujourd'hui : Analyste MET chez ITGA à Rennes (35)",
            "desc" => "Analyse de prélèvements d'air et de matériaux afin de déterminer la présence d'amiante"

        ])
        ->addExperience([
            "name" => "Mai 2017 - Juillet 2018 : Technicien de laboratoire chez ITGA à Rennes (35)",
            "desc" => "Préparation d'échantillons de matériaux potentiellement amiantés en vue d'une analyse au MET"

        ])
        ->addExperience([
            "name" => "Juin 2015 - Octobre 2015 : Aide de laboratoire au CHU de Pontchaillou à Rennes (35)",
            "desc" => "Réception des prélèvements, gestion des prélèvements urgents, centrifugation, décantation"
        ])
        ->addExperience([
            "name" => "Avril 2015 - Juin 2015 : Inventoriste chez RGIS à Rennes (35)",
            "desc" => "Réalisations d'inventaires rapides et précis"
        ])
        ->addExperience([
            "name" => "Juillet 2014 - Août 2014 : Aide de laboratoire au CHU de Pontchaillou à Rennes (35)",
            "desc" => "Préparation des commandes, réception des prélèvements, laverie, stérilisation du matériel"
        ])
        ->addExperience([
            "name" => "Avril 2014 - Juin 2014 : Stagiaire technicien d'analyse bactériologiques chez Novescia à Wissous (91)",
            "desc" => "Vérification sur site des méthodes d'un automate d'hémoculture. Ensemencement, lecture et interprétation des résultats."
        ]);

        $cv->addFormation([
            "name" => "2014 - 2015 : Université de Rennes 1 à Rennes (35)",
            "desc" => "L1 Informatique"
        ])
        ->addFormation([
            "name" => "2012 - 2014 : Université de Bretagne Sud à Pontivy (56)",
            "desc" => "I.U.T Génie chimique - génie des procédés (diplôme non obtenu)"
        ])
        ->addFormation([
            "name" => "2012 : Lycée privé de l'Assomption à Rennes (35)",
            "desc" => "Baccalauréat scientifique (mention assez bien)"
        ]);

        $cv->addHobby([
            "name" => "Science, découverte (électronique, informatique, astronomie)",
            "desc" => ""
        ])
        ->addHobby([
            "name" => "Voyages",
            "desc" => ""
        ]);
        //$entityManager->flush();
        return $this->render("cv.html.twig", ["cv" => $cv]);
    }
}
