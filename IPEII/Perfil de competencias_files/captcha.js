// JavaScript Document
$(document).ready(function () {
	reloadCaptcha();
});


function hidedivCaptcha(pass) {
	var divs = document.getElementsByTagName('div');
	for (i = 0; i < divs.length; i++) {
		if (divs[i].id.match(pass)) {//if they are 'see' divs
			if (document.getElementById) // DOM3 = IE5, NS6
				divs[i].style.display = "none";// show/hide
			else
				if (document.layers) // Netscape 4
					document.layers[divs[i]].display = 'hidden';
				else // IE 4
					document.all.hideShow.divs[i].display = 'hidden';
		}
	}
}

function showdivCaptcha(pass) {
	var divs = document.getElementsByTagName('div');
	for (i = 0; i < divs.length; i++) {
		if (divs[i].id.match(pass)) {//if they are 'see' divs
			if (document.getElementById) // DOM3 = IE5, NS6
				divs[i].style.display = "block";// show/hide
			else
				if (document.layers) // Netscape 4
					document.layers[divs[i]].display = 'visible';
				else // IE 4
					document.all.hideShow.divs[i].display = 'block';
		}
	}
}

function mostrarImageCaptcha() {
	hidedivCaptcha('audioCaptcha');
	showdivCaptcha('imageCaptcha');
	return false;
}

function mostrarAudioCaptcha() {
	hidedivCaptcha('imageCaptcha');
	showdivCaptcha('audioCaptcha');
	return false;
}


function isIOS() {
	return (/iPad|iPhone|iPod/.test(navigator.platform) ||
		(navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1)) &&
		!window.MSStream;
}

function reloadCaptcha() {
	var ayudaCaptcha1 = $("div#ayudaCaptcha1");
	var ua = window.navigator.userAgent;
	var esExplorer = ua.indexOf("MSIE") > -1 || ua.indexOf("rv:") > -1;
	var divCaptchaAudio = document.getElementById('audioCaptcha');
	$("#imgPrincipalCaptcha").attr('src', "/captchaProject/ImageCaptcha.png#" + new Date().getTime());
	if (isIOS()) {
		divCaptchaAudio.innerHTML =
			'<object type="audio/x-wav" data="/captchaProject/AudioCaptcha.wav" class="audio">' +
			'<param name="src" value="/captchaProject/AudioCaptcha.wav" />' +
			'<param name="controller" value="true" />' +
			'<param name="autoplay" value="false" />' +
			'<param name="autostart" value="1" />' +
			'alt : <a href="/captchaProject/AudioCaptcha.wav">audio de seguridad</a>' +
			'</object>';
		divCaptchaAudio.innerHTML += ayudaCaptcha1.clone();
	} else {
		$("#audioInitialCaptcha").load();
	}
}
