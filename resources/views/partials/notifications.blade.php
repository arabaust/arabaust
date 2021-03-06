<li class="dropdown">
    <a data-toggle="dropdown" class="tm-notification" href="">
        <i class="tmn-counts">{!! count($notifications) !!}</i>
    </a>

    <div class="dropdown-menu dropdown-menu-lg pull-right">
        <div class="listview" id="notifications">
            <div class="lv-header">
                Notification

                <ul class="actions">
                    <li class="dropdown">
                        <a href="" data-clear="notification">
                            <i class="md md-done-all"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="lv-body c-overflow">
                @foreach ($notifications as $notification)
                    <a class="lv-item" href="{{ url($notification->name) }} ">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="/img/profile-pics/1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">{!! $notification->name !!}</div>
                                <small class="lv-small">
                                    {!! $notification->description !!}
                                </small>
                            </div>
                        </div>
                    </a>
                @endforeach

                <!-- <a class="lv-item" href="">
                    <div class="media">
                        <div class="pull-left">
                            <img class="lv-img-sm" src="/img/profile-pics/1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lv-title">David Belle</div>
                            <small class="lv-small">Cum sociis natoque penatibus et magnis dis
                                parturient montes
                            </small>
                        </div>
                    </div>
                </a>
                <a class="lv-item" href="">
                    <div class="media">
                        <div class="pull-left">
                            <img class="lv-img-sm" src="/img/profile-pics/2.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lv-title">Jonathan Morris</div>
                            <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum,
                                dictum turpis vel
                            </small>
                        </div>
                    </div>
                </a>
                <a class="lv-item" href="">
                    <div class="media">
                        <div class="pull-left">
                            <img class="lv-img-sm" src="/img/profile-pics/3.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lv-title">Fredric Mitchell Jr.</div>
                            <small class="lv-small">Phasellus a ante et est ornare accumsan at vel
                                magnauis blandit turpis at augue ultricies
                            </small>
                        </div>
                    </div>
                </a>
                <a class="lv-item" href="">
                    <div class="media">
                        <div class="pull-left">
                            <img class="lv-img-sm" src="/img/profile-pics/4.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lv-title">Glenn Jecobs</div>
                            <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit
                                amet varius dignissim, dui est consectetur neque
                            </small>
                        </div>
                    </div>
                </a>
                <a class="lv-item" href="">
                    <div class="media">
                        <div class="pull-left">
                            <img class="lv-img-sm" src="/img/profile-pics/4.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lv-title">Bill Phillips</div>
                            <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula
                                quam, imperdiet vel ante placerat
                            </small>
                        </div>
                    </div>
                </a> -->
            </div>
        </div>

    </div>
</li>