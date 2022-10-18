function getPaymentNotification() {
    $.post("../notifications.php?payments", function success(data) {
        console.log(data)
        let m = JSON.parse(data)
        if (m !== 1) {
            $("#payments").html(m)
            Swal.fire({
                title: 'Payments!',
                text: 'There is a payment.',
                icon: 'info',
                confirmButtonText: 'Cool'
            })

        }
    })
}

function getAppointment() {
    $.post("../notifications.php?appointment", function success(data) {
        console.log(data)
        // return;
        let m = JSON.parse(data)
        if (m !== 1) {
            $("#appointments").html(m)
            // $('#appointments').animate({
            //     scrollTop: $('#appointments').get(0).scrollHeight
            // }, 1500);
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

function cases() {
    $.post("../notifications.php?cases", function success(data) {
        console.log(data)
        let m = JSON.parse(data)
        if (m !== 1) {
            $("#cases").html(m)
            // $('#messages').animate({
            //     scrollTop: $('#messages').get(0).scrollHeight
            // }, 1500);
            Swal.fire({
                title: 'New case(s)!',
                text: 'New cases',
                icon: 'info',
                confirmButtonText: 'Cool'
            })

        }
    })
}

$(document).ready(function() {
    getMessages()
    getPaymentNotification()
   getAppointment()
    cases()
})

setInterval(function () {
   getMessages()
    getPaymentNotification()
    getAppointment()
    cases()
}, 4000);