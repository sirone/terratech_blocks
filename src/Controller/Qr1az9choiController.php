<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Localization;

ini_set('memory_limit', '512M');

class Qr1az9choiController extends AppController
{
    public function index()
    {
        $this->set('converted', Localization\Converter::read());
    }
}