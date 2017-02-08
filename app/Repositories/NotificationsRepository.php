<?php

namespace Admailer\Repositories;

use Auth;
use Carbon\Carbon;
use Admailer\Models\User;
use Admailer\Models\RoleClients;
use Admailer\Models\Notifications;
use Admailer\Models\NotificationRoleClients;

class NotificationsRepository {

    public function notification_roles($id){
        return NotificationRoleClients::leftJoin('roles_clients as rc', 'rc.id', '=', 'notifications_role_clients.role_clients_id')
            ->where('notifications_id', $id)
            ->lists('rc.role_title', 'notifications_role_clients.id')
            ->toArray();
    }

    public function created_by($created_by)
    {
        if ($created_by != 0) {
            return $created_by = User::select('username')->findOrFail($created_by);
        } else {
            return $created_by = '';
        }

    }

    public function updated_by($updated_by)
    {
    	 if ($updated_by != 0) {
            return $updated_by = User::select('username')->findOrFail($updated_by);
        } else {
            return $updated_by = '';
        }
    }

    public function send($id)
    {
        return Notifications::findOrFail($id)->update([
            'status' => 1,
            'sent_on' => Carbon::now()
        ]);
    }

    // takes client_id
    public static function client_notifications($id)
    {
      return Notifications::join('notifications_role_clients', 'notifications_role_clients.notifications_id', '=', 'notifications.id')
                            ->where('notifications_role_clients.client_id', '=', $id)
                            ->where('notifications.status', '=' , 1)
                            ->get(['notifications_role_clients.id as notification_client_id', 'notifications_role_clients.read', 'notifications.id as notification_id', 'notifications.name', 'notifications.description', 'notifications.sent_on']);
    }

    // takes client_id, notification_id
    public static function notification($client_id, $notification_id)
    {
      return Notifications::join('notifications_role_clients', 'notifications_role_clients.notifications_id', '=', 'notifications.id')
                            ->where('notifications_role_clients.notifications_id', '=', $notification_id)
                            ->where('notifications_role_clients.client_id', '=', $client_id)
                            ->where('notifications.status', '=' , 1)
                            ->get(['notifications.id', 'notifications.name', 'notifications.description', 'notifications.sent_on', 'notifications_role_clients.read'])->first();
    }

    public static function count_client_notifications($id)
    {
      return NotificationRoleClients::join('notifications', 'notifications_role_clients.notifications_id', '=', 'notifications.id')
                                    ->where('notifications.status', '=' , 1)
                                    ->where('client_id', '=', $id)->count();
    }

    public static function count_client_unread_notifications($id)
    {
      return NotificationRoleClients::join('notifications', 'notifications_role_clients.notifications_id', '=', 'notifications.id')
                                    ->where('notifications.status', '=' , 1)
                                    ->where('client_id', '=', $id)->where('notifications_role_clients.read', 0)->count();
    }

    public static function mark_read($ids, $client_id)
    {
      return NotificationRoleClients::where('client_id', '=', $client_id)->whereIn('id', $ids)->update(array('read' => 1));
    }

    public static function mark_unread($ids, $client_id)
    {
      return NotificationRoleClients::where('client_id', '=', $client_id)->whereIn('id', $ids)->update(array('read' => 0));
    }

    public static function destroy($ids, $client_id)
    {
      return NotificationRoleClients::where('client_id', '=', $client_id)->whereIn('id', $ids)->delete();
    }

}
