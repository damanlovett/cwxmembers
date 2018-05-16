<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmailRecipients Controller
 *
 * @property \App\Model\Table\UserEmailRecipientsTable $UserEmailRecipients
 *
 * @method \App\Model\Entity\UserEmailRecipient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserEmailRecipientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserEmails', 'Users']
        ];
        $userEmailRecipients = $this->paginate($this->UserEmailRecipients);

        $this->set(compact('userEmailRecipients'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email Recipient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailRecipient = $this->UserEmailRecipients->get($id, [
            'contain' => ['UserEmails', 'Users']
        ]);

        $this->set('userEmailRecipient', $userEmailRecipient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailRecipient = $this->UserEmailRecipients->newEntity();
        if ($this->request->is('post')) {
            $userEmailRecipient = $this->UserEmailRecipients->patchEntity($userEmailRecipient, $this->request->getData());
            if ($this->UserEmailRecipients->save($userEmailRecipient)) {
                $this->Flash->success(__('The user email recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email recipient could not be saved. Please, try again.'));
        }
        $userEmails = $this->UserEmailRecipients->UserEmails->find('list', ['limit' => 200]);
        $users = $this->UserEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailRecipient', 'userEmails', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Recipient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailRecipient = $this->UserEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailRecipient = $this->UserEmailRecipients->patchEntity($userEmailRecipient, $this->request->getData());
            if ($this->UserEmailRecipients->save($userEmailRecipient)) {
                $this->Flash->success(__('The user email recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email recipient could not be saved. Please, try again.'));
        }
        $userEmails = $this->UserEmailRecipients->UserEmails->find('list', ['limit' => 200]);
        $users = $this->UserEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailRecipient', 'userEmails', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Recipient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailRecipient = $this->UserEmailRecipients->get($id);
        if ($this->UserEmailRecipients->delete($userEmailRecipient)) {
            $this->Flash->success(__('The user email recipient has been deleted.'));
        } else {
            $this->Flash->error(__('The user email recipient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
