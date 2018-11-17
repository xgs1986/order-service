<?php
namespace AppBundle\Utils;

/**
 * Clase con utilidades varias
 */
class Utilities 
{
    private const DEFAULT_FORMAT_DATE = 'Y-m-d H:i:s';
    
    public static function getToday()
    {
        $now = new \DateTime();
        return $now->format(self::DEFAULT_FORMAT_DATE); 
    }
}