<?php
class News extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }
    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News Archive';
        
        $this->load->view('templates/header' , $data);
        $this->load->view('news/index' , $data);
        $this->load->view('templates/footer' , $data);
    }
    public function view($slug)
    {
        $data['news_item'] = $this->news_model->get_news($slug);
        if (empty($data['news_item']))
        {
            show_404();
        }
        $data['title'] = $data['news_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($slug = FALSE)
    {
        $this->news_model->delete_news($slug);
        
        $data['title'] = "Noticia Borrada";
        
        $this->load->view('templates/header', $data);
        $this->load->view('news/success', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('text','Text','required');
        $this->form_validation->set_rules('slug','Slug','required');
        
        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'Create';
            $this->load->view('templates/header',$data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        }
        else 
        {
            $data['title'] = 'Success';
            $this->news_model->set_news();
            $this->load->view('templates/header',$data);
            $this->load->view('news/success', $data);
            $this->load->view('templates/footer');
        }
        
    }
    
    public function update($id = NULL)
    {
        if ($id !=NULL)
        {
            $this->load->helper('form');
            $this-load->library('form_validation');
            
            $data ['title'] = "Update a news item";
            
            //muestro los datos
            $data['news'] = $this->news_model->get_news($id);
            $data['update']
        }
    }
}
?>
