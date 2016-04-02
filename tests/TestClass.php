<?php
/**
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @since          2016-04-01
 * @version        0.1.0-dev (Tata43)
 */


namespace UK\DynamicProperties\Test;


use UK\DynamicProperties\ExplicitGetter;
use UK\DynamicProperties\ExplicitGetterSetter;


/**
 * The \UK\DynamicProperties\Test\TestClass2 class.
 *
 * @since v0.1.0-dev (Tata43)
 */
class TestClass1 extends ExplicitGetter
{


   // <editor-fold desc="// = = = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   private $properties = [
      'foo'      => 'foo',
      'bar'      => true,
      'baz_blub' => 14
   ];

   // </editor-fold>


   // <editor-fold desc="// = = = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


   // <editor-fold desc="// - - -   G E T T E R   - - - - - - - - - - - - - - - - - - - - - -">

   /**
    * @return string
    */
   public function getFoo()
   {
      return $this->properties[ 'foo' ];
   }

   /**
    * @return bool
    */
   public function getBar()
   {
      return $this->properties[ 'bar' ];
   }

   /**
    * @return int
    */
   public function getBazBlub()
   {
      return $this->properties[ 'baz_blub' ];
   }

   // </editor-fold>


   // <editor-fold desc="// - - -   O T H E R   M E T H O D S   - - - - - - - - - - - - - - -">
   // </editor-fold>


   // </editor-fold>


}

/**
 * The \UK\DynamicProperties\Test\TestClass2 class.
 *
 * @since v0.1.0-dev (Tata43)
 */
class TestClass2 extends ExplicitGetterSetter
{


   // <editor-fold desc="// = = = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   private $properties = [
      'foo'      => 'foo',
      'bar'      => true,
      'baz_blub' => 14,
      'boing'    => 22.4
   ];

   // </editor-fold>


   // <editor-fold desc="// = = = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


   // <editor-fold desc="// - - -   G E T T E R   - - - - - - - - - - - - - - - - - - - - - -">

   /**
    * @return string
    */
   public function getFoo()
   {
      return $this->properties[ 'foo' ];
   }

   /**
    * @return bool
    */
   public function getBar()
   {
      return $this->properties[ 'bar' ];
   }

   /**
    * @return bool
    */
   public function getBoing()
   {
      return $this->properties[ 'boing' ];
   }

   /**
    * @return int
    */
   public function getBazBlub()
   {
      return $this->properties[ 'baz_blub' ];
   }

   // </editor-fold>


   // <editor-fold desc="// - - -   S E T T E R   - - - - - - - - - - - - - - - - - - - - - -">

   /**
    * @param  string $value
    * @return \UK\DynamicProperties\Test\TestClass2
    * @throws \LogicException
    */
   public function setFoo( $value )
   {

      if ( \strlen( $value ) < 1 )
      {
         throw new \LogicException( 'Foo can not use an empty string' );
      }

      $this->properties[ 'foo' ] = $value;

      return $this;

   }

   /**
    * @param  bool $value
    * @return \UK\DynamicProperties\Test\TestClass2
    */
   public function setBar( $value )
   {

      $this->properties[ 'bar' ] = $value;

      return $this;

   }

   /**
    * @param  int $value
    * @return \UK\DynamicProperties\Test\TestClass2
    * @throws \LogicException
    */
   public function setBazBlub( $value )
   {

      if ( $value < 1 )
      {
         throw new \LogicException( 'The BazBlub property not accept values lower then 1' );
      }

      $this->properties[ 'baz_blub' ] = $value;

      return $this;

   }

   // </editor-fold>


   // <editor-fold desc="// - - -   O T H E R   M E T H O D S   - - - - - - - - - - - - - - -">
   // </editor-fold>


   // </editor-fold>


}

