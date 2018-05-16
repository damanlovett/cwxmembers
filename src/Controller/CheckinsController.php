<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Checkins Controller
 *
 * @property \App\Model\Table\CheckinsTable $Checkins
 *
 * @method \App\Model\Entity\Checkin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CheckinsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Practices', 'Users']
        ];
        $checkins = $this->paginate($this->Checkins);

        $this->set(compact('checkins'));
    }

    /**
     * View method
     *
     * @param string|null $id Checkin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $checkin = $this->Checkins->get($id, [
            'contain' => ['Practices', 'Users']
        ]);

        $this->set('checkin', $checkin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $checkin = $this->Checkins->newEntity();
        if ($this->request->is('post')) {
            $checkin = $this->Checkins->patchEntity($checkin, $this->request->getData());
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success(__('The checkin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The checkin could not be saved. Please, try again.'));
        }
        $practices = $this->Checkins->Practices->find('list', ['limit' => 200]);
        $users = $this->Checkins->Users->find('list', ['limit' => 200]);
        $this->set(compact('checkin', 'practices', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Checkin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $checkin = $this->Checkins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkin = $this->Checkins->patchEntity($checkin, $this->request->getData());
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success(__('The checkin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The checkin could not be saved. Please, try again.'));
        }
        $practices = $this->Checkins->Practices->find('list', ['limit' => 200]);
        $users = $this->Checkins->Users->find('list', ['limit' => 200]);
        $this->set(compact('checkin', 'practices', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Checkin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $checkin = $this->Checkins->get($id);
        if ($this->Checkins->delete($checkin)) {
            $this->Flash->success(__('The checkin has been deleted.'));
        } else {
            $this->Flash->error(__('The checkin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
