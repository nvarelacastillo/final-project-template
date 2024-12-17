<?php

namespace app\models;

class Project extends Model {
    protected $table = 'projects';

    public function getAllProjects() {
        $sql = "SELECT title, description, link FROM {$this->table}";
        return $this->query($sql);
    }

    // Create a new project
    public function createProject($data) {
        $sql = "INSERT INTO {$this->table} (title, description, link) VALUES (:title, :description, :link)";
        return $this->query($sql, [
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link']
        ]);
    }
}
