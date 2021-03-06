<?php
/**
 * @package   property-preprocessor
 * @author    Mahesh S Warrier <maheshs60@gmail.com>
 * @copyright Copyright &copy; Mahesh S Warrier, 2018
 * @version   1.0.0
 */
namespace traits;
/**
 * Trait PreProcessorTrait
 * @package codespede\property-preprocessor
 */
trait PreProcessorTrait{
    private $methods;
    public function __get($name){
        $this->methods = get_class_methods($this);
        foreach($this->methods as $method){
            $key = lcfirst(str_replace("get", "", $method));
            if(strpos($name, $key) !== FALSE){ 
                $actualValue = $this->{lcfirst(str_replace($key, "", $name))};
                return $this->{"get".ucfirst($key)}($actualValue);
            }
        }
        return parent::__get($name);
    }
}
