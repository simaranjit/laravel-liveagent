# Laravel Liveagent integration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/macsidigital/laravel-liveagent.svg?style=flat-square)](https://packagist.org/packages/macsidigital/laravel-liveagent)
[![Build Status](https://img.shields.io/travis/macsidigital/laravel-liveagent/master.svg?style=flat-square)](https://travis-ci.org/MacsiDigital/laravel-liveagent)
[![StyleCI](https://github.styleci.io/repos/193588958/shield?branch=master)](https://github.styleci.io/repos/193588958)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/MacsiDigital/laravel-liveagent/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/MacsiDigital/laravel-liveagent/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/macsidigital/laravel-liveagent.svg?style=flat-square)](https://packagist.org/packages/macsidigital/laravel-liveagent)

A little Laravel package to communicate with LiveAgent.

## Installation

You can install the package via composer:

```bash
composer require macsidigital/laravel-liveagent
```

The service provider should automatically register for For Laravel > 5.4.

For Laravel < 5.5, open config/app.php and, within the providers array, append:

``` php
MacsiDigital\LiveAgent\Providers\LiveAgentServiceProvider::class
```

## Configuration file

Publish the configuration file

```bash
php artisan vendor:publish --provider="MacsiDigital\LiveAgent\Providers\LiveAgentServiceProvider"
```

This will create a liveagent/config.php within your config directory. Check the LiveAgent documentation for the relevant values in the config.php file.
Ensure that the location of the RSA keys matches.

## Usage

Everything has been setup to be similar to Laravel syntax.

Within the models we have $attributes, $queryAttributes, $createAttributes, $updateAttributes & a $methods array which control what attributes can be set on the model.  SO if query isnt working then first check these arrays.

Also the LiveAgent API is very inconsistant, for example it assigns a different system_name depending on how the you create a contact.  If you create a contact the system_name is the email, if you create a ticket it creates a user that has a system_name of the user name.  And if it requires a useridentifier, this is generally not the id but the email address.

Best to check the documentation at 

[LiveAgent Docs](https://reviseradiology.ladesk.com/docs/api/v3/)

There is a playground there to test the API, sometimes its just a case of playing until you find what is required as the docuemnts dont tell you!!

We also use a little bit of magic to work with LiveAgent's model names.

If the response is anything other than a '200' then we will throw an exception, so use try catch blocks.

So to use the conversation model we would use the following syntax.

``` php
	$liveagent = new \MacsiDigital\LiveAgent\LiveAgent;
	$liveagent->contact->functionName();
```

## Find all

The find all function returns a Laravel Collection so you can use all the Laravel Collection magic

``` php
	$liveagent = new \MacsiDigital\LiveAgent\LiveAgent;
	$contacts = $liveagent->contact->all();
```

## Filtered

The filtered find function returns a Laravel Collection so you can use all the Laravel Collection magic

``` php
	$liveagent = new \MacsiDigital\LiveAgent\LiveAgent;
	$contacts = $liveagent->contact->where('system_name', 'Test Name')->get();
```

To only get a single item use the 'first' method

``` php
	$liveagent = new \MacsiDigital\LiveAgent\LiveAgent;
	$contact = $liveagent->contact->where('system_name', 'Test Name')->first();
```

## Find by ID

Just like Laravel we can use the 'find' method to return a single matched result on the ID

``` php
	$liveagent = new \MacsiDigital\LiveAgent\LiveAgent;
	$contact = $liveagent->contact->find('ID_String');
```

## Creating Items

We can create and update records using the save function.

``` php
	$contact = $liveagent->contact->make([
        'firstname' => 'First Name',
        'lastname' => 'Last Name',
        'registration_email' => 'test@test.com',
    ])->save();
```

or we can use the create shortcut

``` php
	$contact = $liveagent->contact->create([
        'firstname' => 'First Name',
        'lastname' => 'Last Name',
        'registration_email' => 'test@test.com',
    ]);
```

## Resources

At present we have the following resources

* Agent
* Contact
* Department
* Message
* MessageGroup // Returned when you query a tickets messages
* Ticket
* TicketListGroup // Used to create a ticket

We plan to add more resources in the future but setting up additional models is straight forward, below is the department model setup.  If you create any models, then create a pull request and we will add into main repo.

``` php
	namespace MacsiDigital\LiveAgent;

	use MacsiDigital\LiveAgent\Support\Model;

	class Department extends Model
	{
	    const ENDPOINT = 'departments';
	    const NODE_NAME = 'Departments';
	    const KEY_FIELD = 'department_id';

	    protected $methods = ['get'];

	    protected $queryAttributes = [
	        
	    ];

	    protected $attributes = [
	        'department_id' => '',
	        'agent_count' => '',
	        'name' => '',
	        'online_status' => '',
	        'agent_ids' => '',
	        'mailaccount_id' => ''
	    ];

	}
```

### Testing

At present there is no PHP Unit Testing, but we plan to add it in the future.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email colin@macsi.co.uk instead of using the issue tracker.

## Credits

- [Colin Hall](https://github.com/macsidigital)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
