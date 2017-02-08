<?php

namespace Admailer\Repositories;


use Admailer\Models\Chapters;
use Admailer\Models\Forms;

class FormsRepository {

    public function getChapters(){
        return Chapters::where('status', '=','1')->orderBy('name', 'asc')->lists('name', 'id');
    }

    public function deleteOldPdf($id){
    	$form = Forms::findOrFail($id);
    	unlink(public_path() . '/files/forms/' . $id . '/' . $form->old_pdf);
        return Forms::findOrFail($id)->update(['old_pdf' => '']);

    }

    public function client_forms($role_id)
    {
      return Forms::join('form_related', 'forms.id', '=', 'form_related.form_id')
                  ->orderby('form_related.order_num')
                  ->join('chapters', 'forms.chapter_id', '=', 'chapters.id')
                  ->where('chapters.status', '=', 1)
                  ->where('forms.status', '=', 1)
                  ->join('chapter_role_clients', 'forms.chapter_id', '=', 'chapter_role_clients.chapter_id')
                  ->where('chapter_role_clients.role_id', '=', $role_id)
                  ->get(['forms.id', 'forms.name', 'forms.status', 'forms.description', 'forms.chapter_id', 'forms.icon', 'forms.pdf', 'form_related.order_num']);
    }

    public function form($id, $role_id)
    {
      return Forms::join('chapter_role_clients', 'forms.chapter_id', '=', 'chapter_role_clients.chapter_id')
                   ->where('forms.status', '=', 1)
                   ->where('chapter_role_clients.role_id', '=', $role_id)
                   ->join('form_related', 'forms.id', '=', 'form_related.form_id')
                   ->where('forms.id', $id)->get(['forms.id', 'name', 'status', 'description', 'forms.chapter_id', 'icon', 'pdf', 'forms.created_at', 'forms.updated_at', 'form_related.order_num'])->first();
    }

    public function next($order, $chapter_id)
    {
      $next = Forms::join('form_related', 'forms.id', '=', 'form_related.form_id')
                    ->where('form_related.order_num', '>', $order)
                    ->where('forms.status', '=', 1)
                    ->orderby('form_related.order_num')
                    ->where('forms.chapter_id', '=', $chapter_id)->get(['forms.id'])->first();
      return ($next) ? $next->id : 0 ;
    }

    public function prev($order, $chapter_id)
    {
      $prev = Forms::join('form_related', 'forms.id', '=', 'form_related.form_id')
                    ->where('form_related.order_num', '<', $order)
                    ->where('forms.status', '=', 1)
                    ->orderby('form_related.order_num')
                    ->where('forms.chapter_id', '=', $chapter_id)->get(['forms.id'])->last();
      return ($prev) ? $prev->id : 0 ;
    }

}
