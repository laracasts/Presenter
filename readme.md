# Easy View Presenters

So you have those scenarios where a bit of logic needs to be performed before some data (likely from your entity) is displayed from the view.

- Should that logic be hard-coded into the view? **No**.
- Should we instead store the logic in the model? **No again!**

Instead, leverage view presenters. That's what they're for! This package provides one such implementation.

## Install

Pull this package in through Composer.

{
    "require": {
        "laracasts/presenter": "0.1.*"
    }
}

## Usage

The first step is to store your presenters somewhere - anywhere. These will be simple objects that do nothing more than format data, as required.

Here's an example of a presenter.

```php
use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function fullName()
    {
        return $this->first . ' ' . $this->last;
    }

    public function accountAge()
    {
        return $this->created_at->diffForHumans();
    }

}
```

Next, on your entity, pull in the `Laracasts\Presenter\PresentableTrait` trait, which will automatically instantiate your presenter class.

Here's an example - maybe a Laravel `User` model.

```php
<?php

use Laracasts\Presenter\PresentableTrait;

class User extends \Eloquent {

    use PresentableTrait;

    protected $presenter = 'UserPresenter';

}
```

That's it! You're done. Now, within your view, you can do:

```php
    <h1>Hello, {{ $user->present()->fullName }}</h1>
```

Notice how the call to the `present()` method (which will return your new or cached presenter object) also provides the benefit of making it perfectly clear where you must go, should you need to modify how a full name is displayed on the page.

Have fun!

- Jeffrey
[https://laracasts.com](https://laracasts.com)