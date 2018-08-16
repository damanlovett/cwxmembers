<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\View;
use Cake\View\ViewBuilder;
/**
 * Shows Controller
 *
 * @property \App\Model\Table\ShowsTable $Shows
 *
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShowsController extends AppController
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
        $userId = $this->UserAuth->getUserId();
        $this->set('userId', $userId);
        $this->paginate = [
            'limit' => 10,
            'order' => ['Show.schedule' => 'asc']
        ];

        $shows = $this->Shows->find('all')
            ->contain(['Months', 'Dropdowns', 'Signups'])
            ->where(['visible' => 1]);

        $this->set('shows', $this->paginate($shows));

        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 2]
        ]);

        $this->set(compact('information'));


        $this->loadModel('Signups');
        $qsignup = $this->Signups->newEntity();
        if ($this->request->is('post')) {
            $qsignup = $this->Signups->patchEntity($qsignup, $this->request->getData());
            if ($this->Signups->save($qsignup)) {
                $this->Flash->success(__('Your signup has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('You have already signed up for this show.'));
        }
    }


    /**
     * Manager method
     *
     * @return \Cake\Http\Response|void
     */
    public function manager()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => ['Show.schedule' => 'asc']
        ];

        $shows = $this->Shows->find('all')
            ->contain(['Months', 'Dropdowns', 'Signups', 'Assignments']);

        $this->set('shows', $this->paginate($shows));

        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 2]
        ]);

        $this->set(compact('information'));


    }

    /**
     * View method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $show = $this->Shows->get($id, [
            'contain' => ['Months', 'Dropdowns', 'Assignments.users', 'Assignments.roles', 'Assignments.roles2', 'Signups', 'Signups.users']
        ]);


        $this->set('show', $show);

        $this->loadModel('Assignments');
        $inshows = $this->Assignments->findAllByCalloutAndShow_id(0, $id)
            ->contain(['Users', 'Roles', 'Roles2'])
            ->order(['Roles.name' => 'asc']);


        $this->set(compact('callouts', 'inshows', 'signlists'));
    }

    /**
     * Mview method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function mview($id = null)
    {
        $show = $this->Shows->get($id, [
            'contain' => ['Months', 'Dropdowns', 'Assignments.users', 'Assignments.roles', 'Assignments.roles2', 'Signups', 'Signups.users']
        ]);


        $this->set('show', $show);

        $this->loadModel('Roles');
        $roles = $this->Roles->find('list', [
            'conditions' => ['Roles.type' => 'support'],
            'order' => ['Roles.name' => 'ASC'],
            'limit' => 200
        ]);
        $roles2 = $this->Roles->find('list', [
            'conditions' => ['Roles.type' => 'player'],
            'order' => ['Roles.name' => 'ASC'],
            'limit' => 200
        ]);

        $this->set(compact('roles', 'roles2'));

        $this->loadModel('Assignments');
        $callouts = $this->Assignments->findAllByCalloutAndShow_id(1, $id)
            ->contain(['Users', 'Roles', 'Roles2']);

        $inshows = $this->Assignments->findAllByCalloutAndShow_id(0, $id)
            ->contain(['Users', 'Roles', 'Roles2'])
            ->where(['Roles.name IS NOT' => 'Roles.name'])
            ->order(['Roles.name' => 'desc']);

        $supportshows = $this->Assignments->findAllByCalloutAndShow_id(0, $id)
            ->contain(['Users', 'Roles', 'Roles2'])
            ->where(['Roles2.name IS NOT' => 'Roles2.name'])
            ->order(['Roles2.name' => 'desc']);

        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }

        $shows = $this->Assignments->Roles->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);


        $this->set(compact('callouts', 'inshows', 'supportshows', 'signlists', 'shows', 'users'));

        $this->loadModel('Signups');
        $query = $this->Signups->findAllByShow_id($id)
            ->contain(['Users', 'Users.userdetails'])
            ->order(['Signups.created' => 'asc']);

        $this->set('signups', $this->paginate($query));


        $signlist = $this->Signups->findByMonth_id($id)->contain([
            'Users' => function ($q) {
                return $q
                    ->select(['first_name', 'last_name']);
            }
        ]);
        $signlist->select([
            'id',
            'user_id',
            'count' => $signlist->func()->count('*')
        ])
            ->order(['count' => 'desc'])
            ->group('user_id');

        $this->set('signlist', $signlist);

    }

    /**
     * export for Mview method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function exsignups($id = null)
    {
        $this->response->download('signups.csv');

        $this->loadModel('Signups');
        $signups = $this->Signups->findAllByShow_id($id)
            ->contain(['Users', 'Users.userdetails'])
            ->order(['Signups.created' => 'asc']);

        $this->set('_serialize', 'signups');
        $this->set('_header', ['Show', 'User', 'test']);
        $this->set('_extract', ['show_id', 'user.last_name', 'Users.user_details.nickname']);
        $this->viewBuilder()->className('CsvView.Csv');

        $this->set('signups', $signups);

    }

    /**
     * Signup method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function signup($id = null)
    {

        $userId = $this->UserAuth->getUserId();
        $show = $this->Shows->get($id, [
            'contain' => ['Months', 'Dropdowns', 'Assignments.users', 'Assignments.roles', 'Assignments.roles2', 'Signups', 'Signups.users']
        ]);

        $this->set('show', $show);

        $this->loadModel('Signups');
        $query = $this->Signups->findAllByShow_id($id)
            ->contain(['Users'])
            ->order(['Signups.created' => 'desc']);

        $mshow = $this->Signups->findByShow_idAndUser_id($id, $userId)
            ->contain(['Shows']);

        $this->set('signups', $this->paginate($query));
        $this->set('mysignup', 'no');

        $signup = $this->Signups->newEntity();
        if ($this->request->is('post')) {
            $signup = $this->Signups->patchEntity($signup, $this->request->getData());
            if ($this->Signups->save($signup)) {
                $this->Flash->success(__('You have signed up for this show.'));
                $this->render('/Shows/signup/', $this->request->id);

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('You have already signed up for this show'));
        }


        //$this->set(compact('signups'));

    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $show = $this->Shows->newEntity();
        if ($this->request->is('post')) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'manager']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $months = $this->Shows->Months->find('list', ['order' => ['first_friday' => 'ASC'], 'limit' => 200]);
        $dropdowns = $this->Shows->Dropdowns->find('list', ['conditions' => ['type' => 'show'], 'order' => ['name' => 'ASC']]);
        $this->set(compact('show', 'months', 'dropdowns'));
    }

    /**
     * Madd method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function madd()
    {
        $show = $this->Shows->newEntity();
        if ($this->request->is('post')) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $this->set(compact('show'));
    }
    public function mcall($id = null)
    {
        $this->loadModel('Assignments');
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The member has status is set as call out.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
    }


    /**
     * Edit method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $show = $this->Shows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'manager']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $months = $this->Shows->Months->find('list', ['limit' => 200]);
        $dropdowns = $this->Shows->Dropdowns->find('list', ['conditions' => ['type' => 'show'], 'order' => ['name' => 'ASC']]);
        $this->set(compact('show', 'months', 'dropdowns'));
    }

    /**
     * Remove method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function remove($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $show = $this->Shows->get($id);
        if ($this->Shows->delete($show)) {
            $this->Flash->success(__('The show has been deleted.'));
        } else {
            $this->Flash->error(__('The show could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    /**
     * Delete method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $show = $this->Shows->get($id);
        if ($this->Shows->delete($show)) {
            $this->Flash->success(__('The show has been deleted.'));
        } else {
            $this->Flash->error(__('The show could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function signupreport($id = null)
    {

        $this->response->download('show_signups.csv');

        $this->loadModel('Signups');
        $datas = $this->Signups->findAllByShow_id($id)
            ->contain(['Users', 'Shows'])
            ->order(['Signups.created' => 'desc'])->toArray();

        $_serialize = 'datas';
        $_header = ['id', 'First', 'Last', 'Schedule'];
        $_extract = ['id', 'user.first_name', 'user.last_name', 'show.schedule'];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;

    }


}