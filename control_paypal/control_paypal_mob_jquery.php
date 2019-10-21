
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["description" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["application_fee" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["booking_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["venue_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["audition_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["venue_booking" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["description" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["application_fee" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["application_fee" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["booking_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["booking_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["venue_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["venue_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["audition_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["audition_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["venue_booking" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["venue_booking" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_description' + iSeqRow).bind('blur', function() { sc_control_paypal_description_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_paypal_description_onfocus(this, iSeqRow) });
  $('#id_sc_field_login' + iSeqRow).bind('blur', function() { sc_control_paypal_login_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_paypal_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_venue_booking' + iSeqRow).bind('blur', function() { sc_control_paypal_venue_booking_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_paypal_venue_booking_onfocus(this, iSeqRow) });
  $('#id_sc_field_booking_id' + iSeqRow).bind('blur', function() { sc_control_paypal_booking_id_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_paypal_booking_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_venue_id' + iSeqRow).bind('blur', function() { sc_control_paypal_venue_id_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_control_paypal_venue_id_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_paypal_venue_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_audition_id' + iSeqRow).bind('blur', function() { sc_control_paypal_audition_id_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_paypal_audition_id_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_paypal_audition_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_application_fee' + iSeqRow).bind('blur', function() { sc_control_paypal_application_fee_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_control_paypal_application_fee_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_paypal_description_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_description();
  scCssBlur(oThis);
}

function sc_control_paypal_description_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_paypal_login_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_login();
  scCssBlur(oThis);
}

function sc_control_paypal_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_paypal_venue_booking_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_venue_booking();
  scCssBlur(oThis);
}

function sc_control_paypal_venue_booking_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_paypal_booking_id_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_booking_id();
  scCssBlur(oThis);
}

function sc_control_paypal_booking_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_paypal_venue_id_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_venue_id();
  scCssBlur(oThis);
}

function sc_control_paypal_venue_id_onchange(oThis, iSeqRow) {
  lookup_venue_id();
}

function sc_control_paypal_venue_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_paypal_audition_id_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_audition_id();
  scCssBlur(oThis);
}

function sc_control_paypal_audition_id_onchange(oThis, iSeqRow) {
  lookup_audition_id();
}

function sc_control_paypal_audition_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_paypal_application_fee_onblur(oThis, iSeqRow) {
  do_ajax_control_paypal_mob_validate_application_fee();
  scCssBlur(oThis);
}

function sc_control_paypal_application_fee_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("description", "", status);
	displayChange_field("login", "", status);
	displayChange_field("application_fee", "", status);
	displayChange_field("booking_id", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("venue_id", "", status);
	displayChange_field("audition_id", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("venue_booking", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_description(row, status);
	displayChange_field_login(row, status);
	displayChange_field_application_fee(row, status);
	displayChange_field_booking_id(row, status);
	displayChange_field_venue_id(row, status);
	displayChange_field_audition_id(row, status);
	displayChange_field_venue_booking(row, status);
}

function displayChange_field(field, row, status) {
	if ("description" == field) {
		displayChange_field_description(row, status);
	}
	if ("login" == field) {
		displayChange_field_login(row, status);
	}
	if ("application_fee" == field) {
		displayChange_field_application_fee(row, status);
	}
	if ("booking_id" == field) {
		displayChange_field_booking_id(row, status);
	}
	if ("venue_id" == field) {
		displayChange_field_venue_id(row, status);
	}
	if ("audition_id" == field) {
		displayChange_field_audition_id(row, status);
	}
	if ("venue_booking" == field) {
		displayChange_field_venue_booking(row, status);
	}
}

function displayChange_field_description(row, status) {
}

function displayChange_field_login(row, status) {
}

function displayChange_field_application_fee(row, status) {
}

function displayChange_field_booking_id(row, status) {
}

function displayChange_field_venue_id(row, status) {
}

function displayChange_field_audition_id(row, status) {
}

function displayChange_field_venue_booking(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_control_paypal_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

