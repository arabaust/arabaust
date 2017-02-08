<?php

namespace Admailer\Creators;

use Auth;
use Admailer\Models\Clients;
use Admailer\Models\Notifications;
use Admailer\Models\NotificationRoleClients;

class NotificationCreator
{
   public function store($request)
    {
        $notification              = new Notifications();
        $notification->name        = $request['name'];
        $notification->description = $request['description'];
        $notification->status      = 0;
        $notification->save();

        foreach ($request['role_id'] as $key => $value) {
            $clients = Clients::where('role_id', $value)->get(['id']);

            foreach ($clients as $key => $client) {
                $notification_role = new NotificationRoleClients();
                $notification_role->notifications_id = $notification->id;
                $notification_role->role_clients_id = $value;
                $notification_role->client_id = $client->id;
                $notification_role->save();
            }

        }

        return $notification;
    }

    public function update($request, $id)
    {
        $notification = Notifications::findOrFail($id);
        NotificationRoleClients::where('notifications_id', $id)->delete();

        $notification->name        = $request['name'];
        $notification->description = $request['description'];
        $notification->status      = 0;
        $notification->save();

        foreach ($request['role_id'] as $key => $value) {
            $clients = Clients::where('role_id', $value)->get(['id']);

            foreach ($clients as $key => $client) {
                $notification_role = new NotificationRoleClients();
                $notification_role->notifications_id = $notification->id;
                $notification_role->role_clients_id = $value;
                $notification_role->client_id = $client->id;
                $notification_role->save();
            }
        }

        return $notification;
    }

    public function delete($id){
        NotificationsClients::where('role_id', $id)->delete();
        return Notifications::destroy($id);
    }

}