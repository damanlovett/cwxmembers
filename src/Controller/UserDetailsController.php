<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * UserDetails Controller
 *
 * @property \App\Model\Table\UserDetailsTable $UserDetails
 *
 * @method \App\Model\Entity\UserDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserDetailsController extends AppController
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
            'contain' => ['Users', 'MemberStandings']
        ];
        $userDetails = $this->paginate($this->UserDetails);

        $this->set(compact('userDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id User Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userDetail = $this->UserDetails->get($id, [
            'contain' => ['Users', 'MemberStandings']
        ]);

        $this->set('userDetail', $userDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userDetail = $this->UserDetails->newEntity();
        if ($this->request->is('post')) {
            $userDetail = $this->UserDetails->patchEntity($userDetail, $this->request->getData());
            if ($this->UserDetails->save($userDetail)) {
                $this->Flash->success(__('The user detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user detail could not be saved. Please, try again.'));
        }
        $users = $this->UserDetails->Users->find('list', ['limit' => 200]);
        $memberStandings = $this->UserDetails->MemberStandings->find('list', ['limit' => 200]);
        $this->set(compact('userDetail', 'users', 'memberStandings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userDetail = $this->UserDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userDetail = $this->UserDetails->patchEntity($userDetail, $this->request->getData());
            if ($this->UserDetails->save($userDetail)) {
                $this->Flash->success(__('The user detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user detail could not be saved. Please, try again.'));
        }
        $users = $this->UserDetails->Users->find('list', ['limit' => 200]);
        $memberStandings = $this->UserDetails->MemberStandings->find('list', ['limit' => 200]);
        $this->set(compact('userDetail', 'users', 'memberStandings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userDetail = $this->UserDetails->get($id);
        if ($this->UserDetails->delete($userDetail)) {
            $this->Flash->success(__('The user detail has been deleted.'));
        } else {
            $this->Flash->error(__('The user detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
