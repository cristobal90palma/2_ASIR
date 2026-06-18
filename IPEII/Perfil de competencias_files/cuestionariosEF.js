function doActionSubmit(restPostUrl, redirectPath, status) {
	cleanCuesitonarioValidationError();
	var valid = validate();
	if (valid) {
		createValuesMap();
		document.inputValues.set("idCuestionario", $("input[name='idCuestionario']").val());
		document.inputValues.set("idEncuesta", $("input[name='idEncuesta']").val());
		document.inputValues.set("_csrf", $("input[name='_csrf']").val());
		document.inputValues.set("redirectPath", redirectPath);
		document.inputValues.set("status", status);

		if ($("#captchaVerification").val() != undefined) {
			document.inputValues.set("captchaVerification", "1");
			grecaptcha.ready(function () {
				grecaptcha.execute($("#captchaVerification").val(), { action: 'submit' }).then(function (token) {
					document.inputValues.set("securityToken", token);
					document.inputValues.set("securitySecretKey", $("#secretKey").val());

					disableButtons();
					showSpinner();
					submitValidatedForm(restPostUrl, redirectPath);
				});
			});
		} else {
			disableButtons();
			showSpinner();
			submitValidatedForm(restPostUrl, redirectPath);
		}
	}
}

function submitValidatedForm(restPostUrl, redirectPath) {

	datos = JSON.stringify(Object.fromEntries(document.inputValues));

	$.ajax({
		type: 'post',
		url: restPostUrl,
		data: datos,
		contentType: 'application/json',
		success: function (response) {
			window.location.replace(redirectPath + "?idCef=" + response.idCef);
			enableButtons();
			hideSpinner();
		},
		error: function (errMsg) {
			cuesitonarioValidationError();
			if (errMsg.status == "403") {
				$("#error_msg_security").show();
			} else {
				$("#error_msg_save").show();
			}
			enableButtons();
			hideSpinner();
			return false;
		}
	});
}

function createValuesMap() {
	document.inputValues = new Map();

	$('[data-ef-field="cuestionario"]').each(function () {
		let fieldType = $(this).attr("data-campo-type");
		switch (fieldType) {
			case "unica":
				let inputValue = $('input[name="opt-' + $(this).attr("name") + '"]:checked').val();
				if ($('input[name="' + $(this).attr("name") + '"]:checked').hasClass("con-caja-hija")) {
					let idInputValue = $('input[name="' + $(this).attr("name") + '"]:checked').attr('id');
					inputValue += "#" + $("#dep-" + idInputValue).val();
				}
				document.inputValues.set($(this).attr("name"), inputValue);
				break;
			case "multiple":
				let totalMultiValue = "";
				$('input[name="opt-' + $(this).attr("name") + '"]').each(function () {
					if ($(this).is(":checked")) {
						if (totalMultiValue != "") {
							totalMultiValue += ";";
						}

						totalMultiValue += $(this).val();
						let idInputValue = $(this).attr('id');
						if ($(this).hasClass("con-caja-hija")) {
							totalMultiValue += "#" + $("#dep-" + idInputValue).val();
						}
					}
				});

				document.inputValues.set($(this).attr("name"), totalMultiValue);
				break;
			case "valoracion":
				let allValues = "";
				var rows = $('input[data-row-name="row_' + $(this).attr("name") + '"]');
				let notAnswer = true;

				for (var i = 0; i < rows.length; i++) {
					let els = $("input[name='row_" + $(this).attr("name") + "_" + rows[i].value + "']");
					for (var j = 0; j < els.length; j++) {
						if (els[j].checked) {
							if (allValues != "") {
								allValues += ";";
							}

							allValues += rows[i].value + "-" + els[j].value;
							notAnswer = false;
						}
					}
					if (notAnswer) {
						if (allValues != "") {
							allValues += ";";
						}
						allValues += rows[i].value + "-";
					}
					notAnswer = true;
				}

				document.inputValues.set($(this).attr("name"), allValues);
				break;
				case "desplegable":
					let inputDespValue = "";
					$('option[name="opt-' + $(this).attr("name") + '"]').each(function () {
						if ($(this).is(":selected")) {
							inputDespValue = $(this).val();
							if ($(this).hasClass("con-caja-hija")) {
								let idInputValue = $(this).attr('id');
								inputDespValue += "#" + $("#dep-" + idInputValue).val();
							}
							return false;
						}
					});

					document.inputValues.set($(this).attr("name"), inputDespValue);
					break;
				
			default:
				console.log("name" ,$(this).attr("name"),"val",  $(this).val(),"this",  $(this))
				document.inputValues.set($(this).attr("name"), $(this).val());
				break;
		}
	});

	if ($('#pathPageInput').length && $('#pathPageInput').val() !== "") {
		document.inputValues.set('pathPageInput', $('#pathPageInput').val());

	}	
}

