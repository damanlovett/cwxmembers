<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ScheduledEmailRecipients Controller
 *
 * @property \App\Model\Table\ScheduledEmailRecipientsTable $ScheduledEmailRecipients
 *
 * @method \App\Model\Entity\ScheduledEmailRecipient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScheduledEmailRecipientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ScheduledEmails', 'Users']
        ];
        $scheduledEmailRecipients = $this->paginate($this->ScheduledEmailRecipients);

        $this->set(compact('scheduledEmailRecipients'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id, [
            'contain' => ['ScheduledEmails', 'Users']
        ]);

        $this->set('scheduledEmailRecipient', $scheduledEmailRecipient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->newEntity();
        if ($this->request->is('post')) {
            $scheduledEmailRecipient = $this->ScheduledEmailRecipients->patchEntity($scheduledEmailRecipient, $this->request->getData());
            if ($this->ScheduledEmailRecipients->save($scheduledEmailRecipient)) {
                $this->Flash->success(__('The scheduled email recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduled email recipient could not be saved. Please, try again.'));
        }
        $scheduledEmails = $this->ScheduledEmailRecipients->ScheduledEmails->find('list', ['limit' => 200]);
        $users = $this->ScheduledEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmailRecipient', 'scheduledEmails', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledEmailRecipient = $this->ScheduledEmailRecipients->patchEntity($scheduledEmailRecipient, $this->request->getData());
            if ($this->ScheduledEmailRecipients->save($scheduledEmailRecipient)) {
                $this->Flash->success(__('The scheduled email recipient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheduled email recipient could not be saved. Please, try again.'));
        }
        $scheduledEmails = $this->ScheduledEmailRecipients->ScheduledEmails->find('list', ['limit' => 200]);
        $users = $this->ScheduledEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmailRecipient', 'scheduledEmails', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id);
        if ($this->ScheduledEmailRecipients->delete($scheduledEmailRecipient)) {
            $this->Flash->success(__('The scheduled email recipient has been deleted.'));
        } else {
            $this->Flash->error(__('The scheduled email recipient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
