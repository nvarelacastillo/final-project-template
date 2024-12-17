<?php

namespace app\controllers;

class MainController extends Controller {
    public function homepage() {
        $this->returnView('../public/assets/views/main/homepage.html');
    }

    public function educationView() {
        $this->returnView('../public/assets/views/main/education.html');
    }

    public function experienceView() {
        $this->returnView('../public/assets/views/main/experience.html');
    }

    public function skillsView() {
        $this->returnView('../public/assets/views/main/skills.html');
    }

    public function contactView() {
        $this->returnView('../public/assets/views/main/contact.html');
    }
}
