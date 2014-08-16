<?php

namespace spec\Laracasts\Presenter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Mockery;

class PresenterFinderSpec extends ObjectBehavior
{
	function it_is_initializable()
	{
		$this->shouldHaveType('Laracasts\Presenter\PresenterFinder');
	}

	function it_finds_the_presenter_class_when_it_is_in_the_same_namespace()
	{
		$this->getPresenterFor(new \My\Spec\Test())->shouldBe('My\Spec\TestPresenter');
	}

	function it_returns_null_when_no_presenter_exists()
	{
		$this->getPresenterFor(new \My\Spec\AnotherTest())->shouldBe(null);
	}
}


namespace My\Spec; 

class Test {
	use \Laracasts\Presenter\PresentableTrait;
}

class TestPresenter {
}

class AnotherTest {
	use \Laracasts\Presenter\PresentableTrait;
}
