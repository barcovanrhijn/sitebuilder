<?php
//Wraps any input in the tag of your choice. 
//Adds class of your choice
//Returns the combined HTML

function wrap($inner_text,$wrap_tag,$wrap_class='',$url=''){
      $wrap_tag = strtolower($wrap_tag);
      if (empty($wrap_class)) {$wrap_class = " ";}

      if ($wrap_tag === 'a'){
      $html = '
            <a href="' . $url . '" class="' . $wrap_class  . '">
                  ' . $inner_text . '
            </a>
            ';
      }
      else{
      $html = '

        <'. $wrap_tag . ' class="' . $wrap_class .'">
              ' . $inner_text . '
        </'. $wrap_tag  .'>


        ';
      }
return $html;
}