function cleanValuesMap() {
	document.inputValues = new Map();

	$('[data-ef-field="cuestionario"]').each(function () {
		let fieldType = $(this).attr("data-campo-type");
		switch (fieldType) {
			case "unica":
				if ($('textarea[name="dep-' + $(this).attr("name") + '"]').length > 0) {
					$('textarea[name="dep-' + $(this).attr("name") + '"]').val("");
					$('textarea[name="dep-' + $(this).attr("name") + '"]').hide();
				}
				$('input[name="opt-' + $(this).attr("name") + '"]:checked').prop('checked', false);
				break;
			case "multiple":
				$('input[name="opt-' + $(this).attr("name") + '"]').each(function () {
					if ($(this).is(":checked")) {
						$(this).prop('checked', false);
						let idInputValue = $(this).attr('id');
						if ($(this).hasClass("con-caja-hija")) {
							$("#dep-" + idInputValue).val("");
							$("#dep-" + idInputValue).hide();
						}
					}
				});
				break;
			case "valoracion":
				var rows = $('input[data-row-name="row_' + $(this).attr("name") + '"]');

				for (var i = 0; i < rows.length; i++) {
					let els = $('input[name="' + rows[i].value + '"]');
					for (var j = 0; j < els.length; j++) {
						if (els[j].checked) {
							els[j].checked = false;
							break;
						}
					}
				}
				break;
			case "desplegable":
				$('option[name="opt-' + $(this).attr("name") + '"]').each(function () {
					if($(this).is(":selected")) {
						let idOption = $(this).attr('id');
						if($(this).hasClass("con-caja-hija")) {
							$("#dep-" + idOption).hide();
						}
					}
				});
				let defaultOption = $('option[id="opt-desp-rmv"]');
				defaultOption.is(":selected");
				break;
			default:
				$(this).attr("name"), $(this).val("");
				break;
		}
	});
}

