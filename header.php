<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('description');?>||<?php bloginfo('title');?></title>
    <?php wp_head();?>
</head>
<body <?php body_class('my__class')?>>
<header id="header">
   <?php get_template_part('template-parts/nav' )?> 
 </header>
 <?php do_action('rm_after_header'); ?>