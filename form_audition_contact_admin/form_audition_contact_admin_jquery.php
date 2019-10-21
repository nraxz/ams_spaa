
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
  scEventControl_data["contact_person" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["website" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["contact_person" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contact_person" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["website" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["website" + iSeqRow]["change"]) {
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
  $('#id_sc_field_contact_person' + iSeqRow).bind('blur', function() { sc_form_audition_contact_admin_contact_person_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_audition_contact_admin_contact_person_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_audition_contact_admin_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_audition_contact_admin_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone' + iSeqRow).bind('blur', function() { sc_form_audition_contact_admin_phone_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_audition_contact_admin_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_website' + iSeqRow).bind('blur', function() { sc_form_audition_contact_admin_website_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_audition_contact_admin_website_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_audition_contact_admin_contact_person_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_contact_admin_validate_contact_person();
  scCssBlur(oThis);
}

function sc_form_audition_contact_admin_contact_person_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_contact_admin_email_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_contact_admin_validate_email();
  scCssBlur(oThis);
}

function sc_form_audition_contact_admin_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_contact_admin_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_contact_admin_validate_phone();
  scCssBlur(oThis);
}

function sc_form_audition_contact_admin_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_contact_admin_website_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_contact_admin_validate_website();
  scCssBlur(oThis);
}

function sc_form_audition_contact_admin_website_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("contact_person", "", status);
	displayChange_field("email", "", status);
	displayChange_field("phone", "", status);
	displayChange_field("website", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_contact_person(row, status);
	displayChange_field_email(row, status);
	displayChange_field_phone(row, status);
	displayChange_field_website(row, status);
}

function displayChange_field(field, row, status) {
	if ("contact_person" == field) {
		displayChange_field_contact_person(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("phone" == field) {
		displayChange_field_phone(row, status);
	}
	if ("website" == field) {
		displayChange_field_website(row, status);
	}
}

function displayChange_field_contact_person(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_phone(row, status) {
}

function displayChange_field_website(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_audition_contact_admin_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(35);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

