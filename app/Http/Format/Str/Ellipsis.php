<?php
    
    namespace Waithira\Passwift\app\Http\Format\Str;
    
    class Ellipsis
    {
        /**
         * @param $data
         * @param $len
         * @return string
         */
        public static function trim($data, $len): string
        {
            /** @var string $data */
            if(!(strlen($data) <= $len))
            {
                $cut = substr($data, 0, $len);
                $end = strpos($cut, '');
                $data = !$end ? (substr($cut, $end)) : substr($cut, 0, $end);
                $data .= " ...";
            }
            /** @var string $data */
            return $data;
        }
    }