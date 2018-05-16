<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmailSignatures Controller
 *
 * @property \App\Model\Table\UserEmailSignaturesTable $UserEmailSignatures
 *
 * @method \App\Model\Entity\UserEmailSignature[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserEmailSignaturesController extends AppController
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
        $userEmailSignatures = $this->paginate($this->UserEmailSignatures);

        $this->set(compact('userEmailSignatures'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email Signature id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailSignature = $this->UserEmailSignatures->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userEmailSignature', $userEmailSignature);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailSignature = $this->UserEmailSignatures->newEntity();
        if ($this->request->is('post')) {
            $userEmailSignature = $this->UserEmailSignatures->patchEntity($userEmailSignature, $this->request->getData());
            if ($this->UserEmailSignatures->save($userEmailSignature)) {
                $this->Flash->success(__('The user email signature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email signature could not be saved. Please, try again.'));
        }
        $users = $this->UserEmailSignatures->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailSignature', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Signature id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailSignature = $this->UserEmailSignatures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailSignature = $this->UserEmailSignatures->patchEntity($userEmailSignature, $this->request->getData());
            if ($this->UserEmailSignatures->save($userEmailSignature)) {
                $this->Flash->success(__('The user email signature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email signature could not be saved. Please, try again.'));
        }
        $users = $this->UserEmailSignatures->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailSignature', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Signature id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailSignature = $this->UserEmailSignatures->get($id);
        if ($this->UserEmailSignatures->delete($userEmailSignature)) {
            $this->Flash->success(__('The user email signature has been deleted.'));
        } else {
            $this->Flash->error(__('The user email signature could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
