# More Use-Cases and Examples
- Formatting Data
-----------------
As mentioned in the example [here](https://github.com/codespede/property-preprocessor/blob/master/README.md), you can define custom data formatter methods in `PreProcessorTrait` which will enable you to easily format the data returned by any property of any class which use `PreProcessorTrait`.
For example, if you have a fixed date format for your application and you need all dates to be shown in that format everywhere. You can define the following method in `PreProcessorTrait`:
```
public function getDateFormatted($value){
    return date('d-m-Y', $value);
}
```
This will enable you to access the formatted value like: `$object->addedOnDateFormatted`, `$object->orderedOnDateFormatted` etc.(provided that `dateAdded` and `dateOrdered` are accessible from `$object`).

Similarly, you can define more formatter methods in the trait which will not only allow you to easily format the values returned, but also keeping all the formatting logic in one place and thereby improving re-usability.

- Converting/Filtering Data
---------------------------
When you need to convert or filter the data returned from an object to some other form, you can use the same workflow explained above.
For example, you need to convert the images returned from any object to PNG. You can define the following method in `PreProcessorTrait`:
```
public function getToPNG($image){
    //logic to convert $image to PNG..
    return $convertedImage;
}
```
This will enable you to access the PNG version of any image like: `$product->mainImageToPNG`, `$customer->profilePicToPNG` etc.(provided that `mainImage` and `profilePic` are accessible from `$product` and `$customer` respectively).

Similarly, you can define data filtering methods which will handle the required filtering and use as above.

As you can see in all the above examples, the data returned - even if it's not an object, methods can be executed on it inline which enables it to behave like an object.
