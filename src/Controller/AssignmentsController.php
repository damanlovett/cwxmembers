<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 *
 * @method \App\Model\Entity\Assignment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignmentsController extends AppController
{


    public function beforeFilter(Event $event) {
parent::beforeFilter($event);
$this->viewBuilder()->layout('default2'); // New in 3.1
}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Shows', 'Users', 'Signups', 'Roles', 'Roles2']
        ];
        $assignments = $this->paginate($this->Assignments);

        $this->set(compact('assignments'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => ['Shows', 'Users', 'Signups', 'Roles']
        ]);

        $this->set('assignment', $assignment);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null, $id2=null)
    {
        $id2 = $this->request->getQuery('month');
        $this->loadModel('Shows');
        $show = $this->Shows->get($id, [
            'contain' => ['Months', 'Dropdowns']
        ]);

        $this->set('show', $show);

        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $shows = $this->Assignments->Shows->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);

        $inshows = $this->Assignments->find('all');
        $inshows->select([
              'id',
              'user_id',
              'Users.first_name',
              'Users.last_name',
              'Roles.type',
              'count' => $inshows->func()->count('*')
            ])
     ->where(['Roles.type' => 'player'])
     ->contain(['Users','Roles'])
     ->group('user_id');

        $this->loadModel('Signups');
        $signups = $this->Signups->find('all')
                            ->where(['show_id' => $id])
                            ->contain(['Users']);

        $totals = $this->Signups->find('all')
                            ->where(['month_id' => $id2])
                            ->contain(['Users', 'Months']);

        $roles = $this->Assignments->Roles->find('list', [
                            'order' => ['Roles.name' => 'ASC'],
                            'limit' => 200]);

        $signlist = $this->Signups->find('all');
        $signlist->select([
              'id',
              'user_id',
              'Users.first_name',
              'Users.last_name',
              'month_id',
              'count' => $signlist->func()->count('*')
            ])
        ->where(['month_id' => $id2])
        ->contain(['Users','Months'])
        ->group('user_id');

       // foreach ($Query as $row) {
       //    debug($row);
       // }
        $this->set(compact('assignment', 'shows', 'users', 'signups', 'roles', 'totals', 'signlist', 'inshows'));
    }




    /**
     * Madd method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function madd($id=null, $id2=null)
    {
        $id2 = $this->request->getQuery('month');
        $this->loadModel('Shows');
        $show = $this->Shows->get($id, [
            'contain' => ['Months', 'Dropdowns']
        ]);

        $this->set('show', $show);

        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $shows = $this->Assignments->Shows->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);

        $inshows = $this->Assignments->find('all');
        $inshows->select([
              'id',
              'user_id',
              'Users.first_name',
              'Users.last_name',
              'Roles.type',
              'count' => $inshows->func()->count('*')
            ])
     ->where(['Roles.type' => 'player'])
     ->contain(['Users','Roles'])
     ->group('user_id');

        $this->loadModel('Signups');
        $signups = $this->Signups->find('all')
                            ->where(['show_id' => $id])
                            ->contain(['Users']);

        $totals = $this->Signups->find('all')
                            ->where(['month_id' => $id2])
                            ->contain(['Users', 'Months']);

        $roles = $this->Assignments->Roles->find('list', [
                            'order' => ['Roles.name' => 'ASC'],
                            'limit' => 200]);

        $signlist = $this->Signups->find('all');
        $signlist->select([
              'id',
              'user_id',
              'Users.first_name',
              'Users.last_name',
              'month_id',
              'count' => $signlist->func()->count('*')
            ])
        ->where(['month_id' => $id2])
        ->contain(['Users','Months'])
        ->group('user_id');

       // foreach ($Query as $row) {
       //    debug($row);
       // }
        $this->set(compact('assignment', 'shows', 'users', 'signups', 'roles', 'totals', 'signlist', 'inshows'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $shows = $this->Assignments->Shows->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);
        $signups = $this->Assignments->Signups->find('list', ['limit' => 200]);
        $roles = $this->Assignments->Roles->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'shows', 'users', 'signups', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignment = $this->Assignments->get($id);
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
