<?php
   
function shaabdik_scripts(){
  
    wp_enqueue_style('google font','https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700;900&display=swap');
    wp_enqueue_style('slick slider','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
    wp_enqueue_style('carrol','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('fontawesome','https://use.fontawesome.com/84f1a5e1f6.js');
    wp_enqueue_script('ajax', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js' );

    wp_register_style('shaabdik style',get_template_directory_uri().'/css/main.css',[],1.0 ,'all');
    
    wp_register_script('forslider','https://code.jquery.com/jquery-3.5.1.min.js',['shaabdik js'], 1.0,true);
    wp_register_script('shaabdik js',get_template_directory_uri().'/inc/js/main.js',[],time(), true);
    
   wp_enqueue_style('shaabdik style');
   wp_enqueue_script('shaabdik js');
   wp_enqueue_script('forslider');
}
add_action('wp_enqueue_scripts','shaabdik_scripts');



function rmArticleBoxSC( $atts, $content ){

    $heading = $atts['heading'] ?? '';
    $imgID = $atts['image'] ?? 0;
  
    ob_start();
   ?>
<section class="infromation">
  <div class="image">
     <?php echo wp_get_attachment_image($imgID) ?>
  </div>
  <div class="content">
    <h2><?php echo $heading; ?></h2>
    <p><?php echo $content; ?></p>
  </div>
</section>
   <?php

$scd = ob_get_clean();
   return apply_filters('rm_artice_box', $scd);
}
add_shortcode('article_box', 'rmArticleBoxSC');


add_action('init', 'rmAfterVCInit');
function rmAfterVCInit(){

    vc_map([
        'name'=> 'Article Box',
        'base' => 'article_box',
        'category' => 'Content',
        'description' => 'This is article box',
        'params' => [
            [
                'type' => 'textfield',
                'param_name' => 'heading',
                'heading' => 'Heading',
                'description' => 'This is for heading',
                'admin_label' => true,
            ],
            [
                'type' => 'textarea_html',
                'param_name' => 'content',
                'heading' => 'Content',
                'description' => 'This is for content',
                'admin_label' => true,
            ],
            [
                'type' => 'attach_image',
                'param_name' => 'image',
                'heading' => 'Image',
                'description' => 'This is for Image',
                'admin_label' => true,
            ]
        ]
    ]);

}


add_action('rm_after_header', 'rmAfterHeader');
function rmAfterHeader(){
    echo "this is social icons";
}

add_filter('rm_artice_box', 'rmArticleFilterHook');
function rmArticleFilterHook( $data ){
    return "<div class='mero_class'>$data</div>";
}



add_shortcode('ram','ram_shortcode');
function ram_shortcode(){
    return "my simple code which  I created now for demo";
}
function ram_codeShort(){
     return "hello word";
}

add_shortcode('ram-file','ram_codeShort');

function paramatized_code($attributs){
  print_r($attributs);
  echo '<br/><br/>playlist Name:' .$attributs['play-list'];
  echo 'br/> Total videos:'.$attributs['total_video'];
}
add_shortcode('para','paramatized_code');