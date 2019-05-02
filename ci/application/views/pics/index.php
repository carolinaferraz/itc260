<?php
//application/views/pics/index.php

// $this->load->view($this->config->item('theme') . 'header');

?>
<h2><?php echo $title; ?></h2>

<?php foreach ($pics as $pic): ?>

        <h3><?php echo $pics; ?></h3>
        <div class="main">
                <?php echo $pics; ?>
        </div>
        <p><a href="<?php echo site_url('pics/'.$pics); ?>">View tag</a></p>

<?php endforeach; 

// $this->load->view($this->config->item('theme') . 'footer');

?>