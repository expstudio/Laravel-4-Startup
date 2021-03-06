<?php

class Category extends Eloquent {
    public $timestamps = false;

	protected $guarded = array();
  
	protected $attributes = array(
		'name_en' => '',
		'name_th' => '',
		'category_id' => '0'
	);


	public static $rules = array(
		'name' => 'required'
	);

	public function posts(){
		return $this->belongsToMany('Post', 'categories_posts', 'category_id', 'post_id');
	}

	public function parent(){
		return $this->belongsTo('Category', 'category_id');
	}

	public function subCategories(){
		return $this->hasMany('Category', 'category_id');
	}
}