
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
  scEventControl_data["fullname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mobile" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["relationships" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["fullname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fullname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mobile" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mobile" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relationships" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relationships" + iSeqRow]["change"]) {
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
  $('#id_sc_field_fullname' + iSeqRow).bind('blur', function() { sc_form_next_of_kin_fullname_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_next_of_kin_fullname_onfocus(this, iSeqRow) });
  $('#id_sc_field_mobile' + iSeqRow).bind('blur', function() { sc_form_next_of_kin_mobile_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_next_of_kin_mobile_onfocus(this, iSeqRow) });
  $('#id_sc_field_relationships' + iSeqRow).bind('blur', function() { sc_form_next_of_kin_relationships_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_next_of_kin_relationships_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_next_of_kin_fullname_onblur(oThis, iSeqRow) {
  do_ajax_form_next_of_kin_validate_fullname();
  scCssBlur(oThis);
}

function sc_form_next_of_kin_fullname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_next_of_kin_mobile_onblur(oThis, iSeqRow) {
  do_ajax_form_next_of_kin_validate_mobile();
  scCssBlur(oThis);
}

function sc_form_next_of_kin_mobile_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_next_of_kin_relationships_onblur(oThis, iSeqRow) {
  do_ajax_form_next_of_kin_validate_relationships();
  scCssBlur(oThis);
}

function sc_form_next_of_kin_relationships_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("fullname", "", status);
	displayChange_field("mobile", "", status);
	displayChange_field("relationships", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_fullname(row, status);
	displayChange_field_mobile(row, status);
	displayChange_field_relationships(row, status);
}

function displayChange_field(field, row, status) {
	if ("fullname" == field) {
		displayChange_field_fullname(row, status);
	}
	if ("mobile" == field) {
		displayChange_field_mobile(row, status);
	}
	if ("relationships" == field) {
		displayChange_field_relationships(row, status);
	}
}

function displayChange_field_fullname(row, status) {
}

function displayChange_field_mobile(row, status) {
}

function displayChange_field_relationships(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_next_of_kin_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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

