<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SettingOptions Controller
 *
 * @property \App\Model\Table\SettingOptionsTable $SettingOptions
 *
 * @method \App\Model\Entity\SettingOption[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingOptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $settingOptions = $this->paginate($this->SettingOptions);

        $this->set(compact('settingOptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Setting Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $settingOption = $this->SettingOptions->get($id, [
            'contain' => ['UserSettingOptions']
        ]);

        $this->set('settingOption', $settingOption);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $settingOption = $this->SettingOptions->newEntity();
        if ($this->request->is('post')) {
            $settingOption = $this->SettingOptions->patchEntity($settingOption, $this->request->getData());
            if ($this->SettingOptions->save($settingOption)) {
                $this->Flash->success(__('The setting option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting option could not be saved. Please, try again.'));
        }
        $this->set(compact('settingOption'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Setting Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settingOption = $this->SettingOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settingOption = $this->SettingOptions->patchEntity($settingOption, $this->request->getData());
            if ($this->SettingOptions->save($settingOption)) {
                $this->Flash->success(__('The setting option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting option could not be saved. Please, try again.'));
        }
        $this->set(compact('settingOption'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Setting Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $settingOption = $this->SettingOptions->get($id);
        if ($this->SettingOptions->delete($settingOption)) {
            $this->Flash->success(__('The setting option has been deleted.'));
        } else {
            $this->Flash->error(__('The setting option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
