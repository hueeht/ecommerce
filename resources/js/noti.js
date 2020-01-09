Pusher.logToConsole = true;

var pusher = new Pusher('0a8a0f804bf99152e213', {
    cluster: 'ap1',
    encrypted: true
});

var notificationsWrapper   = $('.dropdown-notify');
var notificationsToggle    = notificationsWrapper.find('span[data-toggle]');
var notificationsCountElem = notificationsToggle.find('i[data-count]');
var notificationsCount     = parseInt(notificationsCountElem.data('count'));
var notifications          = notificationsWrapper.find('ul.notification-content');
var channel = pusher.subscribe('SendStatus');
var image = "{{ asset('storage/images/icon-order.png') }}";
channel.bind('send-status', function(data) {
    var route = "http://127.0.0.1:8000/mark/"+data.id;
    var existingNotifications = notifications.html();
    var newNotificationHtml = `
                 <li class="item odd">
                    <a href="" class="product-image"><img src="`+image+`" width="65"></a>
                    <div class="product-details">
                        <a href="`+ route +`"><strong class="notification-title"> Your order [`+data.id+`] is `+data.status+` </strong></a><br>
                    </div>
                 </li>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
    var status = data.status;
    if(status === 'Shipping') {
        $.notify({
            title: '<strong></strong>',
            message: 'Your order ['+ data.id +'] is Shipping'
        },{
            type: 'warning'
        });
    }
    if(status === 'Shipped') {
        $.notify({
            title: '<strong></strong>',
            message: 'Your order ['+ data.id +'] is Shipped'
        },{
            type: 'success'
        });
    }
    if(status === 'Canceled') {
        $.notify({
            title: '<strong></strong>',
            message: 'Your order ['+ data.id +'] is Canceled'
        }, {
            type: 'danger'
        });
    }
});
