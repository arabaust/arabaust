<?php

namespace Admailer\Models\Portal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ContactUsPortal extends Model
{

    protected $table = 'contact_us';
	protected $fillable = [
	  'title',
	  'description',
	  'email',
	  'phone',
	  'created_at',];
	  

	
	 
}
