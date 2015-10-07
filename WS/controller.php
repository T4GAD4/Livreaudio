<?php
namespace WS;
 
abstract class WebService
{
 
 
    function __construct(Application $app, $module, $action)
    {
        parent::__construct($app);
 
        $this->manager = new Managers('PDO', PDOFactory::getMysqlConnexion());
        $this->page = new Page($app);
 
        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
    }
 
    public function doPut()
    {
        return error;
    }
    
    
    
}
?>