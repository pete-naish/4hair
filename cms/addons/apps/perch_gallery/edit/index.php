<?php
    # include the API
    include('../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'perch_gallery');
    $Lang = $API->get('Lang');

    # include your class files
    include('../PerchGallery_Albums.class.php');
    include('../PerchGallery_Album.class.php');

    # Set the page title
    $Perch->page_title = $Lang->get('Gallery: Edit Album');

    $Perch->add_css($API->app_path().'/admin.css');

    # Do anything you want to do before output is started
    include('../modes/album.edit.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../modes/album.edit.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>