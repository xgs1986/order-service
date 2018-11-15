<?php
namespace AppBundle\Utils;

/**
 * Classe estructura de los ApiException
 * @author XGS
 *
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