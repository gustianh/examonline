function getTimeFromMins(mins) {
    // do not include the first validation check if you want, for example,
    // getTimeFromMins(1530) to equal getTimeFromMins(90) (i.e. mins rollover)
    if (mins >= 24 * 60 || mins < 0) {
        throw new RangeError("Valid input should be greater than or equal to 0 and less than 1440.");
    }
    var h = mins / 60 | 0,
        m = mins % 60 | 0;
    return moment.utc().hours(h).minutes(m).format("hh:mm A");
}

$(document).ready(function () {
    $.getJSON('/ujian/batas_waktu/' + $("#id_ujian").val(), function (data) {
        const eventTime = new Date().getMilliseconds() + (data.batas_waktu * 60 * 1000); 
        const currentTime = new Date().getMilliseconds(); 
        const diffTime = eventTime - currentTime;
        const interval = 1000;
        let duration = moment.duration(diffTime, 'milliseconds');

        let timer = setInterval(function () {
            duration = moment.duration(duration - interval, 'milliseconds');
            $('#timer').text("Sisa waktu: " + duration.hours() + ":" + duration.minutes() + ":" + duration.seconds())
            
            if (duration.asSeconds() == 0)
            {
                clearInterval(timer);
                $("#soal").submit();
            }
        }, interval);
    });
})
