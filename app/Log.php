<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'computer_id', 'circulation_flag',
  ];

}
