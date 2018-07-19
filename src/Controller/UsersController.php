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

        $this->loadModel('Assignments');
        $assignments = $this->Assignments->findAllByUser_id(1,$id)
                    ->contain(['Users','Roles', 'Roles2','Shows','Shows.dropdowns']);


        $this->set('assignments', $this->paginate($assignments));


 //       $this->loadModel('Assignments');
  //      $assignments = $this->Assignments->findAllByUser_id($id)->contain([
   //         'Roles' => function ($q) {
    //           return $q
     //               ->select('name');},
      //      'Shows' => function ($q) {
       //        return $q
  //                  ->select('schedule');},
   //     ]);
    //    $assignments->select([
     //                 'id',
      //                'role_id'
       //             ]);

        //        $this->set('assignments', $this->paginate($assignments));

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
            'contain' => ['UserGroups', 'ClubStandings','Assignments', 'Checkins', 'LoginTokens', 'ScheduledEmailRecipients', 'Signups', 'UserActivities', 'UserContacts', 'UserDetails', 'UserEmailRecipients', 'UserEmailSignatures', 'UserEmailTemplates', 'UserSocials']
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
