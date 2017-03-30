<?php

namespace EmpresasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $empresas= $this->getDoctrine()->getRepository('EmpresasBundle:Empresas')->findAll();
        return $this->render('EmpresasBundle:Default:index.html.twig', array('empresas' =>$empresas));
    }
 

    /**
     * @Route("/agregar")
     */
    public function agregarAction(Request $request)
    {
        return $this->render('abm/agregar.html.twig');
    }

    /**
     * @Route("/eliminar/{id}")
     */
    public function eliminarAction($id,Request $request)
    {
        return $this->render('abm/eliminar.html.twig');
    }
    /**
     * @Route("/editar/{id}")
     */
    public function editarAction($id,Request $request)
    {
        return $this->render('abm/editar.html.twig');
    }
}
