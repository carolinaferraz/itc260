<?php
//application/views/pics/view.php

$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$pic['tags'].'</h2>';
echo $pic['tags'];

$this->load->view($this->config->item('theme') . 'footer');