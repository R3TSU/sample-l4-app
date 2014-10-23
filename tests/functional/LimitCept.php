<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('check posts are limited to 20 on page');
$I->havePosts(40);
$I->amOnPage('/posts');
$I->seeNumberOfElements('.post', 20);
