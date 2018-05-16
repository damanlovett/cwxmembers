<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmails Controller
 *
 * @property \App\Model\Table\UserEmailsTable $UserEmails
 *
 * @method \App\Model\Entity\UserEmail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $userEmails = $this->paginate($this->UserEmails);

        $this->set(compact('userEmails'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmail = $this->UserEmails->get($id, [
            'contain' => ['UserGroups', 'ScheduledEmails', 'UserEmailRecipients']
        ]);

        $this->set('userEmail', $userEmail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmail = $this->UserEmails->newEntity();
        if ($this->request->is('post')) {
            $userEmail = $this->UserEmails->patchEntity($userEmail, $this->request->getData());
            if ($this->UserEmails->save($userEmail)) {
                $this->Flash->success(__('The user email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email could not be saved. Please, try again.'));
        }
        $userGroups = $this->UserEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userEmail', 'userGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmail = $this->UserEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmail = $this->UserEmails->patchEntity($userEmail, $this->request->getData());
            if ($this->UserEmails->save($userEmail)) {
                $this->Flash->success(__('The user email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email could not be saved. Please, try again.'));
        }
        $userGroups = $this->UserEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userEmail', 'userGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmail = $this->UserEmails->get($id);
        if ($this->UserEmails->delete($userEmail)) {
            $this->Flash->success(__('The user email has been deleted.'));
        } else {
            $this->Flash->error(__('The user email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
