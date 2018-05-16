<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MemberStandings Controller
 *
 * @property \App\Model\Table\MemberStandingsTable $MemberStandings
 *
 * @method \App\Model\Entity\MemberStanding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MemberStandingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $memberStandings = $this->paginate($this->MemberStandings);

        $this->set(compact('memberStandings'));
    }

    /**
     * View method
     *
     * @param string|null $id Member Standing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $memberStanding = $this->MemberStandings->get($id, [
            'contain' => ['UserDetails']
        ]);

        $this->set('memberStanding', $memberStanding);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $memberStanding = $this->MemberStandings->newEntity();
        if ($this->request->is('post')) {
            $memberStanding = $this->MemberStandings->patchEntity($memberStanding, $this->request->getData());
            if ($this->MemberStandings->save($memberStanding)) {
                $this->Flash->success(__('The member standing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member standing could not be saved. Please, try again.'));
        }
        $this->set(compact('memberStanding'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Member Standing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $memberStanding = $this->MemberStandings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $memberStanding = $this->MemberStandings->patchEntity($memberStanding, $this->request->getData());
            if ($this->MemberStandings->save($memberStanding)) {
                $this->Flash->success(__('The member standing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member standing could not be saved. Please, try again.'));
        }
        $this->set(compact('memberStanding'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Member Standing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $memberStanding = $this->MemberStandings->get($id);
        if ($this->MemberStandings->delete($memberStanding)) {
            $this->Flash->success(__('The member standing has been deleted.'));
        } else {
            $this->Flash->error(__('The member standing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
