<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\ProjectController;

class Router {
    public $urlArray;

    function __construct()
    {
        $this->urlArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleUserRoutes();
        $this->handleProjectRoutes(); // Add Project Routes
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleMainRoutes() {
        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handleUserRoutes() {
        if ($this->urlArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->usersView();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->getUsers();
        }
    }

    // Added by me
    protected function handleProjectRoutes() {
        $projectController = new ProjectController();

        if ($this->urlArray[1] === 'projects' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $projectController->showProjectsView();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'projects' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $projectController->getAllProjects();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'projects' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectController->addProject();
        }
    }



}


