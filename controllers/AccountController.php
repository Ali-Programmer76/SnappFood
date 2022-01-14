<?php
require_once('models/users.php');
require_once('base/BaseController.php');

class AccountController extends BaseController
{
    public function login()
    {
        $user = Users::where($_POST);
        if ($user) {
            $_SESSION['user'] = $user;
            redirect(route('app', 'dashboard'));
        } else {
            redirect(page('account'), '', [__('LOGIN_FAILED')]);
        }
    }

    public function register()
    {
        $data = $_POST;
        $errors = [];
        if ($data['password'] != $data['password_confirm']) {
            $errors[] = __('PASSWORD_IS_NOT_SAME_AS_PASSWORD_CONFIRMATION');
        }
        $found = Users::where(array('username' => $data['username']));
        if ($found) {
            $errors[] = __('USER_EXISTS');
        }
        if (count($errors)) {
            redirect(page('register'), '', $errors);
        }
        unset($data['password_confirm']);
        $data['type'] = "user";
        $user = Users::store($data);
        $_SESSION['user'] = $user;
        redirect(route('app', 'dashboard'), __('REGISTER'), []);
    }

    public function logout()
    {
        $this->check();
        $_SESSION['user'] = null;
        redirect(page('landing'), __('EXIT'));
    }

    public function edit()
    {
        $this->check();
        $user = user();
        require_once('views/app/accounts/edit.php');
    }

    public function update()
    {
        $this->check();
        $data = $_POST;
        $user = user();
        $errors = [];
        $found = Users::where(array('username' => $data['username']), $user->id);
        if ($found) {
            $errors[] = __('USER_EXISTS');
        }
        if ($user->password != $data['currentPassword']) {
            $errors[] = __('Current_PASSWORD_IS_NOT_SAME_AS_Old_PASSWORD');
        }
        if (isset($data['newPassword']) && $data['newPassword']) {
            $data['password'] = $data['newPassword'];
            if ($data['newPassword'] != $data['confirmPassword']) {
                $errors[] = __('PASSWORD_IS_NOT_SAME_AS_PASSWORD_CONFIRMATION');
            }
        }
        if (count($errors)) {
            redirect(route('account', 'edit'), '', $errors);
        } else {
            unset($data['type']);
            $user->update($data);
            redirect(route('account', 'edit'), __('UPDATE'));
        }
    }
}
