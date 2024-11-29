<?php

namespace spec\Laracasts\Presenter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Laracasts\Presenter\Presenter;

class PresenterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Laracasts\Presenter\ExamplePresenter');
        $this->beConstructedWith(new ExampleEntity);
    }

    function it_retrieves_properties_of_its_entity()
    {
        $foo = $this->foo->shouldEqual('bar');;
    }

    function it_calls_methods_of_its_entity_if_the_method_is_not_defined()
    {
        $this->baz()->shouldReturn(['foo', 'bar']);
    }

    function it_calls_methods_of_its_entity_if_the_method_is_not_defined_and_passes_the_arguments()
    {
        $this->multiply(1, 2, 3)->shouldReturn(6);
    }
}

class ExampleEntity {
    public $foo = 'bar';

    public function baz()
    {
        return ['foo', 'bar'];
    }

    public function multiply($x, $y, $z)
    {
        return $x * $y * $z;
    }
}

class ExamplePresenter extends Presenter {

}