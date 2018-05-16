<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dropdowns Controller
 *
 * @property \App\Model\Table\DropdownsTable $Dropdowns
 *
 * @method \App\Model\Entity\Dropdown[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DropdownsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $dropdowns = $this->paginate($this->Dropdowns);

        $this->set(compact('dropdowns'));
    }

    /**
     * View method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dropdown = $this->Dropdowns->get($id, [
            'contain' => ['Shows']
        ]);

        $this->set('dropdown', $dropdown);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dropdown = $this->Dropdowns->newEntity();
        if ($this->request->is('post')) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->getData());
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dropdown = $this->Dropdowns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->getData());
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dropdown = $this->Dropdowns->get($id);
        if ($this->Dropdowns->delete($dropdown)) {
            $this->Flash->success(__('The dropdown has been deleted.'));
        } else {
            $this->Flash->error(__('The dropdown could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
