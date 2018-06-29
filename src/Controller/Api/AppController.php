<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Api;

use \Cake\Event\Event;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends \App\Controller\AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    public function beforeFilter(Event $event)
    {
        // api 系コントローラは ajax 以外からは呼び出せないようにする.
        parent::beforeFilter($event);
        if (!$this->request->is('ajax')) {
            throw new \Cake\Http\Exception\NotFoundException();
        }
    }
}
