<?php

/**
 * The job interest stream controller class
 * Class JobInterestStreamController
 */
class JobInterestStreamController extends StreamController {

    /**
     * The main process method for the controller
     * @return mixed|void
     */
    protected function process() {
        require_once 'libs/Auth.php';

        $userId = Auth::userId();
        $jobId = $this->param();
        $interested = $this->app()->request->get("value");

        require_once 'models/User.php';
        require_once 'models/Seeker.php';

        $seeker = new Seeker($userId);
        if($interested == 'true') {
            $seeker->expressJobInterest($jobId);
        } else {
            $seeker->unExpressInterest($jobId);
        }

        $record = Array(
            'success' => true
        );

        $this->addRecord($record);
    }
}