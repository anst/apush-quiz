<?php
require_once dirname(__FILE__).'/app/panel.php';


$panel = new Panel('panel');
$panel->route('/', function($panel) { 
	return $panel->render("index.html",[]);
});
$panel->route('/<string>', function($panel, $api_query) {
	echo "hey";
	$string = file_get_contents("questions.json");
	$json_a = json_decode($string, true);
	return $panel->render("question.html",["json_a"=>$json_a, "api_query"=>$api_query]);

});
$panel->run();
?>