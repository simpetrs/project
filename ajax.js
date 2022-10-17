function getPaymentNotification() {
    $.post("../notifications.php?payments", function success(data) {
        console.log(data)
        let m = JSON.parse(data)
        if (m != 1) {
            $("#messages").html(m)
            $('#messages').animate({
                scrollTop: $('#messages').get(0).scrollHeight
            }, 1500);
            Swal.fire({
                title: 'New message!',
                text: 'You have a new message(s)',
                icon: 'info',
                confirmButtonText: 'Cool'
            })

        }
    })
}

function getAppointment() {
    $.post("../notifications.php?appointment", function success(data) {
        console.log(data)
        return;
        let m = JSON.parse(data)
        if (m !== 1) {
            $("#appointments").html(m)
            $('#appointments').animate({
                scrollTop: $('#messages').get(0).scrollHeight
            }, 1500);
            Swal.fire({
                title: 'New Appointment!',
                text: 'You have a new appointment(s)',
                icon: 'info',
                confirmButtonText: 'Cool'
            })

        }
    })
}

function getMessages() {
    $.post("../notifications.php?messages", function success(data) {
        console.log(data)
        let m = JSON.parse(data)
        if (m !== 1) {
            $("#messages").html(m)
            // $('#messages').animate({
            //     scrollTop: $('#messages').get(0).scrollHeight
            // }, 1500);
            Swal.fire({
                title: 'New message!',
                text: 'You have a new message(s)',
                icon: 'info',
                confirmButtonText: 'Cool'
            })

        }
    })
}

$(document).ready(function() {
    getMessages()
    $('#appointments').animate({
        scrollTop: $('#messages').get(0).scrollHeight
    }, 1500);
   getAppointment()
})

setInterval(function () {
   getMessages()
    getAppointment()
}, 4000);