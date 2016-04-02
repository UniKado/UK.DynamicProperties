<?php
/**
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @package        UK\DynamicProperties;
 * @since          2016-04-01
 * @version        0.1.0-dev (Tata43)
 */


namespace UK\DynamicProperties;


/**
 * If you extend you're class from this class, you're class becomes a automatic working magic get + set method for
 * read + write accessing the values of all available getXyz + setXyz methods by dynamic properties.
 *
 * For example: If you're class defines the two public get methods 'getFoo()' and 'getFooBar()' and the public
 * set method 'setFooBar( $value ) you can also access it with the dynamic properties
 * $instance->foo [is readonly] and $instance->fooBar [read + write].
 *
 * But do'nt forget to document you're dyn. class properties with the @ property annotation
 *
 * @since v0.1.0-dev (Tata43)
 */
abstract class ExplicitGetterSetter extends ExplicitGetter
{


   // <editor-fold desc="// = = = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


   /**
    * The magic set method to let you access all setter methods by dynamic properties.
    *
    * @param  string $name    The name of the dynamic property.
    * @param  mixed  $value   The value to set.
    * @throws \LogicException Is thrown if the property does not exist or if writing is requested but not allowed.
    */
   public function __set( $name, $value )
   {

      if ( ! $this->hasWritableProperty( $name, $setterName ) )
      {
         throw new \LogicException( 'No such property: ' . __CLASS__ . '::$' . $name. '!' );
      }

      $this->$setterName( $value );

   }

   /**
    * Magic isset implementation.
    *
    * @param  string $name The name of the required property.
    * @return boolean
    */
   public function __isset( $name )
   {

      if ( \method_exists( $this, 'set' . \ucfirst( $name ) ) )
      {
         return true;
      }

      return parent::__isset( $name );

   }

   /**
    * Returns, if a property with the defined name exists for write access.
    *
    * @param  string $name       The name of the property.
    * @param  string $setterName Returns the name of the associated set method, if method returns TRUE.
    * @return boolean
    */
   public function hasWritableProperty( $name, &$setterName )
   {

      $setterName = 'set' . \ucfirst( $name );

      return \method_exists( $this, $setterName );

   }


   // </editor-fold>


}

