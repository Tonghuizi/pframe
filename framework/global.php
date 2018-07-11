<?php

function dump($obj){
	var_dump($obj);
	die;
}

function scriptUrl(){
	return Yii::app()->config['scriptUrl'];
//	return CONFIG['scriptUrl'];
}

function baseUrl(){
    return Yii::app()->config['baseUrl'];
//	return CONFIG['baseUrl'];
}