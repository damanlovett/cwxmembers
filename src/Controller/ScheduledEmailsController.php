<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ScheduledEmails Controller
 *
 * @property \App\Model\Table\ScheduledEmailsTable $ScheduledEmails
 *
 * @method \App\Model\Entity\ScheduledEmail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScheduledEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserEmails', 'UserGroups']
        ];
        $scheduledEmails = $this->paginate($this->ScheduledEmails);

        $this->set(compact('scheduledEmails'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheduled Email id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheduledEmail = $this->ScheduledEmails->get($id, [
            'contain' => ['UserEmails', 'UserGroups', 'ScheduledEmailRecipients']
        ]);

        $this->set('scheduledEmail', $scheduledEmail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheduledEmail = $this->ScheduledEmails->newEntity();
        if ($this->request->is('post')) {
            $scheduledEmail = $this->ScheduledEmails->patchEntity($scheduledEmail, $this->request->getData());
            if ($this->ScheduledEmails->save($scheduledEmail)) {
                $this->Flash->success(__('The scheduled email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduled email could not be saved. Please, try again.'));
        }
        $userEmails = $this->ScheduledEmails->UserEmails->find('list', ['limit' => 200]);
        $userGroups = $this->ScheduledEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmail', 'userEmails', 'userGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheduled Email id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheduledEmail = $this->ScheduledEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledEmail = $this->ScheduledEmails->patchEntity($scheduledEmail, $this->request->getData());
            if ($this->ScheduledEmails->save($scheduledEmail)) {
                $this->Flash->success(__('The scheduled email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduled email could not be saved. Please, try again.'));
        }
        $userEmails = $this->ScheduledEmails->UserEmails->find('list', ['limit' => 200]);
        $userGroups = $this->ScheduledEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmail', 'userEmails', 'userGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheduled Email id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheduledEmail = $this->ScheduledEmails->get($id);
        if ($this->ScheduledEmails->delete($scheduledEmail)) {
            $this->Flash->success(__('The scheduled email has been deleted.'));
        } else {
            $this->Flash->error(__('The scheduled email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
