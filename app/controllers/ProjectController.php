<?php

namespace app\controllers;

use app\models\Project;

class ProjectController {
    private $projectModel;

    public function __construct() {
        $this->projectModel = new Project();
    }

    public function showProjectsView() {
        include 'public/assets/views/main/projectsView.php';
        exit();
    }

    public function getAllProjects() {
        header("Content-Type: application/json");
        $projects = $this->projectModel->getAllProjects();
        echo json_encode($projects);
        exit();
    }

    public function addProject() {
        $inputData = [
            'title' => isset($_POST['title']) ? trim($_POST['title']) : false,
            'description' => isset($_POST['description']) ? trim($_POST['description']) : false,
            'link' => isset($_POST['link']) ? trim($_POST['link']) : null
        ];

        $validatedData = $this->validateProject($inputData);

        $this->projectModel->createProject($validatedData);

        http_response_code(201);
        echo json_encode(['message' => 'Success!']);
        exit();
    }

    private function validateProject($inputData) {
        $errors = [];
        $title = $inputData['title'];
        $description = $inputData['description'];

        if (!$title) {
            $errors['requiredTitle'] = 'Title is required.';
        } elseif (strlen($title) < 2) {
            $errors['shortTitle'] = 'Title is too short.';
        }

        if (!$description) {
            $errors['requiredDescription'] = 'Description is required.';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'title' => htmlspecialchars($title, ENT_QUOTES, 'UTF-8'),
            'description' => htmlspecialchars($description, ENT_QUOTES, 'UTF-8'),
            'link' => $inputData['link']
        ];
    }
}
