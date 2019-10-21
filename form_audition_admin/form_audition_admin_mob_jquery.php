
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
  scEventControl_data["audition_title" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["venue_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["audition_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["audition_fee" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["audition_details" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["type" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["location_type" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contact_person" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["student_no" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["audition_title" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["audition_title" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["venue_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["venue_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["audition_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["audition_date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["audition_fee" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["audition_fee" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["audition_details" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["audition_details" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["type" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["type" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["location_type" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["location_type" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contact_person" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contact_person" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["student_no" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["student_no" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("venue_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("contact_person" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
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
  $('#id_sc_field_venue_id' + iSeqRow).bind('blur', function() { sc_form_audition_admin_venue_id_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_audition_admin_venue_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_audition_date' + iSeqRow).bind('blur', function() { sc_form_audition_admin_audition_date_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_audition_admin_audition_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_audition_date_hora' + iSeqRow).bind('blur', function() { sc_form_audition_admin_audition_date_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_audition_admin_audition_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_audition_title' + iSeqRow).bind('blur', function() { sc_form_audition_admin_audition_title_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_audition_admin_audition_title_onfocus(this, iSeqRow) });
  $('#id_sc_field_audition_fee' + iSeqRow).bind('blur', function() { sc_form_audition_admin_audition_fee_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_audition_admin_audition_fee_onfocus(this, iSeqRow) });
  $('#id_sc_field_audition_details' + iSeqRow).bind('blur', function() { sc_form_audition_admin_audition_details_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_audition_admin_audition_details_onfocus(this, iSeqRow) });
  $('#id_sc_field_contact_person' + iSeqRow).bind('blur', function() { sc_form_audition_admin_contact_person_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_audition_admin_contact_person_onfocus(this, iSeqRow) });
  $('#id_sc_field_student_no' + iSeqRow).bind('blur', function() { sc_form_audition_admin_student_no_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_audition_admin_student_no_onfocus(this, iSeqRow) });
  $('#id_sc_field_type' + iSeqRow).bind('blur', function() { sc_form_audition_admin_type_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_audition_admin_type_onfocus(this, iSeqRow) });
  $('#id_sc_field_location_type' + iSeqRow).bind('blur', function() { sc_form_audition_admin_location_type_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_audition_admin_location_type_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_audition_admin_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_audition_admin_status_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_audition_admin_venue_id_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_venue_id();
  scCssBlur(oThis);
}

function sc_form_audition_admin_venue_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_audition_date_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_audition_date();
  scCssBlur(oThis);
}

function sc_form_audition_admin_audition_date_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_audition_date();
  scCssBlur(oThis);
}

function sc_form_audition_admin_audition_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_audition_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_audition_title_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_audition_title();
  scCssBlur(oThis);
}

function sc_form_audition_admin_audition_title_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_audition_fee_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_audition_fee();
  scCssBlur(oThis);
}

function sc_form_audition_admin_audition_fee_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_audition_details_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_audition_details();
  scCssBlur(oThis);
}

function sc_form_audition_admin_audition_details_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_contact_person_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_contact_person();
  scCssBlur(oThis);
}

function sc_form_audition_admin_contact_person_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_student_no_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_student_no();
  scCssBlur(oThis);
}

function sc_form_audition_admin_student_no_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_type_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_type();
  scCssBlur(oThis);
}

function sc_form_audition_admin_type_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_location_type_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_location_type();
  scCssBlur(oThis);
}

function sc_form_audition_admin_location_type_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_audition_admin_status_onblur(oThis, iSeqRow) {
  do_ajax_form_audition_admin_mob_validate_status();
  scCssBlur(oThis);
}

function sc_form_audition_admin_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("audition_title", "", status);
	displayChange_field("venue_id", "", status);
	displayChange_field("audition_date", "", status);
	displayChange_field("audition_fee", "", status);
	displayChange_field("audition_details", "", status);
	displayChange_field("type", "", status);
	displayChange_field("location_type", "", status);
	displayChange_field("contact_person", "", status);
	displayChange_field("student_no", "", status);
	displayChange_field("status", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_audition_title(row, status);
	displayChange_field_venue_id(row, status);
	displayChange_field_audition_date(row, status);
	displayChange_field_audition_fee(row, status);
	displayChange_field_audition_details(row, status);
	displayChange_field_type(row, status);
	displayChange_field_location_type(row, status);
	displayChange_field_contact_person(row, status);
	displayChange_field_student_no(row, status);
	displayChange_field_status(row, status);
}

function displayChange_field(field, row, status) {
	if ("audition_title" == field) {
		displayChange_field_audition_title(row, status);
	}
	if ("venue_id" == field) {
		displayChange_field_venue_id(row, status);
	}
	if ("audition_date" == field) {
		displayChange_field_audition_date(row, status);
	}
	if ("audition_fee" == field) {
		displayChange_field_audition_fee(row, status);
	}
	if ("audition_details" == field) {
		displayChange_field_audition_details(row, status);
	}
	if ("type" == field) {
		displayChange_field_type(row, status);
	}
	if ("location_type" == field) {
		displayChange_field_location_type(row, status);
	}
	if ("contact_person" == field) {
		displayChange_field_contact_person(row, status);
	}
	if ("student_no" == field) {
		displayChange_field_student_no(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
}

function displayChange_field_audition_title(row, status) {
}

function displayChange_field_venue_id(row, status) {
}

function displayChange_field_audition_date(row, status) {
}

function displayChange_field_audition_fee(row, status) {
}

function displayChange_field_audition_details(row, status) {
}

function displayChange_field_type(row, status) {
}

function displayChange_field_location_type(row, status) {
}

function displayChange_field_contact_person(row, status) {
}

function displayChange_field_student_no(row, status) {
}

function displayChange_field_status(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_audition_admin_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_audition_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_audition_date" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['audition_date']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['audition_date']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_audition_admin_mob_validate_audition_date(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['audition_date']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_submitted_on" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_submitted_on" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['submitted_on']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['submitted_on']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_audition_admin_mob_validate_submitted_on(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['submitted_on']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSlideAdd(seqRow) {
  $("#sc-ui-slide-audition_fee" + seqRow).slider({
    min: 0,
    max: 100,
    range: "min",
    step: 1,
    slide: function(event, ui) {
      var thisValue = ui.value;
      thisValue = thisValue.toFixed(2);
      if (_scOnInputSupport && !_scMacOs) {
        $("#id_sc_field_audition_fee" + seqRow).val(thisValue);
        $("#id_sc_field_audition_fee" + seqRow).scInput("formatValue");
      }
      else {
        $("#id_sc_field_audition_fee" + seqRow).val(scFormatValue_audition_fee(thisValue));
      }
      var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
      if (changedRow.length) {
        $(changedRow[0]).prop("checked", true);
      }
    }
  });
  scJQSlideValue("audition_fee" + seqRow, seqRow);
  $("#sc-ui-slide-student_no" + seqRow).slider({
    min: 5,
    max: 200,
    range: "min",
    step: 1,
    slide: function(event, ui) {
      var thisValue = ui.value;
      if (_scOnInputSupport && !_scMacOs) {
        $("#id_sc_field_student_no" + seqRow).val(thisValue);
        $("#id_sc_field_student_no" + seqRow).scInput("formatValue");
      }
      else {
        $("#id_sc_field_student_no" + seqRow).val(scFormatValue_student_no(thisValue));
      }
      var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
      if (changedRow.length) {
        $(changedRow[0]).prop("checked", true);
      }
    }
  });
  scJQSlideValue("student_no" + seqRow, seqRow);
} // scJQSlideAdd

function scFormatValue_audition_fee(thisValue) {
  var thisParts = parseFloat(thisValue).toFixed(2).split(".");
<?php
if ('.' == $this->field_config['audition_fee']['symbol_grp']) {
?>
  thisParts[0]  = parseInt(thisParts[0]).toLocaleString("pt");
<?php
}
elseif (',' == $this->field_config['audition_fee']['symbol_grp']) {
?>
  thisParts[0]  = parseInt(thisParts[0]).toLocaleString("en");
<?php
}
elseif ('' != $this->field_config['audition_fee']['symbol_grp']) {
?>
  thisParts[0]  = parseInt(thisParts[0]).toLocaleString("pt").replace(new RegExp(scRegExpQuote("."), "g"), "<?php echo $this->field_config['audition_fee']['symbol_grp']; ?>");
<?php
}
?>
  thisValue     = thisParts.join("<?php echo $this->field_config['audition_fee']['symbol_dec']; ?>");
  return thisValue;
} // scFormatValue_audition_fee

function scUnformatValue_audition_fee(thisValue) {
<?php
if ('' != $this->field_config['audition_fee']['symbol_grp']) {
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['audition_fee']['symbol_grp']; ?>"), "g"), "");
<?php
}
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['audition_fee']['symbol_dec']; ?>"), "g"), ".");
  return thisValue;
} // scUnformatValue_audition_fee

function scFormatValue_student_no(thisValue) {
<?php
if ('.' == $this->field_config['student_no']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt");
<?php
}
elseif (',' == $this->field_config['student_no']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("en");
<?php
}
elseif ('' != $this->field_config['student_no']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt").replace(new RegExp(scRegExpQuote("."), "g"), "<?php echo $this->field_config['student_no']['symbol_grp']; ?>");
<?php
}
?>
  return thisValue;
} // scFormatValue_student_no

function scUnformatValue_student_no(thisValue) {
<?php
if ('' != $this->field_config['student_no']['symbol_grp']) {
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['student_no']['symbol_grp']; ?>"), "g"), "");
<?php
}
?>
  return thisValue;
} // scUnformatValue_student_no

function scJQSlideValue(fieldName, seqRow) {
  var fieldValue = $("#id_sc_field_" + fieldName).val();
  var testFieldName = fieldName;
  if ("" != seqRow) {
    testFieldName = testFieldName.substr(0, testFieldName.length - seqRow.toString().length);
  }
  if ("audition_fee" == testFieldName) {
    fieldValue = scUnformatValue_audition_fee(fieldValue);
  }
  var testFieldName = fieldName;
  if ("" != seqRow) {
    testFieldName = testFieldName.substr(0, testFieldName.length - seqRow.toString().length);
  }
  if ("student_no" == testFieldName) {
    fieldValue = scUnformatValue_student_no(fieldValue);
  }
  if ("" == fieldValue) {
    return;
  }
  fieldValue = parseFloat(fieldValue);
  if ("number" != typeof(fieldValue)) {
    return;
  }
  $("#sc-ui-slide-" + fieldName).slider("value", fieldValue);
} // scJQSlideValue

function scRegExpQuote(str) {
  return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
} // scRegExpQuote

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSlideAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

