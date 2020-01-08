function MY_toggle_plugins() {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $temp_files1 = glob(WP_PLUGIN_DIR.'/*'); 
    $activated=array();
    $already_active=array();
    foreach($temp_files1 as $file1){
        if(is_dir($file1)) { 
            $temp_files2 = glob($file1 . '/*');
            foreach($temp_files2 as $file2){
                if(is_file($file2) && stripos(file_get_contents($file2),'search-replace:')!==false) { 
                    $search-replace=basename(dirname($file2)).'/'.basename($file2);
                    if(is_plugin_active($search-replace)) {
                        array_push($already_active, $search-replace); 
                        //deactivate_plugins($search-replace);
                    }
                    else{
                        array_push($activated, $search-replace);
                        activate_plugin($search-replace);
                    }
                }

            }
        }
    }
    echo 'You have activated these plugins:<br/><br/>'.serialize($activated).'<br/><br/>These were already active:<br/><br/>'.serialize($already_active); exit;
} 
//execute
MY_toggle_plugins(); 
