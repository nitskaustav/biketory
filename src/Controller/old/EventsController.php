<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Templates Controller
 *
 * @property \App\Model\Table\TemplatesTable $Templates
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $templates = $this->paginate($this->Templates);

        $this->set(compact('templates'));
        $this->set('_serialize', ['templates']);
    }

    /**
     * View method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('template', $template);
        $this->set('_serialize', ['template']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $template = $this->Templates->newEntity();
        if ($this->request->is('post')) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(__('The template has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templates->Customers->find('list', ['limit' => 200]);
        $this->set(compact('template', 'customers'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $template = $this->Templates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $template = $this->Templates->patchEntity($template, $this->request->data);
            if ($this->Templates->save($template)) {
                $this->Flash->success(__('The template has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The template could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Templates->Customers->find('list', ['limit' => 200]);
        $this->set(compact('template', 'customers'));
        $this->set('_serialize', ['template']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Template id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $template = $this->Templates->get($id);
        if ($this->Templates->delete($template)) {
            $this->Flash->success(__('The template has been deleted.'));
        } else {
            $this->Flash->error(__('The template could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
