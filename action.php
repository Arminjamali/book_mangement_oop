<?php
include 'class.php';
switch ($_POST['action']){
    case 'add_student':
        add_student($_POST);
        break;
    case 'add_book':
        add_book($_POST);
        break;
    case 'add_request':
        add_request($_POST);
}
function add_student($data){
    $s = new student();
    $s->add($data['name'],$data['family'],$data['code'],$data['address']);
}
function add_book($data){
    $b = new book();
    $b->add($data['title'],$data['author'],$data['year'],$data['stock']);
}
function add_request($data){
    $r = new request();
    $r->add($data['student'],$data['book']);
}