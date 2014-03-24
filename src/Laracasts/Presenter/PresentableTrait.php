<?php namespace Laracasts\Presenter;

use Laracasts\Presenter\Exceptions\PresenterException;

trait PresentableTrait {

    protected $presenterInstance;

    /**
     * @return mixed
     * @throws Exceptions\PresenterException
     */
    public function present()
    {
        if ( ! $this->presenter or ! class_exists($this->presenter))
        {
            throw new PresenterException('Please set the $protected property to your presenter path.');
        }

        if ( ! $this->presenterInstance)
        {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }

} 