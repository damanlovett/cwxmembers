<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Signups Controller
 *
 * @property \App\Model\Table\SignupsTable $Signups
 *
 * @method \App\Model\Entity\Signup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SignupsController extends AppController
{

    public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
            $this->viewBuilder()->layout('default2'); // New in 3.1
        }

        //Don't forget to add use Cake\Event\Event;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Shows', 'Users']
        ];
        $signups = $this->paginate($this->Signups);

        $this->set(compact('signups'));
    }

    /**
     * View method
     *
     * @param string|null $id Signup id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $signup = $this->Signups->get($id, [
            'contain' => ['Shows', 'Users', 'Assignments','Months']
        ]);

        $this->set('signup', $signup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $signup = $this->Signups->newEntity();
        if ($this->request->is('post')) {
            $signup = $this->Signups->patchEntity($signup, $this->request->getData());
            if ($this->Signups->save($signup)) {
                $this->Flash->success(__('The signup has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The signup could not be saved. Please, try again.'));
        }
        $shows = $this->Signups->Shows->find('list', ['limit' => 200]);
        $users = $this->Signups->Users->find('list', ['limit' => 200]);
        $months = $this->Signups->Months->find('list', ['limit' => 200]);
        $this->set(compact('signup', 'shows', 'users', 'months'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Signup id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $signup = $this->Signups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $signup = $this->Signups->patchEntity($signup, $this->request->getData());
            if ($this->Signups->save($signup)) {
                $this->Flash->success(__('The signup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The signup could not be saved. Please, try again.'));
        }
        $shows = $this->Signups->Shows->find('list', ['limit' => 200]);
        $users = $this->Signups->Users->find('list', ['limit' => 200]);
        $months = $this->Signups->Months->find('list', ['limit' => 200]);
        $this->set(compact('signup', 'shows', 'users', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Signup id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $signup = $this->Signups->get($id);
        if ($this->Signups->delete($signup)) {
            $this->Flash->success(__('The signup has been deleted.'));
        } else {
            $this->Flash->error(__('The signup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /**
     * Remove method
     *
     * @param string|null $id Signup id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function remove($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $signup = $this->Signups->get($id);
        if ($this->Signups->delete($signup)) {
            $this->Flash->success(__('The signup has been deleted.'));
        } else {
            $this->Flash->error(__('The signup could not be deleted. Please, try again.'));
        }

                return $this->redirect($this->referer());
    }
}
