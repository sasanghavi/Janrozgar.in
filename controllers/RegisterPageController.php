<?php

/**
 * The Registration page controller
 * Class RegisterPageController
 */
class RegisterPageController extends Controller {

    /**
     * Constructor for registration page controller
     * @param \Slim\Slim   $app      The application instance
     * @param string $template The template name (for view controllers)
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    /**
     * Set the variables to be rendered in template
     */
    protected function process() {
        $this->setVar('title', 'Join Central');

        require_once 'libs/Session.php';

        Session::start();

        if(Session::existsVar("ERR_MSG")) {
            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
        } else {
            $this->setVar('errMsg', "");
        }

        Session::end();
    }
}
