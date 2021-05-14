<?php
include_once ('m/User.php');

abstract class C_Base extends C_Controller
{
    protected $title;
    protected $content;

    protected function before()
    {
        $this->title = 'Bookstore';
        $this->content = '';
    }

    public function render()
    {
        if (isset($_SESSION['admin_login'])) {
            $isAdmin = new User();
            $user_info = $isAdmin->getAdmin($_SESSION['admin_login']);
        } elseif (isset($_SESSION['user_login'])) {
            $isUser = new User();
            $user_info = $isUser->getUser($_SESSION['user_login']);
        } else {
            $user_info['user_login'] = false;
        }
        $vars = array('title' => $this->title, 'content' => $this->content, 'user' => $user_info['login']);
        $page = $this->Template('v/v_main.php', $vars);
        echo $page;
    }
}