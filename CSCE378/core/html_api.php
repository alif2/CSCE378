<?php
function html_top() {
    html_doctype();
    html_meta();
    html_css();
    html_title();
    html_scripts();
}

function html_doctype() {
    echo '<!DOCTYPE html>';
}

function html_meta() {
    echo '<meta charset="utf-8">';
}

function html_css() {
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>';
    echo '<link rel="stylesheet" href="css\style.css">';
}

function html_title() {
    echo '<title>';
    echo file_get_string('title');
    echo '</title>';
}

function html_scripts() {
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
    echo '<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
    echo '<script async src="js/main.js"></script>';
}