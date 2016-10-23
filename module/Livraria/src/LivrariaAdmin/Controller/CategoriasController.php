<?php
namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class CategoriasController extends AbstractActionController 
{
    /**
     * @var EntityManager
     */
    protected $em;
    
    /**
     * @return EntityManager
     */
    protected function getEm()
    {
        if($this->em === null){
            $doctrineORM = 'Doctrine\ORM\EntityManager';
            $this->em = $this->getServiceLocator()->get($doctrineORM);
        }
        return $this->em;
    }
    
    public function indexAction()
    {
        $entidade = 'Livraria\Entity\Categoria';
        $em = $this->getEm();
        $repositorio = $em->getRepository($entidade);
        $resultado = $repositorio->findAll();
        return new ViewModel(array('resultado' => $resultado));
    }

}