function validate() {
	let errorList = new Map();

	$('[data-ef-field="cuestionario"][data-required="true"]').each(function () {
		let fieldType = $(this).attr("data-campo-type");
		if ($(this).is(":visible") || $(this).attr("data-campo-type") == "cno" || $(this).attr("data-campo-type") == "cnae" || $(this).attr("data-campo-type") == "tesauro") {
			switch (fieldType) {
				case "unica":
				case "multiple":
					if ($('input[name="opt-' + $(this).attr("name") + '"]:checked').length == 0) {
						errorList.set($(this).attr("name"));
						addRequiredErrorMsg($(this).attr("name"));
					} else {
						$('input[name="opt-' + $(this).attr("name") + '"]:checked').each(function () {
							let idInputValue = $(this).attr('id');
							if ($(this).hasClass("con-caja-hija")) {
								if ($("#dep-" + idInputValue).val() == "") {
									errorList.set($(this).attr("name"));
									addRequiredErrorMsg($(this).attr("data-pregunta"));
								}
							}
						});
					}
					break;
				case "valoracion":
					var rows = $('input[data-row-name="row_' + $(this).attr("name") + '"]');
					let isValid = checkTableSelections(rows, $(this).attr("name"));
					if (!isValid) {
						errorList.set($(this).attr("name"));
						addRequiredErrorMsg($(this).attr("name"));
					}
					break;
				case "formCaptcha":
					if ($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) {
						errorList.set($(this).attr("name"));
						captchaRequiredError();
					} else {
						var validationPath = $(this).attr("data-sec-captcha");
						var validationParams = "valorCaptcha=" + $(this).val();
						if (!captchaValidation(validationPath, validationParams)) {
							errorList.set($(this).attr("name"));
							captchaValidationError();
						}
					}
					break;
				case "cno":
				case "cnae":
				case "tesauro":
					if ($(this).attr("data-oculto") == "false") {
						if ($(this).val() == null || $(this).val() == "" || $(this).val() == undefined) {
							errorList.set($(this).attr("name"), $(this).val());
							addRequiredErrorMsg($(this).attr("name"));
						}
					}
					break;
				case "desplegable":
					let selectedOpt = $(this).find('option:selected');
					let selectedVal = selectedOpt.attr('id');

					if(selectedVal === 'opt-desp-rmv') {
						errorList.set($(this).attr("name"), $(this).val());
						addRequiredErrorMsg($(this).attr("name"));
					}
 					break;
				case "text":
					if ($(this).val() != "") {
						if ($("#regex-" + $(this).attr("name")).length > 0) {
							const regex = new RegExp($("#regex-" + $(this).attr("name")).val().slice(1, -1));
							if (!regex.test($(this).val())) {
								errorList.set($(this).attr("name"), $(this).val());
								let msg = $("#regex-msg-" + $(this).attr("name")).val();
								addValidationErrorMsg($(this).attr("name"), msg);
								addErrorStyle($(this).attr("name"));
							}
						}
					}
				default:
					if ($(this).val() == "") {
						errorList.set($(this).attr("name"), $(this).val());
						addRequiredErrorMsg($(this).attr("name"));
					}
					break;
			}
		}
	});

	if (errorList.size == 0) {
		return true;
	} else {
		return false;
	}
}

function addErrorStyle(name) {
	$("#" + name).addClass("validation-failure");
}

function addRequiredErrorMsg(name) {
	addErrorStyle(name);
	$("#error_required_" + name).show();
}

function addValidationErrorMsg(name, msg) {
	$("#error_msg_" + name).show();
	$("#error_msg_" + name).text(msg);
}

function addValidationErrorStyle(name) {
	$("#" + name).removeClass("validation-failure");
}

function cleanValidation(name) {
	$("#" + name).removeClass("validation-failure");
	$("#error_required_" + name).hide();
	$("#error_msg_" + name).hide();
}

function captchaRequiredError() {
	$("#captchaEmpresa").addClass("validation-failure");
	$("p#error_required_captchaError").show();
}

function captchaValidationError() {
	$("#captchaEmpresa").addClass("validation-failure");
	$("p#error_required_captchaError").show();
}

function cleanCaptchaValidationError() {
	$("#captchaEmpresa").removeClass("validation-failure");
	$("p#error_required_captchaError").hide();
	$("p#error_msg_captchaError").hide();
}

function cuesitonarioValidationError() {
	$(".form-app").addClass("validation-failure");
}

function cleanCuesitonarioValidationError() {
	$(".form-app").removeClass("validation-failure");
	$("#error_msg_save").hide();
	$("#error_msg_security").hide();
}

