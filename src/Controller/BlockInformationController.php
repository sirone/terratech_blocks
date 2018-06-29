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
namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * ブロック情報表示 controller.
 * This controller will render views from Template/BlockInformation/
 */
class BlockInformationController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }

    public function index()
    {
        $information = TableRegistry::get('information');
        $this->set('information_list',
            $information->find('all')
                        ->select(['id', 'title', 'description', 'InformationCategories.name', 'reserved_at'])
                        ->where(['OR' => [['reserved_at IS NULL'],['reserved_at <= NOW()']]])
                        ->Contain(['InformationCategories'])
                        ->all()
        );

        $corporations = TableRegistry::get('corporations');
        $this->set('corporations',
            $corporations->find('list')
                         ->select(['id', 'name'])
                         ->where(['is_planned ='=>false])
        );

        $categories = TableRegistry::get('categories');
        $this->set('categories', $categories->find('list')
                              ->select(['id', 'name'])
        );

                              
        $blocks = TableRegistry::get('blocks');
        $this->set('blocks', $blocks->find('list'));
    }
}
