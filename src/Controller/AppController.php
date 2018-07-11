<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller {

    public $components = ['Flash', 'Auth', 'Usermgmt.UserAuth'/*, 'Security', 'Csrf'*/];
    public $helpers = ['Usermgmt.UserAuth', 'Usermgmt.Image', 'Form','Usermgmt.Tinymce', 'Usermgmt.Ckeditor'];



    /* Override functions */
    public function paginate($object = null, array $settings = []) {
        $sessionKey = sprintf('UserAuth.Search.%s.%s', $this->request['controller'], $this->request['action']);
        if($this->request->session()->check($sessionKey)) {
            $persistedData = $this->request->session()->read($sessionKey);
            if(!empty($persistedData['page_limit'])) {
                $this->paginate['limit'] = $persistedData['page_limit'];
            }
        }
        return parent::paginate($object, $settings);
    }

    public function beforeRender(Event $event) {
        if(!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
            $this->set('_serialize', true);
        }
    }
}
?>
