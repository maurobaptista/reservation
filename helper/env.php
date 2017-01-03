<?php
if (!function_exists('env')) {
    /**
     * Show a fallback if env($key) is false
     * @param  string $key      
     * @param  mixed  $fallback 
     * @return mixed            
     */
    function env($key, $fallback = false)
    {
        $value = treatEnv($key);
        return ($value) ?: $fallback;
    }
}

if (!function_exists('treatEnv')) {
    /**
     * Adjust type of env value
     * @param  string $key
     * @return mixed            
     */
    function treatEnv($key)
    {
        $value = getenv($key);
        switch ($value) {
            case ($value === 'true' || $value === 'false'):
                settype($value, 'bool'); break;
            case ($value == (string)(float)$value):
                settype($value, 'float'); break;
            case ($value == (string)(int)$value):
                settype($value, 'int'); break;
        }
        return $value;
    }
}