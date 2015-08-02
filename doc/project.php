<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/euler" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=euler" ;
$project = new project_object("euler", "Project Euler", "https://github.com/aidansean/euler", "http://aidansean.com/projects/?tag=euler", "euler/images/project.jpg", "euler/images/project_bw.jpg", "To hone my problem solving skills I occasionally take part in Project Euler, which is a series of mathematical and computational problems.  These pages summarise my solutions and strategies.", "Euler,Maths", "CSS,HTML,python") ;
?>