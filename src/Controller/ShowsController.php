<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
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
        $this->paginate = [
            'contain' => ['Months', 'Dropdowns'],
            'limit' => 10,
            'order' => ['Show.schedule'=>'asc']
        ];
        $shows = $this->paginate($this->Shows);

        $this->set(compact('shows'));
    }


    /**
     * Manage method
     *
     * @return \Cake\Http\Response|void
     */
    public function manage()
    {
        $this->paginate = [
            'contain' => ['Months', 'Dropdowns']
        ];
        $shows = $this->paginate($this->Shows);

        $this->set(compact('shows'));
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
            'contain' => ['Months', 'Dropdowns', 'Assignments.users','Assignments.roles', 'Assignments.roles2', 'Signups','Signups.users']
        ]);


        $this->set('show', $show);

        $this->loadModel('Assignments');
        $callouts = $this->Assignments->findAllByCalloutAndShow_id(1,$id)
                    ->contain(['Users','Roles', 'Roles2']);

        $inshows = $this->Assignments->findAllByCalloutAndShow_id(0,$id)
                    ->contain(['Users','Roles', 'Roles2']);


        $this->set(compact('callouts','inshows','signlists'));


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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $months = $this->Shows->Months->find('list', ['order' => ['first_friday' => 'ASC'], 'limit' => 200]);
        $dropdowns = $this->Shows->Dropdowns->find('list', ['conditions' => ['type' => 'show'], 'order' => ['name' => 'ASC'] ]);
        $this->set(compact('show', 'months', 'dropdowns'));
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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $months = $this->Shows->Months->find('list', ['limit' => 200]);
        $dropdowns = $this->Shows->Dropdowns->find('list', ['conditions' => ['type' => 'show'], 'order' => ['name' => 'ASC'] ]);
        $this->set(compact('show', 'months', 'dropdowns'));
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
}
