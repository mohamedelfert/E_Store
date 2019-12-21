<?php

namespace PHPMVC\Lib;   /*PHPMVC دا ال Name space الخاص بالمشروع كله ويندرج تحته paths الفرعية*/

trait Helper    /*trait دي عاملها عشان اقدر استخدمها في اي مكان او اي class بدون ما احتاج اعمل object منها */
{
    /* function دي تاخد path وتعمل redirect علية ولو فية session مفتوح بتقفله الاول */
    public function redirect($path){
        session_write_close();
        header("Location: " . $path);
        exit;
    }
}