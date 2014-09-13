<?php

namespace Laracasts\Presenter;

use Laracasts\Presenter\Contracts\PresenterFinderInterface;

class PresenterFinder implements PresenterFinderInterface
{

	/**
	 * @param $object object we want to find the presenter for
	 *
	 * @return string|null return the class name of the found presenter, or null
	 */
	public function getPresenterFor($object)
	{
		$className = get_class($object);

		if (class_exists ($presenter = $className . 'Presenter')) {
			return $presenter;
		}

		return false;
	}
}
