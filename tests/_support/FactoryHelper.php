<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FactoryHelper extends \Codeception\Module
{
    /**
     * @var \League\FactoryMuffin\Factory
     */
    protected $factory;
    
    public function _initialize()
    {
        $this->factory = new \League\FactoryMuffin\Factory;
        $this->factory->define('Post', array(
            'title'    => 'sentence|5',
            'body'   => 'text',
        ));

        $this->factory->define('User', array(
            'email' => 'unique:email',
            'password' => \Hash::make('password')
        ));
    }

    public function havePosts($num)
    {
        $this->factory->seed($num, 'Post');
    }

    public function haveUsers($num)
    {
        $this->factory->seed($num, 'Post');
    }

    public function _after()
    {
        $this->factory->deleteSaved();
    }

}