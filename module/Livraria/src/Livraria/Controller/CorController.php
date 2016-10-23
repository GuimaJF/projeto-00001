<?php
namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CorController extends AbstractActionController
{
    public function indexAction()
    {
        $doctrineORM = 'Doctrine\ORM\EntityManager';
        $em = $this->getServiceLocator()->get($doctrineORM);
        $entidade = 'Livraria\Entity\Categoria';
        $repositorio = $em->getRepository($entidade);
        
        $resultado = $repositorio->findAll();

        return new ViewModel(array('resultado' => $resultado, 'flag' => 'corTeste'));
    }
    
    public function azulAction()
    {
        return new ViewModel(array('flag' => 'azulTeste'));
    }
}
