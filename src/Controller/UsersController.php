<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
            'contain' => ['UserGroups', 'ClubStandings']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * Manager method
     *
     * @return \Cake\Http\Response|void
     */
    public function manager()
    {
        $this->paginate = [
            'contain' => ['UserGroups', 'ClubStandings']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * Me method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function me()
    {
        $id = $this->UserAuth->getUserId();
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups', 'UserDetails.MemberStandings', 'Assignments', 'Checkins', 'LoginTokens', 'ScheduledEmailRecipients', 'Signups', 'UserActivities', 'UserContacts', 'UserDetails', 'UserEmailRecipients', 'UserEmailSignatures', 'UserEmailTemplates', 'UserSocials']
        ]);

        $this->set('user', $user);

        $this->loadModel('ClubStandings');
        $standing = $this->ClubStandings->getTitleById($user['club_standing_id']);
        $this->set('standing', $standing);

        $this->loadModel('Assignments');
        $assignments = $this->Assignments->findAllByUser_id($id)
            ->contain(['Users', 'Roles', 'Roles2', 'Shows', 'Shows.dropdowns']);

        $this->set('assignments', $this->paginate($assignments));

        $this->loadModel('Checkins');
        $checkins = $this->Checkins->findAllByUser_id($id)
            ->contain(['Practices']);

        $this->set('checkins', $this->paginate($checkins));

        $this->loadModel('Signups');
        $signups = $this->Signups->findAllByUser_id($id)
            ->contain(['Shows', 'Shows.dropdowns'])
            ->order(['schedule' => 'DESC']);

        $this->set('signups', $signups);

    }

    public function signupReport()
    {
        $id = $this->UserAuth->getUserId();
        $this->response->download("my_show_signups.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Signups');
        $datas = $this->Signups->find('all')->contain(['Users', 'Shows', 'Shows.dropdowns', 'Months'])->order(['Shows.schedule' => 'asc'])->where(['Signups.user_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Show', 'Date', 'Signed Up On'];
        $_extract = [
            'Dropdowns.name',
            function ($row) {
                $results = date_format($row['show']['schedule'], "M j, Y - g:i a");
                return ($results);
            }, 'created'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function signupDownload($id = null)
    {
        $this->response->download("member_signups.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Signups');
        $datas = $this->Signups->find('all')->contain(['Users', 'Shows', 'Shows.dropdowns', 'Months'])->order(['Shows.schedule' => 'asc'])->where(['Signups.user_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Show', 'Date', 'Signed Up On'];
        $_extract = [
            'Dropdowns.name',
            function ($row) {
                $results = date_format($row['show']['schedule'], "M j, Y - g:i a");
                return ($results);
            }, 'created'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function assignmentReport()
    {
        $id = $this->UserAuth->getUserId();
        $this->response->download("my_show_assignments.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Assignments');
        $datas = $this->Assignments->find('all')->contain(['Users', 'Shows', 'Shows.dropdowns', 'Roles', 'Roles2'])->order(['Shows.schedule' => 'asc'])->where(['Assignments.user_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Show', 'Date', 'Signed Up On', '1', '2'];
        $_extract = [
            'Dropdowns.name',
            function ($row) {
                $results = date_format($row['show']['schedule'], "M j, Y - g:i a");
                return ($results);
            }, 'created', 'role.name', 'roles2.name'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function practiceReport()
    {
        $id = $this->UserAuth->getUserId();
        $this->response->download("my_practice_checkins.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Checkins');
        $datas = $this->Checkins->find('all')->contain(['Users', 'Practices'])->order(['Practices.schedule' => 'asc'])->where(['user_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Practice', 'Date', 'Checked In On', 'Practice Leader'];
        $_extract = [
            'practice.title',
            function ($row) {
                $results = date_format($row['practice']['schedule'], "M j, Y - g:i a");
                return ($results);
            },
            'created', 'practice.leader'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function practiceCheckins($id = null)
    {
        $this->response->download("member_practice_checkins.csv");

        //$datas = $this->Memberships->find('all')->contain('Users')->where(['Memberships.processed' => $id])->toArray();
        $this->loadModel('Checkins');
        $datas = $this->Checkins->find('all')->contain(['Users', 'Practices'])->order(['Practices.schedule' => 'asc'])->where(['user_id' => $id])->toArray();

        $_serialize = 'datas';
        $_header = ['Practice', 'Date', 'Checked In On', 'Practice Leader'];
        $_extract = [
            'practice.title',
            function ($row) {
                $results = date_format($row['practice']['schedule'], "M j, Y - g:i a");
                return ($results);
            },
            'created', 'practice.leader'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }



    public function phoneBook()
    {
        $this->response->download("cwx_phonebook.csv");
        $this->loadModel('UserDetails');
        $datas = $this->UserDetails->find('all')->contain(['Users', 'MemberStandings'])->order(['Users.last_name' => 'asc'])->toArray();

        $_serialize = 'datas';
        $_header = ['Last Name', 'First Name', 'Status', 'Year', 'Phone #', 'e-mail'];
        $_extract = [
            'user.last_name', 'user.first_name',
            function ($row) {
                $results = $row['member_standing']['title'];
                return ($results);
            },
            function ($row) {
                $results = date_format($row['starting_year'], "Y");
                return ($results);
            }, 'cellphone', 'user.email'
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }


    public function members($id = null)
    {
        $this->loadModel('UserDetails');
        if ($id == 0) {
            $this->response->download("all_members.csv");
            $datas = $this->UserDetails->find('all')->contain(['Users', 'MemberStandings'])->order(['Users.last_name' => 'asc'])->toArray();
        } else {
            $this->response->download("active_members.csv");
            $datas = $this->UserDetails->find('all')->contain(['Users', 'MemberStandings'])->order(['Users.last_name' => 'asc'])->where(['Users.active' => $id])->toArray();
        }

        $_serialize = 'datas';
        $_header = ['Last Name', 'First Name', 'Status', 'Active', 'Year', 'Phone #', 'e-mail', 'Birthday', 'Shirt Size', 'Jersey', 'Nickname', 'Referee', 'Voice/DJ', 'Host', 'Attestation Form', 'ABC Certification'];
        $_extract = [
            'user.last_name', 'user.first_name',
            function ($row) {
                $results = $row['member_standing']['title'];
                return ($results);
            },
            function ($row) {
                if ($row['user']['active'] == 1) {
                    $results = 'Yes';
                } else {
                    $results = 'No';
                }
                return ($results);
            },
            function ($row) {
                $results = date_format($row['starting_year'], "Y");
                return ($results);
            }, 'cellphone', 'user.email', 'user.bday', 'user.shirt', 'jersey', 'nickname',
            function ($row) {
                if ($row['referee'] == 1) {
                    $results = 'Yes';
                } else {
                    $results = 'No';
                }
                return ($results);
            },
            function ($row) {
                if ($row['voice'] == 1) {
                    $results = 'Yes';
                } else {
                    $results = 'No';
                }
                return ($results);
            },
            function ($row) {
                if ($row['host'] == 1) {
                    $results = 'Yes';
                } else {
                    $results = 'No';
                }
                return ($results);
            },
            function ($row) {
                if (!empty($row['harassment'])) {
                    $results = $row['harassment'];
                } else {
                    $results = 'Not Completed';
                }
                return ($results);
            },
            function ($row) {
                if (!empty($row['abc'])) {
                    $results = $row['abc'];
                } else {
                    $results = 'Not Completed';
                }
                return ($results);
            }
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    public function harassmentABC()
    {
        $this->loadModel('UserDetails');
        $this->response->download("harassment_abc.csv");
        $datas = $this->UserDetails->find('all')->contain(['Users', 'MemberStandings'])->order(['Users.last_name' => 'asc'])->toArray();

        $_serialize = 'datas';
        $_header = ['Last Name', 'First Name', 'Status', 'Active', 'Attestation Form', 'ABC Certification'];
        $_extract = [
            'user.last_name', 'user.first_name',
            function ($row) {
                $results = $row['member_standing']['title'];
                return ($results);
            },
            function ($row) {
                if ($row['user']['active'] == 1) {
                    $results = 'Yes';
                } else {
                    $results = 'No';
                }
                return ($results);
            },
            function ($row) {
                if (!empty($row['harassment'])) {
                    $results = $row['harassment'];
                } else {
                    $results = 'Not Completed';
                }
                return ($results);
            },
            function ($row) {
                if (!empty($row['abc'])) {
                    $results = $row['abc'];
                } else {
                    $results = 'Not Completed';
                }
                return ($results);
            }
        ];
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('datas', '_serialize', '_header', '_extract'));
        return;
    }

    /**
     * Mview method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function mview($id = null)
    {

        $id = $this->UserAuth->getUserId();

        $user = $this->Users->get($id, [
            'contain' => ['UserGroups', 'ClubStandings', 'Assignments', 'Checkins', 'LoginTokens', 'ScheduledEmailRecipients', 'Signups', 'UserActivities', 'UserContacts', 'UserDetails', 'UserEmailRecipients', 'UserEmailSignatures', 'UserEmailTemplates', 'UserSocials']
        ]);
        $this->set('user', $user);

        $this->loadModel('UserDetails');
        $membership = $this->UserDetails->findByUser_id($id)
            ->contain(['MemberStandings']);


        $this->set('membership', $membership);




    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups', 'ClubStandings', 'Assignments', 'Checkins', 'LoginTokens', 'ScheduledEmailRecipients', 'Signups', 'UserActivities', 'UserContacts', 'UserDetails', 'UserEmailRecipients', 'UserEmailSignatures', 'UserEmailTemplates', 'UserSocials']
        ]);

        $this->set('user', $user);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $clubStandings = $this->Users->ClubStandings->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userGroups', 'clubStandings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $clubStandings = $this->Users->ClubStandings->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userGroups', 'clubStandings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}