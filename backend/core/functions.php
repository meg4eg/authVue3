<?php
function init_classes() {
	spl_autoload_register(function ($class_name) {
		include './core/class_'.strtolower($class_name).'.php';
	});
}
