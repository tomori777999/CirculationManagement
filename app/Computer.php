<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
  public $timestamps = false;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'computer_name','circulation_flag',
  ];
}
