<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserSettingOptions Controller
 *
 * @property \App\Model\Table\UserSettingOptionsTable $UserSettingOptions
 *
 * @method \App\Model\Entity\UserSettingOption[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserSettingOptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserSettings', 'SettingOptions']
        ];
        $userSettingOptions = $this->paginate($this->UserSettingOptions);

        $this->set(compact('userSettingOptions'));
    }

    /**
     * View method
     *
     * @param string|null $id User Setting Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSettingOption = $this->UserSettingOptions->get($id, [
            'contain' => ['UserSettings', 'SettingOptions']
        ]);

        $this->set('userSettingOption', $userSettingOption);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSettingOption = $this->UserSettingOptions->newEntity();
        if ($this->request->is('post')) {
            $userSettingOption = $this->UserSettingOptions->patchEntity($userSettingOption, $this->request->getData());
            if ($this->UserSettingOptions->save($userSettingOption)) {
                $this->Flash->success(__('The user setting option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user setting option could not be saved. Please, try again.'));
        }
        $userSettings = $this->UserSettingOptions->UserSettings->find('list', ['limit' => 200]);
        $settingOptions = $this->UserSettingOptions->SettingOptions->find('list', ['limit' => 200]);
        $this->set(compact('userSettingOption', 'userSettings', 'settingOptions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Setting Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSettingOption = $this->UserSettingOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSettingOption = $this->UserSettingOptions->patchEntity($userSettingOption, $this->request->getData());
            if ($this->UserSettingOptions->save($userSettingOption)) {
                $this->Flash->success(__('The user setting option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user setting option could not be saved. Please, try again.'));
        }
        $userSettings = $this->UserSettingOptions->UserSettings->find('list', ['limit' => 200]);
        $settingOptions = $this->UserSettingOptions->SettingOptions->find('list', ['limit' => 200]);
        $this->set(compact('userSettingOption', 'userSettings', 'settingOptions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Setting Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSettingOption = $this->UserSettingOptions->get($id);
        if ($this->UserSettingOptions->delete($userSettingOption)) {
            $this->Flash->success(__('The user setting option has been deleted.'));
        } else {
            $this->Flash->error(__('The user setting option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