function hidePreguntasDependientes(current, dependiente) {
	let hide = false;
	$('div.pregunta').each(function () {
		if ($(this).attr("id") == dependiente) {
			hide = false;
		}

		if (hide) {
			$(this).hide();
			let thisInput = "";

			if ($(this).children("div.busc-row").children("input[type='hidden']").attr("data-oculto") == "false") {
				thisInput = $(this).children("div.busc-row").children("input[type='hidden']").attr("data-oculto", "true");
			}
			if ($(this).children("div.busc-row").children("div.busc-row").children("input[type='hidden']").attr("data-oculto") == "false") {
				thisInput = $(this).children("div.busc-row").children("div.busc-row").children("input[type='hidden']").attr("data-oculto", "true");
			}
		}

		if ($(this).attr("id") == current) {
			hide = true;
		}
	});
}

function showPreguntasDependientes(current, dependiente) {
	let hide = false;
	$('div.pregunta').each(function () {
		if ($(this).attr("id") == dependiente) {
			hide = false;
		}

		if (hide) {
			$(this).show();
			let thisInput = "";

			if ($(this).children("div.busc-row").children("input[type='hidden']").attr("data-oculto") == "true") {
				thisInput = $(this).children("div.busc-row").children("input[type='hidden']").attr("data-oculto", "false");
			}
			if ($(this).children("div.busc-row").children("div.busc-row").children("input[type='hidden']").attr("data-oculto") == "true") {
				thisInput = $(this).children("div.busc-row").children("div.busc-row").children("input[type='hidden']").attr("data-oculto", "false");
			}
		}

		if ($(this).attr("id") == current) {
			hide = true;
		}
	});
}

function procesarFormulario() {
	var pathToSend = "";
	if (window.location.href.includes("magnoliaAuthor")) {
		pathToSend = window.location.href.split("/magnoliaAuthor")[0] + "/captchaProject/encuesta.do";
	} else if (window.location.href.includes("magnoliaPublic")) {
		pathToSend = window.location.href.split("/magnoliaPublic")[0] + "/captchaProject/encuesta.do";
	} else {
		pathToSend = window.location.href.split("/encuestas/")[0] + "/captchaProject/encuesta.do";
	}
	post(pathToSend);
	return false;
}


