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
	 * Allow for method-style retrieval
	 *
	 * @param $method
	 * @param $arguments
	 * @return mixed
	 */
	public function __call($method, $arguments)
	{
		if (method_exists($this->entity, $method))
		{
			return call_user_func_array([$this->entity, $method], $arguments);
		}

		throw new \Exception("Method not found on presenter or its entity.");
	}

}