
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
  scEventControl_data["are_you" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apply_for_loan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["t_eligibility" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["loan_eligibility" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["m_eligibility" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maintenance_loan_eligibility" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["funding_support" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["are_you" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["are_you" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apply_for_loan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apply_for_loan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["t_eligibility" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["t_eligibility" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["loan_eligibility" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["loan_eligibility" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["m_eligibility" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["m_eligibility" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maintenance_loan_eligibility" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maintenance_loan_eligibility" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["funding_support" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["funding_support" + iSeqRow]["change"]) {
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
  $('#id_sc_field_are_you' + iSeqRow).bind('blur', function() { sc_form_funding_i_are_you_onblur(this, iSeqRow) })
                                     .bind('click', function() { sc_form_funding_i_are_you_onclick(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_funding_i_are_you_onfocus(this, iSeqRow) });
  $('#id_sc_field_apply_for_loan' + iSeqRow).bind('blur', function() { sc_form_funding_i_apply_for_loan_onblur(this, iSeqRow) })
                                            .bind('click', function() { sc_form_funding_i_apply_for_loan_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_funding_i_apply_for_loan_onfocus(this, iSeqRow) });
  $('#id_sc_field_loan_eligibility' + iSeqRow).bind('blur', function() { sc_form_funding_i_loan_eligibility_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_funding_i_loan_eligibility_onfocus(this, iSeqRow) });
  $('#id_sc_field_maintenance_loan_eligibility' + iSeqRow).bind('blur', function() { sc_form_funding_i_maintenance_loan_eligibility_onblur(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_funding_i_maintenance_loan_eligibility_onfocus(this, iSeqRow) });
  $('#id_sc_field_funding_support' + iSeqRow).bind('blur', function() { sc_form_funding_i_funding_support_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_funding_i_funding_support_onfocus(this, iSeqRow) });
  $('#id_sc_field_t_eligibility' + iSeqRow).bind('blur', function() { sc_form_funding_i_t_eligibility_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_funding_i_t_eligibility_onfocus(this, iSeqRow) });
  $('#id_sc_field_m_eligibility' + iSeqRow).bind('blur', function() { sc_form_funding_i_m_eligibility_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_funding_i_m_eligibility_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_funding_i_are_you_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_are_you();
  scCssBlur(oThis);
}

function sc_form_funding_i_are_you_onclick(oThis, iSeqRow) {
  do_ajax_form_funding_i_event_are_you_onclick();
}

function sc_form_funding_i_are_you_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funding_i_apply_for_loan_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_apply_for_loan();
  scCssBlur(oThis);
}

function sc_form_funding_i_apply_for_loan_onclick(oThis, iSeqRow) {
  do_ajax_form_funding_i_event_apply_for_loan_onclick();
}

function sc_form_funding_i_apply_for_loan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funding_i_loan_eligibility_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_loan_eligibility();
  scCssBlur(oThis);
}

function sc_form_funding_i_loan_eligibility_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funding_i_maintenance_loan_eligibility_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_maintenance_loan_eligibility();
  scCssBlur(oThis);
}

function sc_form_funding_i_maintenance_loan_eligibility_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funding_i_funding_support_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_funding_support();
  scCssBlur(oThis);
}

function sc_form_funding_i_funding_support_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funding_i_t_eligibility_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_t_eligibility();
  scCssBlur(oThis);
}

function sc_form_funding_i_t_eligibility_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funding_i_m_eligibility_onblur(oThis, iSeqRow) {
  do_ajax_form_funding_i_validate_m_eligibility();
  scCssBlur(oThis);
}

function sc_form_funding_i_m_eligibility_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("are_you", "", status);
	displayChange_field("apply_for_loan", "", status);
	displayChange_field("t_eligibility", "", status);
	displayChange_field("loan_eligibility", "", status);
	displayChange_field("m_eligibility", "", status);
	displayChange_field("maintenance_loan_eligibility", "", status);
	displayChange_field("funding_support", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_are_you(row, status);
	displayChange_field_apply_for_loan(row, status);
	displayChange_field_t_eligibility(row, status);
	displayChange_field_loan_eligibility(row, status);
	displayChange_field_m_eligibility(row, status);
	displayChange_field_maintenance_loan_eligibility(row, status);
	displayChange_field_funding_support(row, status);
}

function displayChange_field(field, row, status) {
	if ("are_you" == field) {
		displayChange_field_are_you(row, status);
	}
	if ("apply_for_loan" == field) {
		displayChange_field_apply_for_loan(row, status);
	}
	if ("t_eligibility" == field) {
		displayChange_field_t_eligibility(row, status);
	}
	if ("loan_eligibility" == field) {
		displayChange_field_loan_eligibility(row, status);
	}
	if ("m_eligibility" == field) {
		displayChange_field_m_eligibility(row, status);
	}
	if ("maintenance_loan_eligibility" == field) {
		displayChange_field_maintenance_loan_eligibility(row, status);
	}
	if ("funding_support" == field) {
		displayChange_field_funding_support(row, status);
	}
}

function displayChange_field_are_you(row, status) {
}

function displayChange_field_apply_for_loan(row, status) {
}

function displayChange_field_t_eligibility(row, status) {
}

function displayChange_field_loan_eligibility(row, status) {
}

function displayChange_field_m_eligibility(row, status) {
}

function displayChange_field_maintenance_loan_eligibility(row, status) {
}

function displayChange_field_funding_support(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_funding_i_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.position().top - (info.height() - trigger.height()),
          left: trigger.position().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

