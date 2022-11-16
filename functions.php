<?php


function filter($payload){
    return htmlspecialchars(strip_tags($payload));
}