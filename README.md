![logo](http://eden.openovate.com/assets/images/cloud-social.png) Eden Language
====
[![Build Status](https://api.travis-ci.org/Eden-PHP/Language.svg)](https://travis-ci.org/Eden-PHP/Language)
====

 - [Install](#install)
 - [Introduction](#intro)
 - [API](#api)
    - [get](#get)
    - [getLanguage](#getLanguage)
    - [save](#save)
    - [translate](#translate)
 - [Contributing](#contributing)

====

<a name="install"></a>
## Install

`composer install eden/language`

====

<a name="intro"></a>
## Introduction

Languages in *Eden* are fairly robust, simply defined and designed to work with other translating services such as *Google Translate*. The follow figure shows how to set up a french translator.

**Figure 1. French Translator**

```
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
```

For ease of use we also made the language object accessable as an array. The next figure shows the same as `Figure 1` except that it's usings arrays to manipulate the object.

**Figure 2. Languages as Arrays**

```
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
```

Most commonly, websites using languages usually start and end with loading and saving translation files. Using *Eden's* language object through the life of the page and later saving will keep your languages file always up to date.

> **Note:** Eden does not do the actual translating on its own. Once the file is generated and saved you should run it through a translating service.

**Figure 3. Loading and Saving a Language File**

```
//load up a translation file
$translations = eden('file', '/path/to/french.php')->getData();
$french = eden('language', $translations);
 
//add to translation
$french['I am good thank you, and you?] = 'Bien mercy, et vous?';
 
//save back to file
$french->save('/path/to/french.php');
```

====

<a name="api"></a>
## API

==== 

<a name="get"></a>

### get

Returns the translated key. if the key is not set it will set the key to the value of the key 

#### Usage

```
eden('language')->get(string );
```

#### Parameters

 - `string `

Returns `string`

#### Example

```
eden('language')->get();
```

==== 

<a name="getLanguage"></a>

### getLanguage

Return the language set 

#### Usage

```
eden('language')->getLanguage();
```

#### Parameters

Returns `array`

==== 

<a name="save"></a>

### save

Saves the language to a file 

#### Usage

```
eden('language')->save(string|null $file);
```

#### Parameters

 - `string|null $file` - The file to save to

Returns `this`

#### Example

```
eden('language')->save();
```

==== 

<a name="translate"></a>

### translate

Sets the translated value to the specified key 

#### Usage

```
eden('language')->translate(*string $key, *string $value);
```

#### Parameters

 - `*string $key` - The translation key
 - `*string $value` - The default value if we cannot find the translation

Returns `this`

#### Example

```
eden('language')->translate('foo', 'foo');
```

==== 

<a name="contributing"></a>
#Contributing to Eden

Contributions to *Eden* are following the Github work flow. Please read up before contributing.

##Setting up your machine with the Eden repository and your fork

1. Fork the repository
2. Fire up your local terminal create a new branch from the `v4` branch of your 
fork with a branch name describing what your changes are. 
 Possible branch name types:
    - bugfix
    - feature
    - improvement
3. Make your changes. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")

##Making pull requests

1. Please ensure to run `phpunit` before making a pull request.
2. Push your code to your remote forked version.
3. Go back to your forked version on GitHub and submit a pull request.
4. An Eden developer will review your code and merge it in when it has been classified as suitable.
