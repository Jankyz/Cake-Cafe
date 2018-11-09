<?php
/**
 * Created by PhpStorm.
 * User: Jankyz
 * Date: 07.11.2018
 * Time: 18:36
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->minLength('title', 3)
            ->maxLength('title', 50)
            ->notEmpty('p_desc')
            ->minLength('p_desc', 10);

        return $validator;
    }

    public function validationUpdate($validator)
    {
        $validator
            ->add('title', 'notEmpty', [
                'rule' => 'notEmpty',
                'message' => __('You need to provide a title'),
            ])
            ->add('p_desc', 'notEmpty', [
                'rule' => 'notEmpty',
                'message' => __('A body is required')
            ]);
        return $validator;
    }
}