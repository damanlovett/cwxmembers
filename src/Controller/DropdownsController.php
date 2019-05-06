<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Dropdowns Controller
 *
 * @property \App\Model\Table\DropdownsTable $Dropdowns
 *
 * @method \App\Model\Entity\Dropdown[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DropdownsController extends AppController
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
        $dropdowns = $this->paginate($this->Dropdowns);

        $this->set(compact('dropdowns'));

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function manager()
    {

        
        $dropdown = $this->Dropdowns->newEntity();
        if ($this->request->is('post')) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->getData());
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
        $dropdowns = $this->paginate($this->Dropdowns);
        $this->set(compact('dropdowns'));

        $shows = $this->Dropdowns->find()
                 ->where(['type LIKE' => '%show%'])
                 ->order(['name' => 'asc'])->toArray();

         $this->set(compact('shows'));

        $players = $this->Dropdowns->find()
                ->where(['type LIKE' => '%player%'])
                ->order(['name' => 'asc'])->toArray();

         $this->set(compact('players'));

        $shirts = $this->Dropdowns->find()
               ->where(['type LIKE' => '%shirt%'])
                ->order(['name' => 'asc'])->toArray();

        $this->set(compact('shirts'));

        $this->loadModel('ClubStandings');
        $clubs = $this->ClubStandings->find('all')
                ->order(['title' => 'asc'])->toArray();

        $this->set(compact('clubs'));


        $this->loadModel('MemberStandings');
        $members = $this->MemberStandings->find()
        ->order(['title' => 'asc'])->toArray();

        $this->set(compact('members'));
    }

    /**
     * View method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dropdown = $this->Dropdowns->get($id, [
            'contain' => ['Shows']
        ]);

        $this->set('dropdown', $dropdown);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dropdown = $this->Dropdowns->newEntity();
        if ($this->request->is('post')) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->getData());
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dropdown = $this->Dropdowns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dropdown = $this->Dropdowns->patchEntity($dropdown, $this->request->getData());
            if ($this->Dropdowns->save($dropdown)) {
                $this->Flash->success(__('The dropdown has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dropdown could not be saved. Please, try again.'));
        }
        $this->set(compact('dropdown'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dropdown id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dropdown = $this->Dropdowns->get($id);
        if ($this->Dropdowns->delete($dropdown)) {
            $this->Flash->success(__('The dropdown has been deleted.'));
        } else {
            $this->Flash->error(__('The dropdown could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}