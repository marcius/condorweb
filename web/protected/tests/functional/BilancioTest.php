<?php

class BilancioTest extends WebTestCase
{
	public $fixtures=array(
		'bilancios'=>'Bilancio',
	);

	public function testShow()
	{
		$this->open('?r=bilancio/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=bilancio/create');
	}

	public function testUpdate()
	{
		$this->open('?r=bilancio/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=bilancio/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=bilancio/index');
	}

	public function testAdmin()
	{
		$this->open('?r=bilancio/admin');
	}
}
