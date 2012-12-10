<?php

class User extends Eloquent {
	public function news()
	{
		return $this->has_many('news');
	}
}
