setInterval(() => {
    timedate = new Date()

    hours = timedate.getHours()
    minutes = timedate.getMinutes()
    seconds = timedate.getSeconds()

    document.getElementById('timer_hour').innerHTML = hours < 10 ? '0'+hours : hours
    document.getElementById('timer_minute').innerHTML = minutes < 10 ? '0'+minutes : minutes
    document.getElementById('timer_second').innerHTML = seconds < 10 ? '0'+seconds : seconds

    delete(timedate);
}, 1000);