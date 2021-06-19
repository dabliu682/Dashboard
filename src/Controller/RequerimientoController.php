<?php

namespace App\Controller;

use App\Entity\Requerimientos;
use App\Forms\requerimientoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;

class RequerimientoController extends AbstractController
{
    public function listarRequerimientos()
    {
        date_default_timezone_set("America/Bogota");
        $bd = $this->getDoctrine()->getManager();

        $reqs = $bd->getRepository(Requerimientos::class)->findAll();

        foreach($reqs as $req)
        {
            $fecha1 = $req->getFechaRegistro();
            $fecha2 = new \DateTime('now');
            $fecha = $fecha1->diff($fecha2);

            if ($fecha->d <= 0)
            {
                $textFecha = $fecha->h.' horas'.' '.$fecha->i.' minutos';

                if($fecha->h <= 0)
                {
                    $textFecha = $fecha->i.' minutos';
                }
            }
            else
            {
                $textFecha = $fecha->d. ' dias'.' '.$fecha->h.' horas'.' '.$fecha->i.' minutos';
            }

           $req->textFecha=$textFecha;

           if ($fecha1->modify('+48 hours') <= $fecha2)
           {
               $req->vence=true;
           }
           else
           {
               $req->vence=false;
           }
        }

        return $this->render('Requerimiento/index.html.twig', array('textFecha'=> $textFecha,'requerimientos' => $reqs));
    }

    public function nuevoRequerimiento()
    {
        $requerimiento = new Requerimientos();

        date_default_timezone_set("America/Bogota");

        $FORMA=$this->createForm(requerimientoType::class, $requerimiento, array('method'=>'POST', 'action'=>$this->generateUrl('requerimiento_guardar')));

        return $this->render('Requerimiento\nuevo.html.twig', array('form'=>$FORMA->createView()));
    }

    public function guardarRequerimiento(Request $request)
    {

        $requerimiento = new Requerimientos();

        date_default_timezone_set("America/Bogota");


        $FORMA=$this->createForm(requerimientoType::class, $requerimiento, array('method'=>'POST', 'action'=>$this->generateUrl('requerimiento_guardar')));

        $FORMA->handleRequest($request);
        try
        {
            if ($FORMA->isSubmitted() && $FORMA->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $requerimiento->setFechaRegistro(new \DateTime());
                $em->persist($requerimiento);
                $em->flush();


                $this->addFlash('mensaje', 'Requerimiento registrado correctamente');

                return $this->redirectToRoute('requerimientos_listar');
            }
        }
        catch (\Exception $e)
        {
            $this->addFlash('mensaje', $e);
            return $this->render('requerimientos\nuevo.html.twig', array('fecha' => $fecha, 'form'=>$FORMA->createView()));

        }

    }

    public function verRequerimiento()
    {

        dd('textFecha');

    }






}
