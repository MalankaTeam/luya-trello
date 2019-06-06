# Trello Module
 
## Installation

In order to add the modules to your project go into the modules section of your config:

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