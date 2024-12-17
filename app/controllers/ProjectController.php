<?php

namespace app\controllers;

use app\models\Project;

class ProjectController {
    private $projectModel;

    public function __construct() {
        $this->projectModel = new Project();
    }

    // Connects front end
    public function projectsView() {
        include __DIR__ . '/../../public/assets/views/main/projects.html';

        exit();
    }

    // Gets all the projects
    public function getAllProjects() {
        header("Content-Type: application/json");
        $projects = $this->projectModel->getAllProjects();
        echo json_encode($projects);
        exit();
    }

    // Saves the projects
    public function saveProject() {
        $inputData = [
            'title' => isset($_POST['title']) ? trim($_POST['title']) : null,
            'description' => isset($_POST['description']) ? trim($_POST['description']) : null,
            'link' => isset($_POST['link']) ? trim($_POST['link']) : null
        ];

        $validatedData = $this->validateProject($inputData);
        $this->projectModel->createProject($validatedData);

        http_response_code(201);
        echo json_encode(['message' => 'Project successfully added!']);
        exit();
    }

    // Deletes a project
    public function deleteProject($id) {
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Project ID is required.']);
            exit();
        }

        $this->projectModel->deleteProject($id);

        http_response_code(200);
        echo json_encode(['message' => 'Project successfully deleted!']);
        exit();
    }

    //Validates project information
    private function validateProject($inputData) {
        $errors = [];

        if (empty($inputData['title'])) {
            $errors['title'] = 'You need a title.';
        } elseif (strlen($inputData['title']) < 3) {
            $errors['title'] = 'The title needs to be at least 3 characters.';
        }

        if (empty($inputData['description'])) {
            $errors['description'] = 'You need a description.';
        }

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'title' => htmlspecialchars($inputData['title'], ENT_QUOTES, 'UTF-8'),
            'description' => htmlspecialchars($inputData['description'], ENT_QUOTES, 'UTF-8'),
            'link' => isset($inputData['link']) ? htmlspecialchars($inputData['link'], ENT_QUOTES, 'UTF-8') : null
        ];
    }
}
