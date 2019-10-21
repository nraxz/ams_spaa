
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
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["category" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["short" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["type_of_audition" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["active" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["category" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["category" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["short" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["short" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["type_of_audition" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["type_of_audition" + iSeqRow]["change"]) {
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
  if ("type_of_audition" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_admin_form_marking_categories_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_admin_form_marking_categories_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_category' + iSeqRow).bind('blur', function() { sc_admin_form_marking_categories_category_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_admin_form_marking_categories_category_onfocus(this, iSeqRow) });
  $('#id_sc_field_short' + iSeqRow).bind('blur', function() { sc_admin_form_marking_categories_short_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_admin_form_marking_categories_short_onfocus(this, iSeqRow) });
  $('#id_sc_field_type_of_audition' + iSeqRow).bind('blur', function() { sc_admin_form_marking_categories_type_of_audition_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_admin_form_marking_categories_type_of_audition_onfocus(this, iSeqRow) });
  $('#id_sc_field_active' + iSeqRow).bind('blur', function() { sc_admin_form_marking_categories_active_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_admin_form_marking_categories_active_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_admin_form_marking_categories_id_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_marking_categories_validate_id();
  scCssBlur(oThis);
}

function sc_admin_form_marking_categories_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_marking_categories_category_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_marking_categories_validate_category();
  scCssBlur(oThis);
}

function sc_admin_form_marking_categories_category_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_marking_categories_short_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_marking_categories_validate_short();
  scCssBlur(oThis);
}

function sc_admin_form_marking_categories_short_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_marking_categories_type_of_audition_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_marking_categories_validate_type_of_audition();
  scCssBlur(oThis);
}

function sc_admin_form_marking_categories_type_of_audition_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_admin_form_marking_categories_active_onblur(oThis, iSeqRow) {
  do_ajax_admin_form_marking_categories_validate_active();
  scCssBlur(oThis);
}

function sc_admin_form_marking_categories_active_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id", "", status);
	displayChange_field("category", "", status);
	displayChange_field("short", "", status);
	displayChange_field("type_of_audition", "", status);
	displayChange_field("active", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_category(row, status);
	displayChange_field_short(row, status);
	displayChange_field_type_of_audition(row, status);
	displayChange_field_active(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("category" == field) {
		displayChange_field_category(row, status);
	}
	if ("short" == field) {
		displayChange_field_short(row, status);
	}
	if ("type_of_audition" == field) {
		displayChange_field_type_of_audition(row, status);
	}
	if ("active" == field) {
		displayChange_field_active(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_category(row, status) {
}

function displayChange_field_short(row, status) {
}

function displayChange_field_type_of_audition(row, status) {
}

function displayChange_field_active(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_admin_form_marking_categories_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(37);
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

