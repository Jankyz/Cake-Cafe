<?php
/**
 * Created by PhpStorm.
 * User: Jankyz
 * Date: 07.11.2018
 * Time: 18:48
 */

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

/**
 * Class ProductsController
 * @package App\Controller
 */
class ProductsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $products = $this->Paginator->paginate($this->Products->find());
        $this->set(compact('products'));
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('The product is not exist.'));
        }
        $product = $this->Products->findById($id)->firstOrFail();
        if (!$product) {
            throw new NotFoundException(__('The product is not exist.'));
        }
        $this->set(compact('product'));
    }

    public function add()
    {
        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been added.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product adding error!'));
        }
        $this->set('product', $product);
    }

    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('The product is not exist.'));
        }

        $product = $this->Products->findById($id)->firstOrFail();
        if (!$product) {
            throw new NotFoundException(__('The product is not exist.'));
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Your product has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product updating error!'));
        }
        $this->set('product', $product);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->findById($id)->firstOrFail();
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The {0} product has been deleted', $product->title));
            return $this->redirect(['action' => 'index']);
        }
    }
}