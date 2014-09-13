<?php namespace Laracasts\Presenter;

use Laracasts\Presenter\Contracts\PresenterFinderInterface;
use Laracasts\Presenter\Exceptions\PresenterException;
use App;


trait PresentableTrait {

	/**
	 * View presenter instance
	 *
	 * @var mixed
	 */
	protected $presenterInstance;

	/**
	 * Instance of a presenter finder
	 *
	 * @var PresenterFinderInterface
	 */
	protected $presenterFinder;


	/**
	 * Prepare a new or cached presenter instance
	 *
	 * @return mixed
	 * @throws PresenterException
	 */
	public function present()
	{
		$presenter = $this->getPresenterClass();
		if (false === $presenter)
		{
			throw new PresenterException('Please set the $presenter property to your presenter path.');
		}

		if ( ! $this->presenterInstance)
		{
			$this->presenterInstance = new $presenter($this);
		}

		return $this->presenterInstance;
	}

	/**
	 * get the class name of the presenter class or false
	 *
	 * @return Presenter|bool the class name of the presenter class or false
	 */
	protected function getPresenterClass()
	{
		if ($this->presenterExists($this->presenter)) {
			return $this->presenter;
		}

		if ($this->presenterFinder) {
			return $this->presenterFinder->getPresenterFor($this);
		}

		return false;
	}

	/**
	 * check if a class exists
	 *
	 * @return bool
	 */
	protected function presenterExists($presenter)
	{
		return $presenter && class_exists($presenter);
	}

	/**
	 * Set the presenter finder
	 *
	 * @param PresenterFinderInterface $presenterFinder
	 *
	 * @return $this
	 */
	public function setPresenterFinder(PresenterFinderInterface $presenterFinder = null)
	{
		$this->presenterFinder = $presenterFinder;

		return $this;
	}

	/**
	 * Get the presenter finder
	 *
	 * @return PresenterFinderInterface
	 */
	public function getPresenterFinder()
	{
		return $this->presenterFinder;
	}

}
