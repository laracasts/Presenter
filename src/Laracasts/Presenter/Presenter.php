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
	 * Dynamically pass methods to the entity
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters)
	{
		return call_user_func_array([$this->entity, $method], $parameters);
	}

} 