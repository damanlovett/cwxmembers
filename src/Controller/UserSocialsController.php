<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserSocials Controller
 *
 * @property \App\Model\Table\UserSocialsTable $UserSocials
 *
 * @method \App\Model\Entity\UserSocial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserSocialsController extends AppController
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
        $userSocials = $this->paginate($this->UserSocials);

        $this->set(compact('userSocials'));
    }

    /**
     * View method
     *
     * @param string|null $id User Social id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSocial = $this->UserSocials->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userSocial', $userSocial);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSocial = $this->UserSocials->newEntity();
        if ($this->request->is('post')) {
            $userSocial = $this->UserSocials->patchEntity($userSocial, $this->request->getData());
            if ($this->UserSocials->save($userSocial)) {
                $this->Flash->success(__('The user social has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user social could not be saved. Please, try again.'));
        }
        $users = $this->UserSocials->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSocial', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Social id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSocial = $this->UserSocials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSocial = $this->UserSocials->patchEntity($userSocial, $this->request->getData());
            if ($this->UserSocials->save($userSocial)) {
                $this->Flash->success(__('The user social has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user social could not be saved. Please, try again.'));
        }
        $users = $this->UserSocials->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSocial', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Social id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSocial = $this->UserSocials->get($id);
        if ($this->UserSocials->delete($userSocial)) {
            $this->Flash->success(__('The user social has been deleted.'));
        } else {
            $this->Flash->error(__('The user social could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
