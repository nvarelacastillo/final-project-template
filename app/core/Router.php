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
        $this->handleProjectRoutes(); //New
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    //Adding routes
    protected function handleMainRoutes() {
        $mainController = new MainController();

        //Homepage page
        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->homepage();
            exit();
        }

        //Education page
        if ($this->urlArray[1] === 'education' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->educationView();
            exit();
        }

        //Experience page
        if ($this->urlArray[1] === 'experience' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->experienceView();
            exit();
        }

        //Skills page
        if ($this->urlArray[1] === 'skills' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->skillsView();
            exit();
        }

        //Contact page
        if ($this->urlArray[1] === 'contact' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->contactView();
            exit();
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
        // Shows the projects
        if ($this->urlArray[1] === 'projects' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $projectController = new ProjectController();
            $projectController->projectsView();
        }

        // Gets the projects
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'projects' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $projectController = new ProjectController();
            $projectController->getAllProjects();
        }

        // Saves a new project
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'projects' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectController = new ProjectController();
            $projectController->saveProject();
        }

        // Deletes a project
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'projects' && isset($this->urlArray[3]) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $projectController = new ProjectController();
            $projectController->deleteProject($this->urlArray[3]);
        }
    }



}


