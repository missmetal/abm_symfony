<?php

namespace EmpresasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use EmpresasBundle\Entity\Empresas;



class DefaultController extends Controller
{
    /**
     * @Route("/lista")
     */
    public function indexAction()
    {
        $empresas= $this->getDoctrine()->getRepository('EmpresasBundle:Empresas')->findAll();
        return $this->render('EmpresasBundle:Default:index.html.twig', array('empresas' =>$empresas));
    }
 

    /**
     * @Route("/lista/agregar")
     */
    public function agregarAction(Request $request)
    {
        $nueva= new Empresas;
        $formulario= $this->createFormBuilder($nueva)
                ->add('cuit', NumberType::class, array('attr' =>array('class' =>'form-control')))
                ->add('nombre', TextType::class, array('attr' =>array('class' =>'form-control')))
                ->add('cantEmpleados', NumberType::class, array('attr' =>array('class' =>'form-control')))
                ->add('guardar', SubmitType::class, array('label'=>'Guardar','attr' =>array('class' =>'btn btn-info')))
                ->getForm();
        $formulario->handleRequest($request);
        if($formulario->isSubmitted() && $formulario->isValid())
        {
            $cuit= $formulario['cuit']->getData();
            $nombre= $formulario['nombre']->getData();
            $cantEmpleados= $formulario['cantEmpleados']->getData();

            $nueva->setCuit($cuit);
            $nueva->setNombre($nombre);
            $nueva->setCantEmpleados($cantEmpleados);

            $bd = $this->getDoctrine()->getManager();
            $bd->persist($nueva);
            $bd->flush();

            return $this->redirectToRoute('/lista');
            
        }


        return $this->render('EmpresasBundle:Default:agregar.html.twig', array('formulario' =>$formulario->createView()));
    }

    /**
     * @Route("/lista/eliminar/{id}")
     */
    public function eliminarAction($id,Request $request)
    {
        return $this->render('EmpresasBundle:Default:eliminar.html.twig');
    }
    /**
     * @Route("/lista/editar/{id}")
     */
    public function editarAction($id,Request $request)
    {
        return $this->render('EmpresasBundle:Default:editar.html.twig');
    }
}
