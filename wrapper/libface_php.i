# Wrap everything under module libface_php


%module libface_php
%{
    #include "/usr/include/libface/LibFaceConfig.h"
    #include "/usr/include/libface/Log.h"
    #include "/usr/include/libface/LibFaceCore.h"
    #include "/usr/include/libface/Face.h"
    #include "/usr/include/libface/LibFaceUtils.h"
    #include "/usr/include/libface/LibFace.h"
    #include "/usr/include/libface/Haarcascades.h"
    #include "/usr/include/libface/FaceDetect.h"
    #include "/usr/include/libface/Eigenfaces.h"

    #include "glue.cpp"

%}

%include std_string.i
%include std_vector.i
%include std_map.i
%include cpointer.i

%include /usr/include/libface/LibFaceConfig.h
%include /usr/include/libface/Log.h
%include /usr/include/libface/LibFaceCore.h
%include /usr/include/libface/Face.h
%include /usr/include/libface/LibFaceUtils.h
%include /usr/include/libface/LibFace.h
%include /usr/include/libface/Haarcascades.h
%include /usr/include/libface/FaceDetect.h
%include /usr/include/libface/Eigenfaces.h
%include glue.cpp

    %pointer_functions(int, intP)

    %template(IntVector) std::vector<int>;
    %template(DoubleVector) std::vector<double>;
    %template(FloatVector) std::vector<float>;

    %pointer_functions(libface::Face, FaceP)

    %template(FaceVector) std::vector<libface::Face>;
    %template(FacePVector) std::vector<libface::Face *> ;

