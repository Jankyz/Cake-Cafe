<?php
/**
 * Created by PhpStorm.
 * User: Jankyz
 * Date: 07.11.2018
 * Time: 18:45
 */

namespace App\Model\Entity;


use Cake\ORM\Entity;

class Product extends Entity
{
    protected $_accessible = [
        'id' => true,
        'title' => true,
        'p_desc' => true,
        'created' => true
    ];
}