<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Practices Controller
 *
 * @property \App\Model\Table\PracticesTable $Practices
 *
 * @method \App\Model\Entity\Practice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PracticesController extends AppController
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
            'limit' => 10,
            'order' => ['Practices.schedule' => 'asc'],
            'conditions' => ['visible' => 1],
            'contain' => ['Months']
        ];
        $practices = $this->paginate($this->Practices);

        $this->set(compact('practices'));
        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 3]
        ]);

        $this->set(compact('information'));


    }


    /**
     * dashboard method
     *
     * @return \Cake\Http\Response|void
     */
    public function dashboard()
    {
        $this->viewBuilder()->setLayout('guest');
        $this->paginate = [
            'limit' => 10,
            'order' => ['Practices.schedule' => 'asc'],
            'conditions' => ['visible' => 1],
            'contain' => ['Months']
        ];
        $practices = $this->paginate($this->Practices);

        $this->set(compact('practices'));
        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 3]
        ]);

        $this->set(compact('information'));


    }
    /**
     * grid method
     *
     * @return \Cake\Http\Response|void
     */
    public function grid()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => ['Practices.schedule' => 'asc'],
            'conditions' => ['visible' => 1],
            'contain' => ['Months']
        ];
        $practices = $this->paginate($this->Practices);

        $this->set(compact('practices'));
        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 3]
        ]);

        $this->set(compact('information'));


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
            'order' => ['Practices.schedule' => 'asc'],
            'contain' => ['Months']
        ];
        $practices = $this->paginate($this->Practices);

        $this->set(compact('practices'));

        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 3]
        ]);

        $this->set(compact('information'));

    }

    /**
     * View method
     *
     * @param string|null $id Practice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $practice = $this->Practices->get($id, [
            'contain' => ['Months', 'Checkins.users']
        ]);

        $this->set('practice', $practice);
    }

    /**
     * Mview method
     *
     * @param string|null $id Practice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function mview($id = null)
    {
        $practice = $this->Practices->get($id, [
            'contain' => ['Months', 'Checkins.users']
        ]);

        $this->set('practice', $practice);
    }

    /**
     * Checkin method
     *
     * @param string|null $id Practice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function checkin($id = null)
    {
        $this->viewBuilder()->setLayout('guest');
        $practice = $this->Practices->get($id, [
            'contain' => ['Months', 'Checkins']
        ]);

        $this->set('practice', $practice);



        $this->loadModel('Checkins');
        $checkin = $this->Checkins->newEntity();
        if ($this->request->is('post')) {
            $checkin = $this->Checkins->patchEntity($checkin, $this->request->getData());
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success(__('The checkin has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The checkin could not be saved. Please, try again.'));
        }

        $this->paginate = [
            'contain' => ['Practices', 'Users']
        ];
        //$checkins = $this->paginate($this->Checkins);
        $checkins = $this->Checkins->find('all', [
            'contain' => ['Users'],
            'conditions' => ['practice_id' => $id]
        ]);

// In a controller or table method.
//    'conditions' => ['Articles.created >' => new DateTime('-10 days')],
//    'contain' => ['Authors', 'Comments'],
 //   'limit' => 10
//]);


        $this->set(compact('checkins'));

        $users = $this->Checkins->Users->find('list', ['limit' => 200, 'order' => ['Users.last_name' => 'asc']]);
        $this->set(compact('checkin', 'checkins', 'users'));



    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $practice = $this->Practices->newEntity();
        if ($this->request->is('post')) {
            $practice = $this->Practices->patchEntity($practice, $this->request->getData());
            if ($this->Practices->save($practice)) {
                $this->Flash->success(__('The practice has been saved.'));

                return $this->redirect(['action' => 'manager']);
            }
            $this->Flash->error(__('The practice could not be saved. Please, try again.'));
        }
        $months = $this->Practices->Months->find('list', ['limit' => 200]);
        $this->set(compact('practice', 'months'));
    }

    /**
     * Madd method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function madd()
    {
        $practice = $this->Practices->newEntity();
        if ($this->request->is('post')) {
            $practice = $this->Practices->patchEntity($practice, $this->request->getData());
            if ($this->Practices->save($practice)) {
                $this->Flash->success(__('The practice has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The practice could not be saved. Please, try again.'));
        }
        $this->set(compact('practice'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Practice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $practice = $this->Practices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $practice = $this->Practices->patchEntity($practice, $this->request->getData());
            if ($this->Practices->save($practice)) {
                $this->Flash->success(__('The practice has been saved.'));

                return $this->redirect(['action' => 'manager']);
            }
            $this->Flash->error(__('The practice could not be saved. Please, try again.'));
        }
        $months = $this->Practices->Months->find('list', ['limit' => 200]);
        $this->set(compact('practice', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Practice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $practice = $this->Practices->get($id);
        if ($this->Practices->delete($practice)) {
            $this->Flash->success(__('The practice has been deleted.'));
        } else {
            $this->Flash->error(__('The practice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'manager']);
    }
}