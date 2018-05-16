<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClubStandings Controller
 *
 * @property \App\Model\Table\ClubStandingsTable $ClubStandings
 *
 * @method \App\Model\Entity\ClubStanding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClubStandingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $clubStandings = $this->paginate($this->ClubStandings);

        $this->set(compact('clubStandings'));
    }

    /**
     * View method
     *
     * @param string|null $id Club Standing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clubStanding = $this->ClubStandings->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('clubStanding', $clubStanding);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clubStanding = $this->ClubStandings->newEntity();
        if ($this->request->is('post')) {
            $clubStanding = $this->ClubStandings->patchEntity($clubStanding, $this->request->getData());
            if ($this->ClubStandings->save($clubStanding)) {
                $this->Flash->success(__('The club standing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The club standing could not be saved. Please, try again.'));
        }
        $this->set(compact('clubStanding'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Club Standing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clubStanding = $this->ClubStandings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clubStanding = $this->ClubStandings->patchEntity($clubStanding, $this->request->getData());
            if ($this->ClubStandings->save($clubStanding)) {
                $this->Flash->success(__('The club standing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The club standing could not be saved. Please, try again.'));
        }
        $this->set(compact('clubStanding'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Club Standing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clubStanding = $this->ClubStandings->get($id);
        if ($this->ClubStandings->delete($clubStanding)) {
            $this->Flash->success(__('The club standing has been deleted.'));
        } else {
            $this->Flash->error(__('The club standing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
