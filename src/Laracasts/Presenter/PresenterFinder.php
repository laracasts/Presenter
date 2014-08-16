<?php

namespace Laracasts\Presenter;

class PresenterFinder
{

    public function getPresenterFor($object)
    {
        $className = get_class($object);
	
	if (class_exists ($presenter = $className . 'Presenter')) {
		return $presenter;
	}

	return null;
    }
}
