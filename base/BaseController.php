<?php

class BaseController
{
    private function keyword()
    {
        $class_name = get_called_class(); // ProductsController
        return strtolower(str_replace("COntroller", "", $class_name)); // products
    }

    protected function upload($index)
    {
        if (isset($_FILES[$index]) && $_FILES[$index]['name']) {
            $output = upload($index);
            if (is_array($output)) {
                redirect(route($this->keyword(), 'create'), '', $output);
                die();
            } else {
                return $output;
            }
        }
    }

    protected function check($types = '')
    {
        $user = user();
        if (!$user) {
            redirect(page('account'));
        }
        if (is_array($types) && count($types)) {
            if (!in_array($user->type, $types)) {
                abort(403);
            }
        } elseif ($types) {
            if ($user->type != $types) {
                abort(403);
            }
        }
    }

    protected function guest()
    {
        $user = user();
        if ($user) {
            redirect(route('app', 'dashboard'));
        }
    }
}
