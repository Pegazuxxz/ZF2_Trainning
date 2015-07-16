<?php


namespace Livraria\Entity;

class Configurator {
 
    
    public static function configure($target, $options, $tryCall = false)
    {
        
        if(!is_object($target))
        {
            throw new \Exception("Target should be an object!");
        }
        if(!($options instanceof \Traversable) && !is_array($options))
        {
            throw new \Exception("Options should implements Traversable!");
            
        }
        
        $tryCall = (bool) $tryCall && method_exists($target, '__call');
        
        foreach ($options as $name => &$value)
        {
            
            
            
        }
        
        
        
        
    }
}
