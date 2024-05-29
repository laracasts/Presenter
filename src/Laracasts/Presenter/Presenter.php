<?php namespace Laracasts\Presenter;

abstract class Presenter {

	/**
	 * @var mixed
	 */
	protected $entity;

	/**
	 * @param $entity
	 */
	function __construct($entity)
	{
		$this->entity = $entity;
	}

	/**
	 * Allow for property-style retrieval
	 *
	 * @param $property
	 * @return mixed
	 */
	public function __get($property)
	{
		if (method_exists($this, $property))
		{
			return $this->{$property}();
		}

		return $this->entity->{$property};
	}


	/**
	 * Provide compatibility for the 'or' syntax in Blade templates
	 *
	 * @param $property
	 * @return boolean
	 */
	public function __isset($property)
	{
		return method_exists($this, $property);
	}

} 
