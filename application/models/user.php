<?php

class User extends Eloquent {
	public function news()
	{
		return $this->has_many('News');
	}
	public function subjects()
	{
		return $this->has_many('Subject');
	}
}
