<p align="center">
  <img src="https://raw.githubusercontent.com/luyadev/luya/master/docs/logo/luya-logo-0.2x.png" alt="LUYA Logo"/>
  <div>Integrate with</div> 
  <img width="200" src="https://d2k1ftgv7pobq7.cloudfront.net/meta/u/res/images/brand-assets/Logos/0099ec3754bf473d2bbf317204ab6fea/trello-logo-blue.png" alt="LUYA Logo"/>
</p>

[![Malanka](https://img.shields.io/badge/Powered%20by-Malanka-brightgreen.svg)](https://malanka.pro)
[![Total Downloads](https://poser.pugx.org/malankateam/luya-trello/downloads)](https://packagist.org/packages/malankateam/luya-trello)

# Trello Module

The module integrate LUYA to Trello. The module has different usefull scratch block, CRUD and other feature. You can override 
the ready scratch features from the Luya module.
 
## Installation

Install the module trough composer:

```
composer require malankateam/luya-trello:@dev
```

Add the modules to your project go into the modules section of your config and insert the code:

```php
return [
    'modules' => [
        // ...
        'trellofrontend' => [
            'class' => 'malankateam\luya\trello\frontend\Module',
            'useAppViewPath' => false, // When enabled the views will be looked up in the @app/views folder, otherwise the views shipped with the module will be used.
        ],
        'trelloadmin' => 'malankateam\luya\trello\admin\Module',
        // ...
    ],
];
```

Run the import command afterwards:

```sh
./luya import
```

## Usage

*Usage description*
