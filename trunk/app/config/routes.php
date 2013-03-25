<?php
 
	Router::connect('/', array('controller' => 'tasks', 'action' => 'index'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

	Router::connect('/cong-viec-dang-lam', array('controller' => 'tasks', 'action' => 'doing'));
	Router::connect('/cong-viec-da-lam', array('controller' => 'tasks', 'action' => 'done'));
	Router::connect('/cong-viec-bi-tra-lai', array('controller' => 'tasks', 'action' => 'fail'));
	Router::connect('/cong-viec-hoan-hoan-thanh', array('controller' => 'tasks', 'action' => 'finish'));