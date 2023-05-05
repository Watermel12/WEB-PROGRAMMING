<?php

class Action{
    public $db, $session, $custom, $view, $helper;
    function onlyForAuthUser()
    {
        if(!$this->session->get('Auth'))
        $this->helper->redirect('login');

    }
    function onlyForUnauthUser()
    {
        if($this->session->get('Auth'))
        $this->helper->redirect('home');
    }
    function user_id()
    {
        $user_data = $this->session->get('Auth');
        if ($user_data != null) {
        $users= $this->session->get('Auth')['data'];
        $user_id = $users['id'];
        return $user_id;
        }
        return 0;
    }
    function __construct()
    {
        $this->db = new Database;
        $this->session = new Session;
        $this->custom = new Custom;
        $this->view = new View;
        $this->helper = new Helper;
    }
}

