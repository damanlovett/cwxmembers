<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserActivities Controller
 *
 * @property \App\Model\Table\UserActivitiesTable $UserActivities
 *
 * @method \App\Model\Entity\UserActivity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserActivitiesController extends AppController
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
        $userActivities = $this->paginate($this->UserActivities);

        $this->set(compact('userActivities'));
    }

    /**
     * View method
     *
     * @param string|null $id User Activity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userActivity = $this->UserActivities->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userActivity', $userActivity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userActivity = $this->UserActivities->newEntity();
        if ($this->request->is('post')) {
            $userActivity = $this->UserActivities->patchEntity($userActivity, $this->request->getData());
            if ($this->UserActivities->save($userActivity)) {
                $this->Flash->success(__('The user activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user activity could not be saved. Please, try again.'));
        }
        $users = $this->UserActivities->Users->find('list', ['limit' => 200]);
        $this->set(compact('userActivity', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Activity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userActivity = $this->UserActivities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userActivity = $this->UserActivities->patchEntity($userActivity, $this->request->getData());
            if ($this->UserActivities->save($userActivity)) {
                $this->Flash->success(__('The user activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user activity could not be saved. Please, try again.'));
        }
        $users = $this->UserActivities->Users->find('list', ['limit' => 200]);
        $this->set(compact('userActivity', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Activity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userActivity = $this->UserActivities->get($id);
        if ($this->UserActivities->delete($userActivity)) {
            $this->Flash->success(__('The user activity has been deleted.'));
        } else {
            $this->Flash->error(__('The user activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
