<?php
namespace Laracasts\Presenter\Contracts;

interface PresenterFinderInterface
{
	/**
	 * @param $object object we want to find the presenter for
	 *
	 * @return string|false return the class name of the found presenter, or false
	 */
	public function getPresenterFor($object);
}