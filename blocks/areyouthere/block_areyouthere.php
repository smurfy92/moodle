<?php


class block_areyouthere extends block_base {
    public function init() {
        $this->title = get_string("pluginname", 'block_areyouthere');
    }

    public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }

    $this->page->requires->js("/blocks/areyouthere/js/jquery-2.1.3.min.js");
    $this->page->requires->js("/blocks/areyouthere/webcam/jquery.webcam.js");
    $this->page->requires->js("/blocks/areyouthere/js/jquery.js");
    $this->page->requires->css("/blocks/areyouthere/css/styles.css");
    $this->content         =  new stdClass;
    $this->content->text   = '<div id="webcam"><div class="click"></div></div>';
    $this->content->footer = '<div id="light"></div>';
 
    return $this->content;
  }
}