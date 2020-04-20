<?php

function client_url($uri='')
{
	return config_item("base_url").'client/'.$uri;
}

?>