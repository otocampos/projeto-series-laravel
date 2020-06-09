<?php
namespace App;

use Illuminate\DataBase\Eloquent\Model;
class Serie extends Model
{


public $timestamps = false;
protected $fillable = ['nome'];


}