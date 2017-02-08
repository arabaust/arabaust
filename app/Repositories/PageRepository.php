<?php

namespace Admailer\Repositories;

use DB;
use Admailer\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageRepository {

function all()
{
	return Page::all();
}


    
}