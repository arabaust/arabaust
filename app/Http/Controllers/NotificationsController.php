<?php

namespace Admailer\Http\Controllers;

use Illuminate\Http\Request;
use Admailer\Models\User;
use Admailer\Models\RoleClients;
use Admailer\Models\Notifications;
use Admailer\Models\NotificationRoleClients;
use Admailer\Creators\NotificationCreator;
use Admailer\Http\Requests\NotificationsRequest;
use Admailer\Repositories\NotificationsRepository;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    /**
     * @var notificationsRepository
     */
    private $notificationsRepository;
    /**
     * @var NotificationCreator
     */
    private $notificationCreator;

    public function __construct(NotificationsRepository $notificationsRepository, NotificationCreator $notificationCreator)
    {
        $this->notificationsRepository = $notificationsRepository;
        $this->notificationCreator     = $notificationCreator;
        $this->middleware('is.allowed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notifications      = Notifications::with('role')->get();
        $positions          = RoleClients::count();
        return view('notifications.index', compact('notifications', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles   = RoleClients::where('deleted', '=', 0)->where('status', '=', 1)->orderBy('role_title', 'asc')->lists('role_title', 'id');
        return view('notifications.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NotificationsRequest $request
     * @return Response
     */
    public function store(NotificationsRequest $request)
    {
        $this->notificationCreator->store($request->all());
        flash()->success('Notification created!');
        return redirect('notifications');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $notifications      = Notifications::findOrFail($id);
        $roles              = RoleClients::where('deleted', '=', 0)->where('status', '=', 1)->orderBy('role_title', 'asc')->lists('role_title', 'id');

        $notification_roles = $this->notificationsRepository->notification_roles($id);

        return view('notifications.edit', compact('notifications', 'roles', 'notification_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, NotificationsRequest $request)
    {
        $this->notificationCreator->update($request->all(), $id);
        flash()->success('Notification updated!');
        return redirect('notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Notifications::destroy($id);
    }

    /**
     * Send notification.
     *
     * @param  int  $id
     * @return Response
     */
    public function send($id)
    {
        $notification = $this->notificationsRepository->send($id);
        flash()->success('Notification sent!');
        return redirect('notifications');
    }

    /**
     * View notification.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id, $title)
    {
        $notifications = Notifications::findOrFail($id);
        $subject       = $title;

        return view('notifications.view', compact('notifications', 'subject'));
    }
}
