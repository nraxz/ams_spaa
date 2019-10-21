
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
  scEventControl_data["full_address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["country" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contact_number" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["full_address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["full_address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contact_number" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contact_number" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("country" + iSeq == fieldName) {
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
  $('#id_sc_field_full_address' + iSeqRow).bind('blur', function() { sc_form_contact_detail_full_address_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_contact_detail_full_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_country' + iSeqRow).bind('blur', function() { sc_form_contact_detail_country_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_contact_detail_country_onfocus(this, iSeqRow) });
  $('#id_sc_field_contact_number' + iSeqRow).bind('blur', function() { sc_form_contact_detail_contact_number_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_contact_detail_contact_number_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_contact_detail_full_address_onblur(oThis, iSeqRow) {
  do_ajax_form_contact_detail_mob_validate_full_address();
  scCssBlur(oThis);
}

function sc_form_contact_detail_full_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contact_detail_country_onblur(oThis, iSeqRow) {
  do_ajax_form_contact_detail_mob_validate_country();
  scCssBlur(oThis);
}

function sc_form_contact_detail_country_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_contact_detail_contact_number_onblur(oThis, iSeqRow) {
  do_ajax_form_contact_detail_mob_validate_contact_number();
  scCssBlur(oThis);
}

function sc_form_contact_detail_contact_number_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("full_address", "", status);
	displayChange_field("country", "", status);
	displayChange_field("contact_number", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_full_address(row, status);
	displayChange_field_country(row, status);
	displayChange_field_contact_number(row, status);
}

function displayChange_field(field, row, status) {
	if ("full_address" == field) {
		displayChange_field_full_address(row, status);
	}
	if ("country" == field) {
		displayChange_field_country(row, status);
	}
	if ("contact_number" == field) {
		displayChange_field_contact_number(row, status);
	}
}

function displayChange_field_full_address(row, status) {
}

function displayChange_field_country(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_country__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_country" + row).select2("destroy");
		}
		scJQSelect2Add(row, "country");
	}
}

function displayChange_field_contact_number(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_country("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_contact_detail_mob_form" + pageNo).hide();
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
  if (null == specificField || "country" == specificField) {
    scJQSelect2Add_country(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_country(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_country_obj" : "#id_sc_field_country" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_country_obj',
      dropdownCssClass: 'css_country_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_country) { displayChange_field_country(iLine, "on"); } }, 150);
} // scJQElementsAdd

