<?php
namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $doctrineORM = 'Doctrine\ORM\EntityManager';
        $em = $this->getServiceLocator()->get($doctrineORM);
        $entidade = 'Livraria\Entity\Categoria';
        $repositorio = $em->getRepository($entidade);
        
        $resultado = $repositorio->findAll();

        return new ViewModel(array('resultado' => $resultado, 'flag' => 'ADMindex'));
    }
}
