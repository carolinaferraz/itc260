<?php
//application/controllers/News.php

class News extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->config->set_item('banner', 'News Section');
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->config->set_item('title', 'News App Title');

        $nav1 = $this->config->item('nav1');

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
        $this->load->view('news/index', $data);
    }

    public function view($slug = NULL)
    {
        //slug without dashes
        $dashless_slug = str_replace("-", " ", $slug);

        //uppsercase slug words
        $dashless_slug = ucwords($dashless_slug);

        //use dashless slug for the title
        $this->config->set_item('title', 'news flash - '. $dashless_slug);

        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('news/view', $data);
    }

    public function create()
    {
        $this->config->set_item('title', 'Create News');
        
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('news/create', $data);
        }
        else
        {
            // $this->news_model->set_news();
            // $this->load->view('news/success', $data);
            
            
            
            if(($slug = $this->news_model->set_news()) !== false) { //slug sent
                $slug = $this->news_model->set_news();
                if ($slug !== false) {
                    feedback('data entered successufully', 'success');
                redirect('news/view/'. $slug);

            } else { //error
                feedback('data not entered', 'error');
                redirect('news/create');
            }
        }
    }
    }} 
