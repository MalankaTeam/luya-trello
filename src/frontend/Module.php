<?php

namespace malankateam\luya\trello\frontend;

/**
 * Trello Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\base\Module
{
    public static function onLoad()
    {
        self::registerTranslation('trellofrontend', static::staticBasePath() . '/messages', [
            'trellofrontend' => 'main.php',
        ]);
    }

    /**
     * Translat realty messages.
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('trellofrontend', $message, $params);
    }
}