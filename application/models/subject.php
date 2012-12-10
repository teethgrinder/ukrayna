<?php
	
	class Subject extends Eloquent
	{
		public function users()
		{
			return $this->belongs_to('User');
		}
	}
