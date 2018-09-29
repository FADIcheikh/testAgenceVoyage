<?php

namespace tunigo\tripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class tunigoController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('tripBundle:Default:index.html.twig', array('name' => $name));
    }
    
            public function ajoutAction()
    {
          $offre = new \tunigo\tripBundle\Entity\offre();
          $form = $this->createFormBuilder($offre)
                 ->add('destination', 'choice', array(
             'choices' => array('paris' => 'Paris', 'rome' => 'Rome','bracelone' => 'Barcelone','Casablanca' => 'Casablanca','belgrade' => 'Blegrade','istanbul' => 'Istanbul'),
             
             'multiple' => false
     ))
                   ->add('datealler')
                   ->add('dateretour')
                   ->add('prix')
                   ->add('companie')
                   
                  ->add('ajouter','submit')
                  ->getForm();
          $request = $this->getRequest();
          if($form->handleRequest($request)->isValid())
          {
              $em=  $this->getDoctrine()->getManager();
              $em->persist($offre);
              $em->flush();
          }
        return $this->render('tripBundle:tunigo:ajouteroffre.html.twig',array('form'=> $form->createView()));
    }
    
       public function afficherAction() {
 $em=$this->getDoctrine()->getManager();
 $offre=$em->getRepository("tripBundle:offre")->findAll();
   return $this->render('tripBundle:tunigo:afficheroffre.html.twig',array('offre'=> $offre));
        
    }
    
          public function afficherclientAction() {
 $em=$this->getDoctrine()->getManager();
 $offre=$em->getRepository("tripBundle:offre")->findAll();
   return $this->render('tripBundle:tunigo:afficheroffreclient.html.twig',array('offre'=> $offre));
        
    }
 
    
        public function reserverAction($id)
    {
             
           $em=$this->getDoctrine()->getManager();
           $offre=$em->getRepository('tripBundle:offre')->find($id);
           $reservation = new \tunigo\tripBundle\Entity\reservation();
              $form = $this->createFormBuilder($reservation)
                
                   
                   ->add('email')
                  
                   ->add('typedepayement', 'choice', array(
             'choices' => array('visacard' => 'Visa Card', 'mastercard' => 'Master Card','paypal' => 'PayPal'),
             'expanded' => true,
             'multiple' => false
     ))
                   
                  ->add('reserver','submit')
                  ->getForm();
           $requete=$this->get('request');
           if($requete->getMethod()=='POST'){
               $nomprenom=$requete->get('nomprenom');
               $nbplaces=$requete->get('nbplaces');
              $form->bind($requete);
                  if($form->isValid()){
                     
                      $reservation->setOffre($offre);
                       $reservation->setNomprenom($nomprenom);
                       $reservation->setNbplaces($nbplaces);
                      $em->persist($reservation);
                      $em->flush();
                 return $this->redirect($this->generateUrl("trip_facturepage",array('id'=>$id,'nomprenom'=>$nomprenom,'nbplaces'=>$nbplaces)));
            }
        }
        return $this->render("tripBundle:tunigo:reservation.html.twig",array('form'=>$form->createView(),'offre'=>$offre));
         
     }
     
      public function rechercherAction()
    {
         
         
         $em=$this->getDoctrine()->getManager();
         $req=$this->get('request');
         $reservation=$em->getRepository('tripBundle:reservation')->findAll();
         if ($req->getMethod()=='POST') {
             $nomprenom=$req->get('nomprenom');//name de l'input à partir du formulaire
             $reservation=$em->getRepository('tripBundle:reservation')->findBynom($nomprenom);
             
         }
           return $this->render('tripBundle:tunigo:rechercher.html.twig',array('reservation'=> $reservation));
     }
    
         public function factureAction($id,$nomprenom,$nbplaces)
    {
         
         
         $em=$this->getDoctrine()->getManager();
          $requete=$this->get('request');
               $offre=$em->getRepository('tripBundle:offre')->find($id);
                
         $reservation=$em->getRepository('tripBundle:reservation')->findBynom($nomprenom);
        

            $total=(($offre->getPrix())*($nbplaces));
       
              return $this->render('tripBundle:tunigo:facture.html.twig',array('nomprenom'=> $nomprenom,'offre'=>$offre,'total'=>$total,'nbplaces'=>$nbplaces));
           
         

     }
    
    
}
