![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-settings-hub/master/arts/3x1io-tomato-settings-hub.jpg)

# Filament Settings Hub

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-settings-hub/version.svg)](https://packagist.org/packages/tomatophp/filament-settings-hub)
[![License](https://poser.pugx.org/tomatophp/filament-settings-hub/license.svg)](https://packagist.org/packages/tomatophp/filament-settings-hub)
[![Downloads](https://poser.pugx.org/tomatophp/filament-settings-hub/d/total.svg)](https://packagist.org/packages/tomatophp/filament-settings-hub)

Manage your Filament app settings with GUI and helpers

## Screenshots

![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-settings-hub/master/arts/settings-hub.png)
![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-settings-hub/master/arts/setting-page.png)


## Installation

```bash
composer require tomatophp/filament-settings-hub
```

now you need to publish and migrate settings table

```bash
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
```

after publish and migrate settings table please run this command

```bash
php artisan filament-settings-hub:install
```

finally reigster the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

```php
->plugin(
    \TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin::make()
        ->allowLocationSettings()
        ->allowSiteSettings()
        ->allowSocialMenuSettings()
)
```

## Usage

you can use this package by use this helper function

```php
settings($key);
```

to register new setting to the hub page you can use Facade class on your provider like this

```php
use TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;

FilamentSettingsHub::register([
    SettingHold::make()
        ->order(2)
        ->label('Site Settings') // to translate label just use direct translation path like `messages.text.name`
        ->icon('heroicon-o-globe-alt')
        ->route('filament.admin.pages.site-settings') // use page / route
        ->page(\TomatoPHP\FilamentSettingsHub\Pages\SiteSettings::class) // use page / route 
        ->description('Name, Logo, Site Profile') // to translate label just use direct translation path like `messages.text.name`
        ->group('General') // to translate label just use direct translation path like `messages.text.name`,
]);

```

and now you can see your settings on the setting hub page.

we have a ready to use helper for currency settings

```php
dollar($amount)
```

it will return the money amount with the currency symbol

## Allow Shield 

to allow [filament-shield](https://github.com/bezhanSalleh/filament-shield) for the settings please install it and config it first then you can use this method

```php
->plugin(
    \TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin::make()
        ->allowShield()
)
```

to make a secure setting page just use this trait 

```php
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;
```

## Publish Assets

you can publish config file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-config"
```

you can publish views file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-views"
```

you can publish languages file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-lang"
```

you can publish migrations file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-migrations"
```

## Other Filament Packages

Checkout our [Awesome TomatoPHP](https://github.com/tomatophp/awesome)
