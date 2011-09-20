<?php

require_once ("facehandler.php");
require_once ("libface_php.php");

class ScanResult {
    var $status;
    var $face_list;

    public function __construct($status, $face_list) {

        $this->status = $status;
        $this->face_list = $face_list;
    }
}

class Scanner {
    var $instance;

    public function __construct() {
        $this->instance = new Libface(DETECT);
    }

    public function scan($filename) {
        
        // check mime to see if it is an image
        $size = getimagesize($filename);
        if($size == FALSE)
            return new ScanResult('notimage', null);

        if( substr_compare($size['mime'], "image", 0, 5) != 0 )
            return new ScanResult('notimage', null);
    

        // scan
        $detected_faces = $this->instance->detectFaces($filename);

        $faces = array();
        for($i = 0; $i < $detected_faces->size(); $i++)
        {
            $faceinfo = new FaceInfo;
            $faceinfo->get_from_vector($detected_faces, $i);
            $faces[] = $faceinfo;
        }

        if (count($faces) == 0)
            $status = 'nofaces';
        else
            $status = 'success';
        
        return new ScanResult($status, $faces);
    }
}

        

        
