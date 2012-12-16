<?php

// application/model/post.php
// The model for blog posts. 
// the post belongs to a user and that relationship is identified by post_author in the Posts table

class Post extends Eloquent {
	public static $table = 'posts';
	public function user()
	{
		return $this->belongs_to('User');
	}
	public function page()
	{
		return $this->belongs_to('Page');
	}

}
