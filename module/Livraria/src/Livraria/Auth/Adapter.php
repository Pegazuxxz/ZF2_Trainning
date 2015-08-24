<?php

namespace Livraria\Auth;

use Zend\Authentication\Adapter\AdapterInterface,
    Zend\Authentication\Result;


use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface{

    /**
     * 
     * @var EntityManager
     * 
     */
    
    protected $em;
    protected $userName;
    protected $password;

    
    public function __construct(EntityManager $em) {
        $this->em = $em;
        
    }
    
    public function getEm() {
        return $this->em;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setEm(EntityManager $em) {
        $this->em = $em;
        return $this;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
         return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
         return $this;
    }

    public function authenticate() {
        
        $repository = $this->em->getRepository("Livraria\Entity\User");
        $user = $repository->findByEmailAndPassword($this->getUserName(),$this->getPassword());
        
        if($user)
        {
            return new Result(Result::SUCCESS,array('user' => $user),array("OK"));
            
        }
        else
        {
            return new Result(Result::FAILURE_CREDENTIAL_INVALID,null,array());
            
        }
    }

     
  
    
}
