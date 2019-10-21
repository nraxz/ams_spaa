
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
  scEventControl_data["title" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email_message" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["is_offer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["deposit_amount" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["active" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["title" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["title" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_message" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_message" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["is_offer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["is_offer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["deposit_amount" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["deposit_amount" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["active" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["active" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("is_offer" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("active" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
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
  $('#id_sc_field_title' + iSeqRow).bind('blur', function() { sc_admin_form_outcomes_title_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_admin_form_outcomes_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_email_message' + iSeqRow).bind('blur', function() { sc_admin_form_outcomes_email_message_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_admin_form_outcomes_email_message_onfocus(this, iSeqRow) });
  $('#id_sc_field_is_offer' + iSeqRow).bind('blur', function() { sc_admin_form_outcomes_is_offer_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_admin_form_outcomes_is_offer_onfocus(this, iSeqRow) });
  $('#id_sc_field_deposit_amount' + iSeqRow).bind('blur', function() { sc_admin_form_outcomes_deposit_amount_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_admin_form_outcomes_deposit_amount_onfocus(this, iSeqRow) });
  $('#id_sc_field_active' + iSeqRow).bind('blur', function() { sc_admin_form_outcomes_active_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_admin_form_outcomes_active_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_admin_form_outcomes_title_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_outcomes_mob_validate_title();
  scCssBlur(oThis);
}

function sc_admin_form_outcomes_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_outcomes_email_message_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_outcomes_mob_validate_email_message();
  scCssBlur(oThis);
}

function sc_admin_form_outcomes_email_message_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_outcomes_is_offer_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_outcomes_mob_validate_is_offer();
  scCssBlur(oThis);
}

function sc_admin_form_outcomes_is_offer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_outcomes_deposit_amount_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_outcomes_mob_validate_deposit_amount();
  scCssBlur(oThis);
}

function sc_admin_form_outcomes_deposit_amount_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_outcomes_active_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_outcomes_mob_validate_active();
  scCssBlur(oThis);
}

function sc_admin_form_outcomes_active_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("title", "", status);
	displayChange_field("email_message", "", status);
	displayChange_field("is_offer", "", status);
	displayChange_field("deposit_amount", "", status);
	displayChange_field("active", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_title(row, status);
	displayChange_field_email_message(row, status);
	displayChange_field_is_offer(row, status);
	displayChange_field_deposit_amount(row, status);
	displayChange_field_active(row, status);
}

function displayChange_field(field, row, status) {
	if ("title" == field) {
		displayChange_field_title(row, status);
	}
	if ("email_message" == field) {
		displayChange_field_email_message(row, status);
	}
	if ("is_offer" == field) {
		displayChange_field_is_offer(row, status);
	}
	if ("deposit_amount" == field) {
		displayChange_field_deposit_amount(row, status);
	}
	if ("active" == field) {
		displayChange_field_active(row, status);
	}
}

function displayChange_field_title(row, status) {
}

function displayChange_field_email_message(row, status) {
}

function displayChange_field_is_offer(row, status) {
}

function displayChange_field_deposit_amount(row, status) {
}

function displayChange_field_active(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_admin_form_outcomes_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
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

