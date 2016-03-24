<?php

//todo, laat MainCtrl extende door controller
class MainCtrl {

    public function Home() {
        $this->View('home', 'Hello world');
    }

    public function AboutMe() {
        $this->View('aboutMe', 'Im awesome');
    }

    public function Contact() {
        $this->View('contact', 'Call me maybe?');
    }

}

?>