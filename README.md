# UK.DynamicProperties

This is an PHP5 implementation to easy generate an little bit of "magic" extra functionality to you're PHP classes.

If you extend you're class from one of the classes of `\UK\DynamicProperties` so it adds dynamic class instance
properties with read or read+write access. It requires only the presence of some get*() and/or set*() methods.

## Status

[![Build Status](https://travis-ci.org/UniKado/UK.DynamicProperties.svg?branch=master)](https://travis-ci.org/UniKado/UK.DynamicProperties)

## Installation

```
composer require uk/dynamic-properties
```

## Usage

The usage is really simple.

### Why should I use dynamic properties?

You should not use it but you can, if you see the advantages.

Most modern IDE's like [PHPStorm](https://www.jetbrains.com/phpstorm/) or [Netbeans](https://netbeans.org/features/php/)
supports the dynamic properties with the code completion feature if the Properties have the correct PHP-Doc tag
notation.

It means for example, if you provide a dynamic readonly property with the name `$foo` of type `string`

```
/**
 * …
 *
 * @property-read string $foo Description of the property…
 */
```

For read + write access you only have to replace `@property-read` with `@property`.

### Dynamic property read access

If you have an class that define methods for getting some instance properties and they are with an name format
like **`getPropertyName1()`** or **`getPropertyName2()`** etc. pp. You only must extend the class from the
**`\UK\DynamicProperties\ExplicitGetter`** class and you can access the Properties directly like
**`$myClassInstance->propertyName1`** or **`$myClassInstance->propertyName2`** for read access.

The class will always work like before but with the extra properties.

```php
# include \dirname( __DIR__ ) . '/vendor/autoload.php';

use UK\DynamicProperties\ExplicitGetter;

/**
 * @property-read string $foo …
 * @property-read bool   $bar …
 */
class MyClass extends ExplicitGetter
{

   private $properties = [
      'foo'      => 'foo',
      'bar'      => true
   ];

   public function getFoo() : string
   {
      return $this->properties[ 'foo' ];
   }
   public function getBar() : bool
   {
      return $this->properties[ 'bar' ];
   }

}
```

Remember to do not forget to write the required class documentation for the dynamic available read only properties,
like in the example docblock below.

### Dynamic property read+write access

If you also need write access to the properties you must replace the `UK\DynamicProperties\ExplicitGetter`
with the `UK\DynamicProperties\ExplicitGetterSetter` class an implement the required set???() methods

```php
#include \dirname( __DIR__ ) . '/vendor/autoload.php';


use UK\DynamicProperties\ExplicitGetterSetter;


/**
 * @property      string $foo …
 * @property-read bool   $bar …
 */
class MyClass extends ExplicitGetterSetter
{

   private $properties = [
      'foo'      => 'foo',
      'bar'      => true
   ];

   public function getFoo() : string
   {
      return $this->properties[ 'foo' ];
   }

   public function getBar() : bool
   {
      return $this->properties[ 'bar' ];
   }

   public function setFoo( string $value ) : MyClass
   {
      if ( \strlen( $value ) < 1 )
      {
         throw new \LogicException( 'Foo can not use an empty string' );
      }
      $this->properties[ 'foo' ] = $value;
      return $this;
   }

}
```

That it.
