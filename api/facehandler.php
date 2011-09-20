<?php

require_once ("libface_php.php");

class FaceInfo {
    var $x1;
    var $y1;
    var $x2;
    var $y2;

    public function __construct($x1 = 'null', $y1 = 'null', $x2 = 'null', $y2 = 'null')
    {
        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $x2;
        $this->y2 = $y2;
    }

    public function get_from_vector($api_faceVector, $index)
    {
        $face = new Face(faceAt($api_faceVector, $index));
        $this->x1 = $face->getX1();
        $this->y1 = $face->getY1();
        $this->x2 = $face->getX2();
        $this->y2 = $face->getY2();
    }

    public function to_array()
    {
        return array( 
                     "x1" => $this->x1,
                     "y1" => $this->y1,
                     "x2" => $this->x2,
                     "y2" => $this->y2
                    );
    }

    public function to_json()
    {
        return json_encode($this->to_array());
    }
}
