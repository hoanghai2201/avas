<?php
$_SERVER['HTTP_HOST'] = 'avas.local';
require 'wp-load.php';
$front_page_id = get_option('page_on_front');
$fields = get_field_objects($front_page_id);
if($fields){
    foreach($fields as $name => $field){
        echo $name . ' (' . $field['type'] . ")\n";
        if(in_array($field['type'], ['repeater', 'group'])){
            if(!empty($field['sub_fields'])){
                foreach($field['sub_fields'] as $sub_field){
                    echo "  - " . $sub_field['name'] . " (" . $sub_field['type'] . ")\n";
                }
            }
        }
    }
} else {
    echo "No fields found on front page or ACF not loaded properly.";
}
