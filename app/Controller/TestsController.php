<?php
// /app/Controller/RecipesController.php


App::uses('AppController', 'Controller');

class TestsController extends AppController {

public $name = 'Tests';
 
    public function selll() {
        //action logic goes here..
		$this->layout='home';
    }
}

?>