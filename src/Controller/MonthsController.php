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
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('default2'); // New in 3.1

    }


    public function export()
    {
        $data = [
            ['a', 'b', 'c'],
            [1, 2, 3],
            ['you', 'and', 'me'],
        ];

        $_serialize = 'data';
        $_header = ['Column 1', 'Column 2', 'Column 3'];
        $_footer = ['Totals', '400', '$3000'];

        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('data', '_serialize', '_header', '_footer'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->paginate = [
            'contain' => ['Signups', 'Shows'],
            'limit' => 10,
            'order' => ['Months.first_friday' => 'DESC'],
        ];

        $months = $this->paginate($this->Months);

        $this->set(compact('months'));

        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 2]
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
            'contain' => ['Signups', 'Shows', 'Practices'],
            'limit' => 10,
            'order' => ['Months.first_friday' => 'DESC'],
        ];

        $months = $this->paginate($this->Months);

        $this->set(compact('months'));

        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 2]
        ]);

        $this->set(compact('information'));


    }

    public function signupReport($id = null, $id2 = null)
    {

        $this->response->download("{$id2}_show_signups.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Signups');
        $datas = $this->Signups->find('all')->contain(['Users', 'Shows', 'Shows.dropdowns', 'Months'])->order(['Shows.schedule' => 'asc'])->where(['Signups.month_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Show', 'Date', 'First Name', 'Last Name', 'Email', 'Signed Up On'];
        $_extract = [
            'Dropdowns.name',
            function ($row) {
                $results = date_format($row['show']['schedule'], "M j, Y - g:i a");
                return ($results);
            }, 'user.first_name', 'user.last_name', 'user.email', 'created'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function practiceReport($id = null, $id2 = null)
    {
        $this->response->download("{$id2}_practice_checkins.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Checkins');
        $datas = $this->Checkins->find('all')->contain(['Users', 'Practices'])->order(['Practices.schedule' => 'asc'])->where(['Practices.month_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Practice', 'Date', 'First Name', 'Last Name', 'Email', 'Checked In On', 'Practice Leader'];
        $_extract = [
            'practice.title',
            function ($row) {
                $results = date_format($row['practice']['schedule'], "M j, Y - g:i a");
                return ($results);
            },
            'user.first_name', 'user.last_name', 'user.email', 'created', 'practice.leader'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }


    public function showReport($id = null, $id2 = null)
    {

        $this->response->download("{$id2}_shows.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Shows');
        $datas = $this->Shows->find('all')->contain(['Dropdowns', 'Months'])->order(['Shows.schedule' => 'asc'])->where(['Shows.month_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Show', 'Date', 'Sign Up Open', 'Visible', 'Players Needed', 'Ref Needed', 'Voice Needed', 'Host Needed'];
        $_extract = [
            'dropdown.name',
            function ($row) {
                $results = date_format($row['schedule'], "M j, Y - g:i a");
                return ($results);
            },
            function ($row) {
                if ($row['signups_open'] == 1) $results = 'yes';
                else $results = 'no';
                return ($results);
            }, function ($row) {
                if ($row['visible'] == 1) $results = 'yes';
                else $results = 'no';
                return ($results);
            },
            'players_needed',
            function ($row) {
                if ($row['ref_needed'] == 1) $results = 'yes';
                else $results = 'no';
                return ($results);
            },
            function ($row) {
                if ($row['voice_needed'] == 1) $results = 'yes';
                else $results = 'no';
                return ($results);
            },
            function ($row) {
                if ($row['host_needed'] == 1) $results = 'yes';
                else $results = 'no';
                return ($results);
            }
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }




    public function reporttest($id = null)
    {

        $this->loadModel('Shows');
        $datas = $this->Shows->find('all')->contain(['Dropdowns', 'Months'])->order(['Shows.schedule' => 'asc'])->where(['Shows.month_id' => $id])->toArray();
        $this->set(compact('datas'));

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
        $userId = $this->UserAuth->getUserId();
        $this->set('userId', $userId);

        $month = $this->Months->get($id, [
            'contain' => ['Practices', 'Shows' => ['sort' => ['Shows.schedule' => 'asc']], 'Shows.dropdowns', 'Shows.months', 'Shows.signups', 'Signups', 'Signups.users', 'Signups.shows']
        ]);

        $this->set('month', $month);


        $this->loadModel('Checkins');

        $checkin = $this->Checkins->findByMonth_id($id)->contain([
            'Users' => function ($q) {
                return $q
                    ->select(['first_name', 'last_name']);
            }
        ]);
        $checkin->select([
            'id',
            'user_id',
            'count' => $checkin->func()->count('*')
        ])
            ->group('user_id');

        $this->set('checkin', $checkin);

        $this->loadModel('Signups');

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
            ->group('user_id');

        $this->set('signlist', $signlist);

        $signups = $this->Signups->findByMonth_id($id)->contain([
            'Users' => function ($q) {
                return $q
                    ->select(['first_name', 'last_name']);
            },
            'Shows' => function ($q) {
                return $q
                    ->contain(['Dropdowns'])
                    ->select(['schedule', 'dropdown_id', 'Dropdowns.name']);
            }
        ]);
        $signups->select([
            'id',
            'user_id',
            'month_id',
            'created'
        ]);

        //$this->set('signups', $this->paginate($signups));
        $this->set('signups', $signups);

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
     * Mview method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function mview($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => ['Practices', 'Shows', 'Shows.dropdowns', 'Shows.months', 'Signups']
        ]);

        $months = $this->paginate($this->Months);
        $this->set('month', $month);

        $this->loadModel('Signups');

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
            ->group('user_id');

        $this->set('signlist', $signlist);

        $this->loadModel('Shows');
        $dropdowns = $this->Shows->Dropdowns->find('list', ['conditions' => ['type' => 'show'], 'order' => ['name' => 'ASC']]);
        $this->set(compact('dropdowns'));

        $this->loadModel('StaticPages');
        $information = $this->StaticPages->find('all', [
            'conditions' => ['id' => 2]
        ]);

        $this->set(compact('information'));


        $this->loadModel('Shows');
        $show = $this->Shows->newEntity();
        if ($this->request->is('post')) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'mview', $id]);

            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $this->set(compact('show'));
    }

    public function signups($id = null)
    {

        $userId = $this->UserAuth->getUserId();

        $month = $this->Months->get($id, [
            'contain' => ['Practices', 'Shows.dropdowns', 'Shows.months', 'Signups']
        ]);
        $this->set('month', $month);

        $this->loadModel('Shows');
        $cshow = $this->Shows->findByMonth_id($id)
            ->contain(['Dropdowns'])
            ->where(['Dropdowns.name LIKE' => '%ComedyWorx']);

        $mshow = $this->Shows->findByMonth_id($id)
            ->contain(['Dropdowns'])
            ->where(['Dropdowns.name LIKE' => '%Matinee%']);

        $hshow = $this->Shows->findByMonth_id($id)
            ->contain(['Dropdowns'])
            ->where(['Dropdowns.name LIKE' => '%Show%']);

        $this->set(compact('cshow', 'mshow', 'hshow'));

        $this->loadModel('Signups');
        $signups = $this->Signups->findByUser_id($userId)
            ->contain(['Shows', 'Shows.dropdowns'])
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