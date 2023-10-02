<?php


namespace Modules\Tracking\Parsers;


use UAParser\Parser;

class UserAgentParser
{
    protected static $uaParser;

    public static function getParser(){
        if(!static::$uaParser){
            $parser = Parser::create();

            static::$uaParser = $parser->parse($_SERVER['HTTP_USER_AGENT'] ?? '');
        }
        return static::$uaParser;
    }
    public static function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"] ?? '');
    }
    static function isBot() {

        return (
            isset($_SERVER['HTTP_USER_AGENT'])
            && preg_match('/bot|crawl|slurp|spider|mediapartners/i', $_SERVER['HTTP_USER_AGENT'])
        );
    }
}
