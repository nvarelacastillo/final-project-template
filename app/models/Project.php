<?php

namespace app\models;

class Project extends Model {
    protected $table = 'projects';

    public function getAllProjects() {
        $query = "SELECT title, description, link FROM {$this->table}";
        return $this->fetchAll($query);
    }

    public function createProject($inputData) {
        $query = "INSERT INTO {$this->table} (title, description, link) VALUES (:title, :description, :link)";
        return $this->fetchAllWithParams($query, $inputData);
    }
}
