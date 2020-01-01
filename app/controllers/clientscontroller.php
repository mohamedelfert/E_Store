<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Lib\Messenger;
use PHPMVC\Models\ClientsModel;

class ClientsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles = [
        'ClientName'        => 'required|alpha|between(5,20)',
        'ClientPhone'       => 'required|alpha_num|max(15)',
        'ClientEmail'       => 'required|email|equal_field(ClientCEmail)',
        'ClientCEmail'      => 'required|email',
        'ClientAddress'     => 'required|alpha_num|max(30)'
    ];

    private $_editActionRoles = [
        'ClientPhone'       => 'alpha_num|max(15)',
        'ClientEmail'       => 'required|email|equal_field(ClientCEmail)',
        'ClientCEmail'      => 'required|email',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('clients.default');
        $this->_data['clients'] = ClientsModel::getAll();
        $this->_view();
    }

    public function addAction()
    {
        $this->language->load('template.common');
        $this->language->load('clients.default');
        $this->language->load('clients.labels');
        $this->language->load('clients.errors');
        $this->language->load('clients.messages');

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){
            $client = new ClientsModel();
            $client->ClientName          = $this->filterString($_POST['ClientName']);
            $client->ClientEmail         = $this->filterEmail($_POST['ClientEmail']);
            $client->ClientPhone         = $this->filterString($_POST['ClientPhone']);
            $client->ClientAddress       = $this->filterString($_POST['ClientAddress']);

            if (ClientsModel::nameExists($client->ClientName)){
                $this->messenger->add($this->language->get('text_message_exist_name') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/clients');
            }
            if (ClientsModel::emailExists($client->ClientEmail)){
                $this->messenger->add($this->language->get('text_message_exist_email') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/clients');
            }
            if (ClientsModel::phoneExists($client->ClientPhone)){
                $this->messenger->add($this->language->get('text_message_exist_phone') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/clients');
            }

            if ($client->save()){
                $this->messenger->add($this->language->get('text_message_success'));
            } else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/clients');
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $client = ClientsModel::getByPk($id);
        if ($client === false){
            $this->redirect('/clients');
        }
        $this->_data['client']  = $client;

        $this->language->load('template.common');
        $this->language->load('clients.default');
        $this->language->load('clients.labels');
        $this->language->load('clients.errors');
        $this->language->load('clients.messages');

        if (isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST)){
            $client->ClientPhone      = $this->filterString($_POST['ClientPhone']);
            $client->ClientEmail      = $this->filterEmail($_POST['ClientEmail']);

            if (ClientsModel::emailExists($client->ClientEmail)){
                $this->messenger->add($this->language->get('text_message_exist_email') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/clients');
            }
            if (ClientsModel::phoneExists($client->ClientPhone)){
                $this->messenger->add($this->language->get('text_message_exist_phone') , Messenger::APP_MESSAGE_ERROR);
                $this->redirect('/clients');
            }

            if ($client->save()){
                $this->messenger->add($this->language->get('text_message_update'));
            } else{
                $this->messenger->add($this->language->get('text_message_failed') , Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/clients');
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInteger($this->_params[0]);
        $client = ClientsModel::getByPk($id);
        if ($client === false){
            $this->redirect('/clients');
        }

        $this->language->load('clients.messages');

        if ($client->delete()){
            $this->messenger->add($this->language->get('text_message_delete_success'));
        } else{
            $this->messenger->add($this->language->get('text_message_delete_failed') , Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/clients');
    }
}