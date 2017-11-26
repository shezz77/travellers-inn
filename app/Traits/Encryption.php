<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 21-Nov-17
 * Time: 9:19 PM
 */

namespace App\Traits;


trait Encryption
{
    private $encrypted = '';
    private $decrypted = '';

    public function encrypt($value)
    {
        $length = strlen($value);
        for ($i = 0; $i<$length; $i++){
            $this->encrypted = $this->encrypted . $value[$i];
            $this->encrypted = $this->encrypted . $this->random(0, 9);
        }

        return $this->encrypted;
    }

    public function random($min, $max)
    {
        return rand($min, $max);
    }

    public function decrypt($value)
    {
        $length = strlen($value);
        for ($i = 0; $i<$length; $i++){
            if ($i % 2 == 0){
                $this->decrypted = $this->decrypted . $value[$i];
            }
            else
            {
                continue;
            }
        }

        return $this->decrypted;
    }
}