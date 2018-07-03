<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Months Controller
 *
 * @property \App\Model\Table\MonthsTable $Months
 *
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonthsController extends AppController
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
        $months = $this->paginate($this->Months);

        $this->set(compact('months'));
    }

    /**
     * View method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function view($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => ['Practices', 'Shows.dropdowns','Shows.months', 'Signups']        ]);

        $this->set('month', $month);

        $this->loadModel('Signups');

$signlist = $this->Signups->findByMonth_id($id)->contain([
    'Users' => function ($q) {
       return $q
            ->select(['first_name','last_name']);}
]);
$signlist->select([
              'id',
              'user_id',
              'count' => $signlist->func()->count('*')
            ])
     ->group('user_id');

        $this->set('signlist', $signlist);

    }

    /**
     * Mview method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function mview($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => ['Practices', 'Shows.dropdowns','Shows.months', 'Signups']        ]);

        $this->set('month', $month);

        $this->loadModel('Signups');

$signlist = $this->Signups->findByMonth_id($id)->contain([
    'Users' => function ($q) {
       return $q
            ->select(['first_name','last_name']);}
]);
$signlist->select([
              'id',
              'user_id',
              'count' => $signlist->func()->count('*')
            ])
     ->group('user_id');

        $this->set('signlist', $signlist);

    }

    public function signups($id = null)
    {

        $userId = $this->UserAuth->getUserId();

        $month = $this->Months->get($id, [
            'contain' => ['Practices', 'Shows.dropdowns','Shows.months', 'Signups']        ]);
        $this->set('month', $month);

        $this->loadModel('Shows');
        $cshow = $this->Shows->findByMonth_id($id)
                    ->contain(['Dropdowns'])
                    ->where(['Dropdowns.name LIKE' =>'%ComedyWorx']);

        $mshow = $this->Shows->findByMonth_id($id)
                    ->contain(['Dropdowns'])
                    ->where(['Dropdowns.name LIKE' =>'%Matinee%']);

        $hshow = $this->Shows->findByMonth_id($id)
                    ->contain(['Dropdowns'])
                    ->where(['Dropdowns.name LIKE' =>'%Show%']);

        $this->set(compact('cshow','mshow','hshow'));

        $this->loadModel('Signups');
        $signups = $this->Signups->findByUser_id($userId)
                    ->contain(['Shows','Shows.dropdowns'])
                    ->where(['Signups.month_id' => $id]);

        $this->set('signups', $this->paginate($signups));


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $month = $this->Months->newEntity();
        if ($this->request->is('post')) {
            $month = $this->Months->patchEntity($month, $this->request->getData());
            if ($this->Months->save($month)) {
                $this->Flash->success(__('The month has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The month could not be saved. Please, try again.'));
        }
        $this->set(compact('month'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $month = $this->Months->patchEntity($month, $this->request->getData());
            if ($this->Months->save($month)) {
                $this->Flash->success(__('The month has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The month could not be saved. Please, try again.'));
        }
        $this->set(compact('month'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $month = $this->Months->get($id);
        if ($this->Months->delete($month)) {
            $this->Flash->success(__('The month has been deleted.'));
        } else {
            $this->Flash->error(__('The month could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
