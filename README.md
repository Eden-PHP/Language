# Languages

Languages in *Eden* are fairly robust, simply defined and designed to work with other translating services such as *Google Translate*. The follow figure shows how to set up a french translator.

**Figure 1. French Translator**

	//initial translations
	$translations = array(
		'Hello'         => 'Bonjour',
		'How are you?'  => 'Como tale vous?');
	 
	//load up the translation   
	$french = eden('language', $translations);
	 
	//you can add translations on the fly
	$french->translate('I am good thank you, and you?', 'Bien mercy, et vous?');
	 
	//now echo some translations
	echo $french->get('Hello'); //--> Bonjour
	echo $french->get('How are you?'); //--> Como tale vous?
	echo $french->get('I am good thank you, and you?'); //--> Bien mercy, et vous?

For ease of use we also made the language object accessable as an array. The next figure shows the same as `Figure 1` except that it's usings arrays to manipulate the object.

**Figure 2. Languages as Arrays**

	//initial translations
	$translations = array(
		'Hello'         => 'Bonjour',
		'How are you?'  => 'Como tale vous?');
	 
	//load up the translation   
	$french = eden('language', $translations);
	 
	//you can add translations on the fly
	$french['I am good thank you, and you?] = 'Bien mercy, et vous?';
	 
	//now echo some translations
	echo $french['Hello']; //--> Bonjour
	echo $french['How are you?']; //--> Como tale vous?
	echo $french['I am good thank you, and you?']; //--> Bien mercy, et vous?
	 
	foreach($french as $default => $translation) {
		echo $translation;
	}

Most commonly, websites using languages usually start and end with loading and saving translation files. Using *Eden's* language object through the life of the page and later saving will keep your languages file always up to date.

> **Note:** Eden does not do the actual translating on its own. Once the file is generated and saved you should run it through a translating service.

**Figure 3. Loading and Saving a Language File**

	//load up a translation file
	$translations = eden('file', '/path/to/french.php')->getData();
	$french = eden('language', $translations);
	 
	//add to translation
	$french['I am good thank you, and you?] = 'Bien mercy, et vous?';
	 
	//save back to file
	$french->save('/path/to/french.php');
