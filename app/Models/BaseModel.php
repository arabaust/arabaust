<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    public function scopeOrganisation($query)
    {
        return $query->where('organisation_id', Auth::user()->organisation_id);
    }

    /*
	*
	this function to cut the sentens in the limit latter with full word
	*
	*/
	public static function truncate($titleRecent, $maxWords,$maxChars)
	{      
	    $words = preg_split('/\s+/', $titleRecent);
	    $words = array_slice($words, 0, $maxWords);
	    $words = array_reverse($words);
	    $chars = 0;
	    $truncated = array();

	    while(count($words) > 0)
	    {
	        $fragment = trim(array_pop($words));
	        $chars += strlen($fragment);

	        if($chars > $maxChars) break;

	        $truncated[] = $fragment;
	    }

	    $result = implode($truncated, ' ');

	    if ($titleRecent == $result)
	    {
	        return $titleRecent;
	    }
	    else
	    {
	        return preg_replace('/\s\s+/', '', $result) . '...';
	    }
	}
}
