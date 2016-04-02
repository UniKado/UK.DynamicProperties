<?php
/**
 * @author         UniKado <unikado+pubcode@protonmail.com>
 * @copyright  (c) 2016, UniKado
 * @since          2016-04-01
 * @version        0.1.0-dev (Tata43)
 */

include __DIR__ . '/TestClass.php';

use UK\DynamicProperties\Test\TestClass1;
use UK\DynamicProperties\Test\TestClass2;


/**
 * The ExplicitGetterSetterTest class.
 *
 * @since v0.1.0-dev (Tata43)
 */
class ExplicitGetterSetterTest extends PHPUnit_Framework_TestCase
{


   // <editor-fold desc="// = = = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * @type TestClass1
    */
   private $getter;
   
   /**
    * @type TestClass2
    */
   private $getterSetter;

   // </editor-fold>


   /**
    * Sets up the fixture, for example, open a network connection.
    * This method is called before a test is executed.
    */
   protected function setUp()
   {
      parent::setUp();
      $this->getter = new TestClass1();
      $this->getterSetter = new TestClass2();
   }


   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_get_1a()
   {
      $this->assertSame( 'foo', $this->getter->foo, __METHOD__ . ' 1 fails' );
      $this->assertSame( 'foo', $this->getter->__get('foo'), __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_get_1b()
   {
      $this->assertSame( 'foo', $this->getterSetter->foo, __METHOD__ . ' 1 fails' );
      $this->assertSame( 'foo', $this->getterSetter->__get('foo'), __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_get_2a()
   {
      $this->assertTrue( $this->getter->bar, __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_get_2b()
   {
      $this->assertTrue( $this->getterSetter->bar, __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_get_3a()
   {
      $this->assertSame( 14, $this->getter->bazBlub, __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_get_3b()
   {
      $this->assertSame( 14, $this->getterSetter->bazBlub, __METHOD__ . ' fails' );
   }

   public function test_get_4()
   {
      try { $baz = $this->getter->baz; }
      catch ( Exception $ex )
      {
         $this->assertTrue( ( $ex instanceof LogicException ), __METHOD__ . ' fails' );
         return;
      }
      $this->fail( __METHOD__ . ' fails! Expected LogicException has not been raised.' );
   }

   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_1a()
   {
      $this->assertTrue( isset( $this->getter->foo ), __METHOD__ . ' fails' );
      $this->assertTrue( $this->getter->__isset( 'foo' ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__isset
    */
   public function test_isset_1b()
   {
      $this->assertTrue( isset( $this->getterSetter->foo ), __METHOD__ . ' fails' );
      $this->assertTrue( $this->getterSetter->__isset( 'foo' ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__isset
    */
   public function test_isset_2a()
   {
      $this->assertTrue( isset( $this->getterSetter->bar ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_2b()
   {
      $this->assertTrue( isset( $this->getter->bar ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_3a()
   {
      $this->assertTrue( isset( $this->getterSetter->bazBlub ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_3b()
   {
      $this->assertTrue( isset( $this->getter->bazBlub ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_4a()
   {
      $this->assertFalse( isset( $this->getterSetter->baz ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_4b()
   {
      $this->assertFalse( isset( $this->getter->baz ), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__isset
    * @covers UK\DynamicProperties\ExplicitGetter::__isset
    */
   public function test_isset_4c()
   {
      $this->assertTrue( isset( $this->getterSetter->boing ), __METHOD__ . ' fails' );
   }


   /**
    * @covers UK\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_1a()
   {
      $this->assertTrue( $this->getterSetter->hasReadableProperty( 'foo', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getFoo', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_1b()
   {
      $this->assertTrue( $this->getter->hasReadableProperty( 'foo', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getFoo', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_2()
   {
      $this->assertTrue( $this->getterSetter->hasReadableProperty( 'bar', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getBar', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_3()
   {
      $this->assertTrue( $this->getterSetter->hasReadableProperty( 'bazBlub', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getBazBlub', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::hasReadableProperty
    */
   public function test_hasReadableProperty_4()
   {
      $this->assertFalse( $this->getterSetter->hasReadableProperty( 'baz', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'getBaz', $gName, __METHOD__ . ' 2 fails' );
   }

   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_1()
   {
      $this->assertTrue( $this->getterSetter->hasWritableProperty( 'foo', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setFoo', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_2()
   {
      $this->assertTrue( $this->getterSetter->hasWritableProperty( 'bar', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setBar', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_3()
   {
      $this->assertTrue( $this->getterSetter->hasWritableProperty( 'bazBlub', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setBazBlub', $gName, __METHOD__ . ' 2 fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::hasWritableProperty
    */
   public function test_hasWritableProperty_4()
   {
      $this->assertFalse( $this->getterSetter->hasWritableProperty( 'baz', $gName ), __METHOD__ . ' 1 fails' );
      $this->assertSame( 'setBaz', $gName, __METHOD__ . ' 2 fails' );
   }

   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__set
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_read_write_1()
   {
      $this->getterSetter->foo = 'FOO';
      $this->assertSame( 'FOO', $this->getterSetter->getFoo(), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__set
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_read_write_2()
   {
      $this->getterSetter->bar = false;
      $this->assertFalse( $this->getterSetter->getBar(), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__set
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_read_write_3()
   {
      $this->getterSetter->bazBlub = 1999;
      $this->assertSame( 1999, $this->getterSetter->getBazBlub(), __METHOD__ . ' fails' );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetterSetter::__set
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_read_write_5()
   {
      try { $this->getterSetter->baz = false; }
      catch ( Exception $ex )
      {
         $this->assertTrue( ( $ex instanceof LogicException ), __METHOD__ . ' fails' );
         return;
      }
      $this->fail( __METHOD__ . ' fails! Expected LogicException has not been raised.' );
   }

   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_compare_prop_getter_1()
   {
      $this->assertSame( $this->getterSetter->foo, $this->getterSetter->getFoo() );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_compare_prop_getter_2()
   {
      $this->assertSame( $this->getterSetter->bar, $this->getterSetter->getBar() );
   }
   /**
    * @covers UK\DynamicProperties\ExplicitGetter::__get
    * @covers UK\DynamicProperties\ExplicitGetter::get
    */
   public function test_compare_prop_getter_3()
   {
      $this->assertSame( $this->getterSetter->bazBlub, $this->getterSetter->getBazBlub() );
   }


}