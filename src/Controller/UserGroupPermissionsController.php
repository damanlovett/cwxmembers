<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserGroupPermissions Controller
 *
 * @property \App\Model\Table\UserGroupPermissionsTable $UserGroupPermissions
 *
 * @method \App\Model\Entity\UserGroupPermission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserGroupPermissionsController extends AppController
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
        $userGroupPermissions = $this->paginate($this->UserGroupPermissions);

        $this->set(compact('userGroupPermissions'));
    }

    /**
     * View method
     *
     * @param string|null $id User Group Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => ['UserGroups']
        ]);

        $this->set('userGroupPermission', $userGroupPermission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userGroupPermission = $this->UserGroupPermissions->newEntity();
        if ($this->request->is('post')) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->getData());
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(__('The user group permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user group permission could not be saved. Please, try again.'));
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroupPermission', 'userGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Group Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->getData());
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(__('The user group permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user group permission could not be saved. Please, try again.'));
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroupPermission', 'userGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Group Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userGroupPermission = $this->UserGroupPermissions->get($id);
        if ($this->UserGroupPermissions->delete($userGroupPermission)) {
            $this->Flash->success(__('The user group permission has been deleted.'));
        } else {
            $this->Flash->error(__('The user group permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
