<?php
require_once('models/blogs.php');
require_once('base/BaseController.php');

class BlogsController extends BaseController
{
    public function __construct()
    {
        return $this->check('admin');
    }

    public function all()
    {
        $blogs = Blogs::all();
        require_once('views/app/blogs/all.php');
    }

    public function create()
    {
        $blog = new Blogs;
        require_once('views/app/blogs/form.php');
    }

    public function store()
    {
        $_POST['image'] = $this->upload('image');
        $_POST['bg'] = $this->upload('bg');
        $_POST['tags'] = str_replace("\r\n", ", ", $_POST['tags']);
        Blogs::store($_POST);
        redirect(route('blogs', 'all'), __('CREATE'));
    }

    public function edit()
    {
        $id = $_GET['id'];
        $blog = Blogs::find($id);
        require_once('views/app/blogs/form.php');
    }

    public function update()
    {
        $blog = Blogs::find($_POST['id']);
        if ($blog->image) {
            unlink($blog->image);
        }
        if ($blog->bg) {
            unlink($blog->bg);
        }
        $_POST['image'] = $this->upload('image');
        $_POST['bg'] = $this->upload('bg');
        $_POST['tags'] = str_replace("\r\n", ", ", $_POST['tags']);
        $update = $blog->update($_POST);
        redirect(route('blogs', 'all'), __('UPDATE'));
    }

    function destroy()
    {
        $id = $_POST['id'];
        $blog = Blogs::find($id);
        if ($blog->image) {
            unlink($blog->image);
        }
        if ($blog->bg) {
            unlink($blog->bg);
        }
        $destroy = $blog->destroy();
        redirect(route('blogs', 'all'), __('DELETE'));
    }
}
