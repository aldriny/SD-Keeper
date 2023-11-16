const longInput = document.getElementsByName('userLong');
const latInput = document.getElementsByName('userLat');
const accInput = document.getElementsByName('userAcc');

var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};

function success(pos) {
    var crd = pos.coords;


    latInput[0].value = crd.latitude
    longInput[0].value = crd.longitude
    accInput[0].value = crd.accuracy


}

function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);