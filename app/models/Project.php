<?php

namespace app\models;

use app\models\Model;

class Project extends Model {
    protected $table = 'projects';

    // Get all the projects
    public function getAllProjects() {
        return $this->findAll();
    }

    // Creates a new project
    public function createProject($data) {
        $query = "INSERT INTO projects (title, description, link) VALUES (:title, :description, :link)";
        return $this->query($query, [
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link']
        ]);
    }

    //Deletes a project
    public function deleteProject($id) {
        $query = "DELETE FROM projects WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }
}
