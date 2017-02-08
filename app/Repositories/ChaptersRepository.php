<?php

namespace Admailer\Repositories;

use Admailer\Models\Chapters;
use Admailer\Models\Forms;

class ChaptersRepository {

    public function client_chapters($role_id)
    {
      return Chapters::join('chapter_role_clients', 'chapters.id', '=', 'chapter_role_clients.chapter_id')
                     ->where('chapter_role_clients.role_id', '=', $role_id)
                     ->where('chapters.status', '=', 1)
                     ->orderby('order_num', 'asc')
                     ->get(['chapters.id', 'name', 'status', 'description', 'icon', 'pdf', 'order_num']);
    }

    public function chapter($id, $role_id)
    {
      return Chapters::join('chapter_role_clients', 'chapters.id', '=', 'chapter_role_clients.chapter_id')
                     ->where('chapter_role_clients.role_id', '=', $role_id)
                     ->where('chapters.status', '=', 1)
                     ->where('chapters.id', $id)->get(['chapters.id', 'name', 'status', 'description', 'icon', 'pdf', 'order_num', 'chapters.created_at', 'chapters.updated_at'])->first();
    }

    public function chapter_forms($id, $role_id)
    {
      return Forms::join('form_related', 'forms.id', '=', 'form_related.form_id')
                  ->where('forms.chapter_id', $id)
                  ->where('forms.status', '=', 1)
                  ->join('chapter_role_clients', 'forms.chapter_id', '=', 'chapter_role_clients.chapter_id')
                  ->where('chapter_role_clients.role_id', '=', $role_id)
                  ->join('chapters', 'forms.chapter_id', '=', 'chapters.id')
                  ->where('chapters.status', '=', 1)
                  ->orderby('form_related.order_num')
                  ->get(['forms.id', 'forms.name', 'forms.status', 'forms.description', 'forms.chapter_id', 'forms.icon', 'forms.pdf', 'form_related.order_num']);
    }

    public function count_chapter_forms($id, $role_id)
    {
      return Forms::join('form_related', 'forms.id', '=', 'form_related.form_id')
                  ->where('forms.chapter_id', $id)
                  ->where('forms.status', '=', 1)
                  ->join('chapter_role_clients', 'forms.chapter_id', '=', 'chapter_role_clients.chapter_id')
                  ->where('chapter_role_clients.role_id', '=', $role_id)
                  ->join('chapters', 'forms.chapter_id', '=', 'chapters.id')
                  ->where('chapters.status', '=', 1)
                  ->count();
    }

    public function next($order, $role_id)
    {
      $next = Chapters::join('chapter_role_clients', 'chapters.id', '=', 'chapter_role_clients.chapter_id')
                      ->where('chapter_role_clients.role_id', '=', $role_id)
                      ->where('chapters.status', '=', 1)
                      ->orderby('chapters.order_num')
                      ->where('chapters.order_num', '>', $order)->get(['chapters.id'])->first();
      return ($next) ? $next->id : 0 ;
    }

    public function prev($order, $role_id)
    {
      $prev = Chapters::join('chapter_role_clients', 'chapters.id', '=', 'chapter_role_clients.chapter_id')
                      ->where('chapter_role_clients.role_id', '=', $role_id)
                      ->where('chapters.status', '=', 1)
                      ->orderby('chapters.order_num')
                      ->where('chapters.order_num', '<', $order)->get(['chapters.id'])->last();
      return ($prev) ? $prev->id : 0 ;
    }

}
