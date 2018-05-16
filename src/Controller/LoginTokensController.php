<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LoginTokens Controller
 *
 * @property \App\Model\Table\LoginTokensTable $LoginTokens
 *
 * @method \App\Model\Entity\LoginToken[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginTokensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $loginTokens = $this->paginate($this->LoginTokens);

        $this->set(compact('loginTokens'));
    }

    /**
     * View method
     *
     * @param string|null $id Login Token id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loginToken = $this->LoginTokens->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('loginToken', $loginToken);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loginToken = $this->LoginTokens->newEntity();
        if ($this->request->is('post')) {
            $loginToken = $this->LoginTokens->patchEntity($loginToken, $this->request->getData());
            if ($this->LoginTokens->save($loginToken)) {
                $this->Flash->success(__('The login token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login token could not be saved. Please, try again.'));
        }
        $users = $this->LoginTokens->Users->find('list', ['limit' => 200]);
        $this->set(compact('loginToken', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Login Token id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginToken = $this->LoginTokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loginToken = $this->LoginTokens->patchEntity($loginToken, $this->request->getData());
            if ($this->LoginTokens->save($loginToken)) {
                $this->Flash->success(__('The login token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login token could not be saved. Please, try again.'));
        }
        $users = $this->LoginTokens->Users->find('list', ['limit' => 200]);
        $this->set(compact('loginToken', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login Token id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loginToken = $this->LoginTokens->get($id);
        if ($this->LoginTokens->delete($loginToken)) {
            $this->Flash->success(__('The login token has been deleted.'));
        } else {
            $this->Flash->error(__('The login token could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
