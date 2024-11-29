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

		try
		{
			return $this->entity->{$property};
		}
		catch(\LogicException $e)
		{
			// While trying to access an unavailable relationship as
			// an existing model method, Laravel Eloquent (getRelationshipFromMethod) 
			// may throw a LogicException, with the message
			//  "Relationship method must return an object of type
			//   Illuminate\Database\Eloquent\Relations\Relation",
			// ignore it and try to call the actual method.
		}

		if (method_exists($this->entity, $property))
		{
			return $this->entity->{$property}();
		}

		return null;
	}

} 
