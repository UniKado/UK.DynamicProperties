<?php
/**
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @package        UK\DynamicProperties
 * @since          2016-04-01
 * @version        0.1.0-dev (Tata43)
 */


namespace UK\DynamicProperties;


/**
 * If you extend you're class from this class, you're class becomes an automatic working magic __get method for
 * read access the return values of all available getXyz methods by dynamic properties.
 *
 * For example: If you're class defines the two public get methods 'getFoo()' and 'getFooBar()' you can also
 * access the resulting return values with the dynamic properties $instance->foo and $instance->fooBar.
 *
 * But do'nt forget to document you're dyn. class properties with the @ property-read annotation
 *
 * @since v0.1.0-dev (Tata43)
 */
abstract class ExplicitGetter
{


   // <editor-fold desc="// = = = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * The magic get method to let you access all getter methods by dynamic properties.
    *
    * @param  string $name The name of the required dynamic property.
    * @return mixed
    * @throws \LogicException If the property is unknown
    */
   public function __get( $name )
   {

      return $this->get( $name );

   }

   /**
    * Magic isset implementation.
    *
    * @param  string $name The name of the required property.
    * @return boolean
    */
   public function __isset( $name )
   {

      return \method_exists( $this, 'get' . \ucfirst( $name ) );

   }

   /**
    * Returns, if a property with the defined name exists for read access.
    *
    * @param  string $name       The name of the property.
    * @param  string $getterName Returns the name of the associated get method, if method returns TRUE.
    * @return boolean
    */
   public function hasReadableProperty( $name, &$getterName )
   {

      $getterName = 'get' . \ucfirst( $name );

      return \method_exists( $this, $getterName );

   }

   // </editor-fold>


   // <editor-fold desc="// = = = =   P R O T E C T E D   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * @param string $name
    * @return mixed
    */
   protected function get( $name )
   {

      // The name of the required getMethod
      if ( ! $this->hasReadableProperty( $name, $getterName ) )
      {
         throw new \LogicException( 'No such property: ' . __CLASS__ . '::$' . $name. '!' );
      }

      return $this->$getterName();

   }

   // </editor-fold>


}

