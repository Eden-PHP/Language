<?php //-->
/**
 * This file is part of the Eden PHP Library.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Language;

use Eden\File\Index as File;

/**
 * Language class implementation
 *
 * @vendor   Eden
 * @package  Language
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
class Index extends Base implements \ArrayAccess, \Iterator
{
    /**
     * @var array $language The language translation list
     */
    protected $language = array();

    /**
     * @var array $file The language file to save to
     */
    protected $file = null;
    
    /**
     * Loads the translation set
     *
     * @param string|array $language the translation to load
     *
     * @return void
     */
    public function __construct($language = array())
    {
        //argument 1 must be a file or array
        Argument::i()->test(1, 'file', 'array');
        
        if (is_string($language)) {
            $this->file = $language;
            $language = include($language);
        }
        
        $this->language = $language;
    }
    
    /**
     * Returns the current item
     * For Iterator interface
     *
     * @return void
     */
    public function current()
    {
        return current($this->language);
    }
    
    /**
     * Returns the translated key.
     * if the key is not set it will set
     * the key to the value of the key
     *
     * @param string
     *
     * @return string
     */
    public function get($key)
    {
        //argument 1 must be a string
        Argument::i()->test(1, 'string');
        
        if (!isset($this->language[$key])) {
            $this->language[$key] = $key;
        }
        
        return $this->language[$key];
    }
    
    /**
     * Return the language set
     *
     * @return array
     */
    public function getLanguage()
    {
        return $this->language;
    }
    
    /**
     * Returns th current position
     * For Iterator interface
     *
     * @return void
     */
    public function key()
    {
        return key($this->language);
    }

    /**
     * Increases the position
     * For Iterator interface
     *
     * @return void
     */
    public function next()
    {
        next($this->language);
    }

    /**
     * isset using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to test if exists
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        //argument 1 must be scalar, null or bool
        Argument::i()->test(1, 'scalar', 'null', 'bool');
        
        return isset($this->language[$offset]);
    }
    
    /**
     * returns data using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to get
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        //argument 1 must be scalar, null or bool
        Argument::i()->test(1, 'scalar', 'null', 'bool');
        
        return $this->get($offset);
    }
    
    /**
     * Sets data using the ArrayAccess interface
     *
     * @param *scalar|null|bool
     * @param mixed
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        //argument 1 must be scalar, null or bool
        Argument::i()->test(1, 'scalar', 'null', 'bool');
        
        $this->translate($offset, $value);
    }
    
    /**
     * unsets using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to unset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        //argument 1 must be scalar, null or bool
        Argument::i()->test(1, 'scalar', 'null', 'bool');
        
        unset($this->language[$offset]);
    }
   
    /**
     * Rewinds the position
     * For Iterator interface
     *
     * @return void
     */
    public function rewind()
    {
        reset($this->language);
    }

    /**
     * Saves the language to a file
     *
     * @param string|null $file The file to save to
     *
     * @return this
     */
    public function save($file = null)
    {
        //argument 1 must be a file or null
        Argument::i()->test(1, 'string', 'null');
        
        if (is_null($file)) {
            $file = $this->file;
        }
        
        if (is_null($file)) {
            Exception::i()
                ->setMessage(Argument::INVALID_ARGUMENT)
                ->addVariable(1)
                ->addVariable(__CLASS__.'->'.__FUNCTION__)
                ->addVariable('file or null')
                ->addVariable($file)
                ->setTypeLogic()
                ->trigger();
        }
        
        File::i($file)->setData($this->language);
        
        return $this;
    }
    
    /**
     * Sets the translated value to the specified key
     *
     * @param *string $key   The translation key
     * @param *string $value The default value if we cannot find the translation
     *
     * @return this
     */
    public function translate($key, $value)
    {
        Argument::i()
            //argument 1 must be a string
            ->test(1, 'string')
            //argument 2 must be a string
            ->test(2, 'string');
            
        $this->language[$key] = $value;
        
        return $this;
    }
    
    /**
     * Validates whether if the index is set
     * For Iterator interface
     *
     * @return bool
     */
    public function valid()
    {
        return isset($this->language[key($this->language)]);
    }
}