function captchaValidation(url, params) {
	var result = false;
	$.ajax({
		url: url,
		type: "POST",
		async: false,
		contentType: 'application/x-www-form-urlencoded',
		data: params,
		success: function (response) {
			if (response === "true") {
				cleanCaptchaValidationError()
				result = true;
			} else {
				reloadCaptcha();
				result = false;
			}
		}
	});
	return result;
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

function disableButtons() {
	var botones = document.getElementsByClassName("btn-primary");
	for (var i = 0; i < botones.length; i++) {
		botones[i].disabled = true;
	}
}

function enableButtons() {
	var botones = document.getElementsByClassName("btn-primary");
	for (var i = 0; i < botones.length; i++) {
		botones[i].disabled = false;
	}
}

function showSpinner() {
	document.getElementById("loading-container").classList.add("is-visible"); //start the load
}

function hideSpinner() {
	document.getElementById("loading-container").classList.remove("is-visible"); //stop the load
}

$(document).ready(function () {
	$("input:radio").change(function () {
		cleanValidation($(this).attr("data-pregunta"));
		let idInputValue = $(this).attr('id');
		if ($('input[name="' + $(this).attr("name") + '"]:checked').hasClass("con-caja-hija")) {
			$("#dep-" + idInputValue).show();
		} else {
			$('textarea[name="dep-' + $(this).attr("data-pregunta") + '"]').hide();
		}

		if ($('input[name="' + $(this).attr("name") + '"]:checked').hasClass("preg-dependiente")) {
			hidePreguntasDependientes($(this).attr("data-pregunta"), $(this).attr("data-pregunta-dep"));
		} else if ($('input[name="' + $(this).attr("name") + '"]').hasClass("preg-dependiente")) {
			showPreguntasDependientes($(this).attr("data-pregunta"), $('input[name="' + $(this).attr("name") + '"].preg-dependiente').attr("data-pregunta-dep"));
		}
	});

	$("input:checkbox").change(function () {
		cleanValidation($(this).attr("data-pregunta"));
		if ($(this).hasClass("con-caja-hija")) {
			if ($(this).is(":checked")) {
				$("#dep-" + $(this).attr('id')).show();
			} else {
				$("#dep-" + $(this).attr('id')).hide();
			}
		}
	});

	$("input[data-ef-field='cuestionario']").change(function () {
		cleanValidation($(this).attr("name"));
	});

	$("textarea[data-ef-field='cuestionario']").on("change paste keyup", function () {
		cleanValidation($(this).attr("name"));
	});

	$("textarea.se-flexible-anexo").on("change paste keyup", function () {
		cleanValidation($(this).attr("data-pregunta"));
	});

	$("label.table-radio-label").change(function () {
		if ($(this).closest("table").attr("data-required") == "true" && $(this).closest("div").hasClass("validation-failure")) {
			if (checkTableSelections($('input[data-row-name="row_' + $(this).attr("id") + '"]'), $(this).attr("id"))) {
				cleanValidation($(this).closest("div").attr("id"));
			}
		}
	});

	$("select[data-ef-field='cuestionario']").change(function () {
		cleanValidation($(this).attr("name"));
		let options = $(this).find('option');
		options.each(function() {
			if($(this).is(":selected")) {
				if($(this).hasClass("con-caja-hija")) {
					$("#dep-" + $(this).attr('id')).show();
				}
			} else {
				if($(this).hasClass("con-caja-hija")) {
					$("#dep-" + $(this).attr('id')).hide();
				}
			}
		});
	});

	$('.cnae-busc-sel').click(function () {
		var name = $(this).parent().find("input[type=hidden]").attr("name");
		cleanValidation(name);
	}); 

	$('.tes-busc-sel').click(function () {
		var name = $(this).parent().find("input[type=hidden]").attr("name");
		cleanValidation(name);
	});

	$(document).on("click", "p[data-cno-id]", function () {
		var name = $(this).closest('.pregunta').find('input[type=hidden][data-campo-type="cno"]').attr('name');
		cleanValidation(name);
	});

	$(".bt-ef-return").click(function () {
		history.go(-1); return false;
	});

	$(".bt-ef-clean").click(function () {
		cleanValuesMap();
		location.reload();
	});

	$(".bt-ef-save").click(function () {
		doActionSubmit($(this).attr("data-rest-url"), $(this).attr("data-redirect-page"), 2);
	});

	$(".bt-ef-submit").click(function () {
		doActionSubmit($(this).attr("data-rest-url"), $(this).attr("data-redirect-page"), 1);
	});

	$(".bt-ef-next").click(function () {
		doActionSubmit($(this).attr("data-rest-url"), $(this).attr("data-redirect-page"), 1);
		cleanValuesMap();
	});

});

function includeContent(contentLink, jqueryComponentId) {
	$.ajax({
		type: "POST",
		url: contentLink,
		success: function (data) {
			jQuery(jqueryComponentId).replaceWith(data);
			$("button.se-headnav--menubtn").remove();
		}
	});

	return false;
}

function clickOnValoration() {
	let radio = $(this).children("input[type='radio']");

	if (radio.length > 0) {
		if (radio.is(":checked")) {
			radio.prop("checked", false);
		} else {
			radio.prop("checked", true);
		}
	}
}

function checkTableSelections(rows, id) {
	let opts;
	let isChecked = false;
	let counter = 0;
	rows.each(function (i) {
		opts = $("input[name='row_" + id + "_" + $(this).val() + "']");
		for (var j = 0; j < opts.length; j++) {
			if (opts[j].checked) {
				isChecked = true;
			}
		}
		if (isChecked) {
			counter++;
			isChecked = false;
			$(this).closest("tr").removeClass("validation-failure");
		} else {
			$(this).closest("tr").addClass("validation-failure");
		}
	});

	if (counter == rows.length) {
		return true;
	}
	else {
		return false;
	}
}
