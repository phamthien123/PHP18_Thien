<?php
class Footer {
    public static function ShowFooter($title,$variable){
        $xhtmlOptions = '';
        if (is_array($variable) || is_object($variable))
        {
            foreach ($variable as $value) {
                $xhtmlOptions .= sprintf('<ul><li><a href="#">%s</a></li></ul>',$value);
            }
        }
 
        $xhtml = sprintf('<div class="col-lg-2 col-md-6 single-footer-widget">
        <h4>%s</h4>
            %s
        </div>',$title,$xhtmlOptions);
        return $xhtml;
    }
}
?>
