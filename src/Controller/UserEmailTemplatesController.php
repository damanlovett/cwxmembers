<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmailTemplates Controller
 *
 * @property \App\Model\Table\UserEmailTemplatesTable $UserEmailTemplates
 *
 * @method \App\Model\Entity\UserEmailTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserEmailTemplatesController extends AppController
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
        $userEmailTemplates = $this->paginate($this->UserEmailTemplates);

        $this->set(compact('userEmailTemplates'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email Template id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailTemplate = $this->UserEmailTemplates->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userEmailTemplate', $userEmailTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailTemplate = $this->UserEmailTemplates->newEntity();
        if ($this->request->is('post')) {
            $userEmailTemplate = $this->UserEmailTemplates->patchEntity($userEmailTemplate, $this->request->getData());
            if ($this->UserEmailTemplates->save($userEmailTemplate)) {
                $this->Flash->success(__('The user email template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email template could not be saved. Please, try again.'));
        }
        $users = $this->UserEmailTemplates->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailTemplate', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailTemplate = $this->UserEmailTemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailTemplate = $this->UserEmailTemplates->patchEntity($userEmailTemplate, $this->request->getData());
            if ($this->UserEmailTemplates->save($userEmailTemplate)) {
                $this->Flash->success(__('The user email template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email template could not be saved. Please, try again.'));
        }
        $users = $this->UserEmailTemplates->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailTemplate', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailTemplate = $this->UserEmailTemplates->get($id);
        if ($this->UserEmailTemplates->delete($userEmailTemplate)) {
            $this->Flash->success(__('The user email template has been deleted.'));
        } else {
            $this->Flash->error(__('The user email template could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
