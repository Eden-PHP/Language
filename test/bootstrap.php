<?php //-->
/*
 * This file is part of the Language package of the Eden PHP Library.
 * (c) 2012-2013 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */
 
require_once __DIR__.'/../../Core/library/Eden/Core/Loader.php';
Eden\Core\Loader::i()
	->addRoot(true, 'Eden\\Core')
	->addRoot(realpath(__DIR__.'/../../Language/library'), 'Eden\\Language')
	->addRoot(realpath(__DIR__.'/../../System/library'), 'Eden\\System')	
	->addRoot(realpath(__DIR__.'/../../Type/library'), 'Eden\\Type')
	->register()
	->load('Controller');