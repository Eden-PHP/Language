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

Instantiate language in this manner.

```
$language = eden('language');
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
