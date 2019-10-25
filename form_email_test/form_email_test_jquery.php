
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
  scEventControl_data["smtp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_user" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["format" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["port" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["security" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["active" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sent_to" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["smtp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_user" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_user" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["format" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["format" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["port" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["port" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["security" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["security" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["active" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["active" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sent_to" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sent_to" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("format" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("security" + iSeq == fieldName) {
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
  $('#id_sc_field_smtp' + iSeqRow).bind('blur', function() { sc_form_email_test_smtp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_email_test_smtp_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_user' + iSeqRow).bind('blur', function() { sc_form_email_test_smtp_user_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_email_test_smtp_user_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_email' + iSeqRow).bind('blur', function() { sc_form_email_test_smtp_email_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_email_test_smtp_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_format' + iSeqRow).bind('blur', function() { sc_form_email_test_format_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_email_test_format_onfocus(this, iSeqRow) });
  $('#id_sc_field_port' + iSeqRow).bind('blur', function() { sc_form_email_test_port_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_email_test_port_onfocus(this, iSeqRow) });
  $('#id_sc_field_security' + iSeqRow).bind('blur', function() { sc_form_email_test_security_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_email_test_security_onfocus(this, iSeqRow) });
  $('#id_sc_field_active' + iSeqRow).bind('blur', function() { sc_form_email_test_active_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_email_test_active_onfocus(this, iSeqRow) });
  $('#id_sc_field_sent_to' + iSeqRow).bind('blur', function() { sc_form_email_test_sent_to_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_email_test_sent_to_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_email_test_smtp_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_smtp();
  scCssBlur(oThis);
}

function sc_form_email_test_smtp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_smtp_user_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_smtp_user();
  scCssBlur(oThis);
}

function sc_form_email_test_smtp_user_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_smtp_email_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_smtp_email();
  scCssBlur(oThis);
}

function sc_form_email_test_smtp_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_format_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_format();
  scCssBlur(oThis);
}

function sc_form_email_test_format_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_port_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_port();
  scCssBlur(oThis);
}

function sc_form_email_test_port_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_security_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_security();
  scCssBlur(oThis);
}

function sc_form_email_test_security_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_active_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_active();
  scCssBlur(oThis);
}

function sc_form_email_test_active_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_email_test_sent_to_onblur(oThis, iSeqRow) {
  do_ajax_form_email_test_validate_sent_to();
  scCssBlur(oThis);
}

function sc_form_email_test_sent_to_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("smtp", "", status);
	displayChange_field("smtp_email", "", status);
	displayChange_field("smtp_user", "", status);
	displayChange_field("format", "", status);
	displayChange_field("port", "", status);
	displayChange_field("security", "", status);
	displayChange_field("active", "", status);
	displayChange_field("sent_to", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_smtp(row, status);
	displayChange_field_smtp_email(row, status);
	displayChange_field_smtp_user(row, status);
	displayChange_field_format(row, status);
	displayChange_field_port(row, status);
	displayChange_field_security(row, status);
	displayChange_field_active(row, status);
	displayChange_field_sent_to(row, status);
}

function displayChange_field(field, row, status) {
	if ("smtp" == field) {
		displayChange_field_smtp(row, status);
	}
	if ("smtp_email" == field) {
		displayChange_field_smtp_email(row, status);
	}
	if ("smtp_user" == field) {
		displayChange_field_smtp_user(row, status);
	}
	if ("format" == field) {
		displayChange_field_format(row, status);
	}
	if ("port" == field) {
		displayChange_field_port(row, status);
	}
	if ("security" == field) {
		displayChange_field_security(row, status);
	}
	if ("active" == field) {
		displayChange_field_active(row, status);
	}
	if ("sent_to" == field) {
		displayChange_field_sent_to(row, status);
	}
}

function displayChange_field_smtp(row, status) {
}

function displayChange_field_smtp_email(row, status) {
}

function displayChange_field_smtp_user(row, status) {
}

function displayChange_field_format(row, status) {
}

function displayChange_field_port(row, status) {
}

function displayChange_field_security(row, status) {
}

function displayChange_field_active(row, status) {
}

function displayChange_field_sent_to(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_email_test_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

