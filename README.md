# Property Value Pre-processor for PHP
This is a simple yet powerful trait which allows one to easily pre-process the properties before they are returned from the objects of classes which use it.

Installation
------------
The preferred way to install this extension is to [click here](https://github.com/codespede/property-preprocessor/archive/master.zip) which will download the package as a zip file. Instructions on how to use it is explained below.

How to use
----------
From the downloaded zip, place the file PreProcessorTrait.php in your project's 'traits' folder(please create one if it does not exist). In your classes, you can use the trait as below:
```
class ClassName{
use \traits\PreProcessorTrait.php
...
...
...
}
```

Use Cases
---------
Suppose you have an object `$store` and it has a property `$products` which is an array of all the `Product` objects in that `Store`.

The `Product` objects are too large and it contains lot of data and you currently need only some minimal data.

Use `PreProcessorTrait` in the `$store` object's class as explained above and insert the following method in `traits\PreProcessorTrait.php`
```
public function getMinified($objects){
		foreach($objects as &$object){
			  $object->minify();
		}
		return $objects;
}

public function minify(){
    //your logic to minify and return the object
}
```
You can get the minified data by calling like this: `$store->productsMinified`. Similarly you can use like this for any property of the $store object. Eg:- `$store->invoicesMinified`, `$store->customersMinified` etc.

From this point on, any class using the `PreProcessorTrait` will have the ability to minify it's properties before returning them.

For example:
```
$customer->ordersMinified
$brand->productsMinified
$product->categoriesMinified
```

Like this, you can add whatever methods in PreProcessorTrait and it can be used in any object in which this trait is used in the very same way explained above. For more use cases and examples, [click here](https://github.com/codespede/property-preprocessor/blob/master/EXAMPLES.md)
