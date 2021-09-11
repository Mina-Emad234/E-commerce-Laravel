var notificationsWrapper = $('.dropdown-notifications');
//get big li of of notification of ul of Right Side Of Navbar
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');

var notificationsCountElem = notificationsToggle.find('span[data-count]');

var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');
var channel = pusher.subscribe('order');
channel.bind('App\\Events\\NewOrder', function (data) {//get data from event
    var existingNotifications = notifications.html();//get notification body body
    var newNotificationHtml = `<a href="`+data.user_id+`"><div class="media-body"><h6 class="media-heading text-right">` + data.user_name + `</h6> <p class="notification-text font-small-3 text-muted text-right">` + data.comment + `</p><small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">` + data.date + data.time + `</p> </small></div></div></a>`;
    notifications.html(newNotificationHtml + existingNotifications);//add new notification
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);//counter
    notificationsWrapper.find('.notif-count').text(notificationsCount);//counter
    notificationsWrapper.show();
});
