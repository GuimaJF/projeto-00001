<?php
namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    /**
     * NOTA:
     * Inclui o arq. de config. do módulo, acrescentando o namespace no standarautoloader.
     * Service Manager: 
     * O ZF vai trabalhar com serviços. A ideia é prover serviços pro seu controller, pro seu model, para sua aplicação como um todo.
     * DOCRINE será um serviço que estará registrado no 'Module.php'.
     * O ZF tem o ServiceLocator que lhe permite chamar o DOCTRINE de dentro do seu controller sem instanciá-lo.
     * O ZF trabalha com manipulação de eventos através do Event Manager (em). Você regisra o evento para quando for preciso executá-lo.
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
