<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->library('pagination'); 
        $this->call->library('auth');  

        // Require login for all user management pages
        if (!$this->auth->is_logged_in()) {
            redirect('auth/login');
            exit;
        }
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $q = isset($_GET['q']) ? trim($_GET['q']) : '';

        $records_per_page = 5;
        $result = $this->UserModel->page($q, $records_per_page, $page);

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);

        $this->pagination->initialize(
            $result['total_rows'], 
            $records_per_page, 
            $page, 
            'users?q='.$q
        );

        $data = [
            'users' => $result['records'],
            'page'  => $this->pagination->paginate(),
            'q'     => $q,
            'auth'  => $this->auth
        ];

        $this->call->view('user/view', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];
            $this->UserModel->insert($data);
            redirect('/');
        } else {
            $this->call->view('user/create'); 
        }
    }

    public function update($id)
    {
        $data['user'] = $this->UserModel->find($id);
        if ($this->io->method() == 'post') {
            $data = [
                'username' => $this->io->post('username'),
                'email' => $this->io->post('email')
            ];
            $this->UserModel->update($id, $data);
            redirect('/');
        } else {
            $this->call->view('user/update', $data);
        }
    }

    public function delete($id)
    {
        $this->UserModel->delete($id);
        redirect('/');
    }
}
