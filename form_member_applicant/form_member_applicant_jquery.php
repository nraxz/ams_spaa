
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
  scEventControl_data["firstname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["middlename" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dateofbirth" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["address1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["town" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["county" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["postcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["country" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telephone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mobile" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["copy_text" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sex" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ethnicity" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nationality" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disability" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disbility_specify" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["offeron_disability" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["firstname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["firstname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["middlename" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["middlename" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dateofbirth" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dateofbirth" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["town" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["town" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["county" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["county" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["postcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["postcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telephone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telephone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mobile" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mobile" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["copy_text" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["copy_text" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sex" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sex" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ethnicity" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ethnicity" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nationality" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nationality" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disability" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disability" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disbility_specify" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disbility_specify" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["offeron_disability" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["offeron_disability" + iSeqRow]["change"]) {
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
  if ("sex" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("ethnicity" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("nationality" + iSeq == fieldName) {
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
  $('#id_sc_field_firstname' + iSeqRow).bind('blur', function() { sc_form_member_applicant_firstname_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_member_applicant_firstname_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastname' + iSeqRow).bind('blur', function() { sc_form_member_applicant_lastname_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_member_applicant_lastname_onfocus(this, iSeqRow) });
  $('#id_sc_field_middlename' + iSeqRow).bind('blur', function() { sc_form_member_applicant_middlename_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_member_applicant_middlename_onfocus(this, iSeqRow) });
  $('#id_sc_field_address' + iSeqRow).bind('blur', function() { sc_form_member_applicant_address_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_member_applicant_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_address1' + iSeqRow).bind('blur', function() { sc_form_member_applicant_address1_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_member_applicant_address1_onfocus(this, iSeqRow) });
  $('#id_sc_field_town' + iSeqRow).bind('blur', function() { sc_form_member_applicant_town_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_member_applicant_town_onfocus(this, iSeqRow) });
  $('#id_sc_field_county' + iSeqRow).bind('blur', function() { sc_form_member_applicant_county_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_member_applicant_county_onfocus(this, iSeqRow) });
  $('#id_sc_field_postcode' + iSeqRow).bind('blur', function() { sc_form_member_applicant_postcode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_member_applicant_postcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_country' + iSeqRow).bind('blur', function() { sc_form_member_applicant_country_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_member_applicant_country_onfocus(this, iSeqRow) });
  $('#id_sc_field_telephone' + iSeqRow).bind('blur', function() { sc_form_member_applicant_telephone_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_member_applicant_telephone_onfocus(this, iSeqRow) });
  $('#id_sc_field_mobile' + iSeqRow).bind('blur', function() { sc_form_member_applicant_mobile_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_member_applicant_mobile_onfocus(this, iSeqRow) });
  $('#id_sc_field_dateofbirth' + iSeqRow).bind('blur', function() { sc_form_member_applicant_dateofbirth_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_member_applicant_dateofbirth_onfocus(this, iSeqRow) });
  $('#id_sc_field_sex' + iSeqRow).bind('blur', function() { sc_form_member_applicant_sex_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_member_applicant_sex_onfocus(this, iSeqRow) });
  $('#id_sc_field_nationality' + iSeqRow).bind('blur', function() { sc_form_member_applicant_nationality_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_member_applicant_nationality_onfocus(this, iSeqRow) });
  $('#id_sc_field_ethnicity' + iSeqRow).bind('blur', function() { sc_form_member_applicant_ethnicity_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_member_applicant_ethnicity_onfocus(this, iSeqRow) });
  $('#id_sc_field_disability' + iSeqRow).bind('blur', function() { sc_form_member_applicant_disability_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_member_applicant_disability_onfocus(this, iSeqRow) });
  $('#id_sc_field_disbility_specify' + iSeqRow).bind('blur', function() { sc_form_member_applicant_disbility_specify_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_member_applicant_disbility_specify_onfocus(this, iSeqRow) });
  $('#id_sc_field_offeron_disability' + iSeqRow).bind('blur', function() { sc_form_member_applicant_offeron_disability_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_member_applicant_offeron_disability_onfocus(this, iSeqRow) });
  $('#id_sc_field_copy_text' + iSeqRow).bind('blur', function() { sc_form_member_applicant_copy_text_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_member_applicant_copy_text_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_member_applicant_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_member_applicant_email_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_member_applicant_firstname_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_firstname();
  scCssBlur(oThis);
}

function sc_form_member_applicant_firstname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_lastname_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_lastname();
  scCssBlur(oThis);
}

function sc_form_member_applicant_lastname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_middlename_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_middlename();
  scCssBlur(oThis);
}

function sc_form_member_applicant_middlename_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_address_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_address();
  scCssBlur(oThis);
}

function sc_form_member_applicant_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_address1_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_address1();
  scCssBlur(oThis);
}

function sc_form_member_applicant_address1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_town_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_town();
  scCssBlur(oThis);
}

function sc_form_member_applicant_town_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_county_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_county();
  scCssBlur(oThis);
}

function sc_form_member_applicant_county_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_postcode_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_postcode();
  scCssBlur(oThis);
}

function sc_form_member_applicant_postcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_country_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_country();
  scCssBlur(oThis);
}

function sc_form_member_applicant_country_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_telephone_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_telephone();
  scCssBlur(oThis);
}

function sc_form_member_applicant_telephone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_mobile_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_mobile();
  scCssBlur(oThis);
}

function sc_form_member_applicant_mobile_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_dateofbirth_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_dateofbirth();
  scCssBlur(oThis);
}

function sc_form_member_applicant_dateofbirth_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_sex_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_sex();
  scCssBlur(oThis);
}

function sc_form_member_applicant_sex_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_nationality_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_nationality();
  scCssBlur(oThis);
}

function sc_form_member_applicant_nationality_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_ethnicity_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_ethnicity();
  scCssBlur(oThis);
}

function sc_form_member_applicant_ethnicity_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_disability_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_disability();
  scCssBlur(oThis);
}

function sc_form_member_applicant_disability_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_disbility_specify_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_disbility_specify();
  scCssBlur(oThis);
}

function sc_form_member_applicant_disbility_specify_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_offeron_disability_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_offeron_disability();
  scCssBlur(oThis);
}

function sc_form_member_applicant_offeron_disability_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_copy_text_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_copy_text();
  scCssBlur(oThis);
}

function sc_form_member_applicant_copy_text_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_member_applicant_email_onblur(oThis, iSeqRow) {
  do_ajax_form_member_applicant_validate_email();
  scCssBlur(oThis);
}

function sc_form_member_applicant_email_onfocus(oThis, iSeqRow) {
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("firstname", "", status);
	displayChange_field("lastname", "", status);
	displayChange_field("middlename", "", status);
	displayChange_field("dateofbirth", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("address", "", status);
	displayChange_field("address1", "", status);
	displayChange_field("town", "", status);
	displayChange_field("county", "", status);
	displayChange_field("postcode", "", status);
	displayChange_field("country", "", status);
	displayChange_field("telephone", "", status);
	displayChange_field("mobile", "", status);
	displayChange_field("email", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("copy_text", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("sex", "", status);
	displayChange_field("ethnicity", "", status);
	displayChange_field("nationality", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("disability", "", status);
	displayChange_field("disbility_specify", "", status);
	displayChange_field("offeron_disability", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_firstname(row, status);
	displayChange_field_lastname(row, status);
	displayChange_field_middlename(row, status);
	displayChange_field_dateofbirth(row, status);
	displayChange_field_address(row, status);
	displayChange_field_address1(row, status);
	displayChange_field_town(row, status);
	displayChange_field_county(row, status);
	displayChange_field_postcode(row, status);
	displayChange_field_country(row, status);
	displayChange_field_telephone(row, status);
	displayChange_field_mobile(row, status);
	displayChange_field_email(row, status);
	displayChange_field_copy_text(row, status);
	displayChange_field_sex(row, status);
	displayChange_field_ethnicity(row, status);
	displayChange_field_nationality(row, status);
	displayChange_field_disability(row, status);
	displayChange_field_disbility_specify(row, status);
	displayChange_field_offeron_disability(row, status);
}

function displayChange_field(field, row, status) {
	if ("firstname" == field) {
		displayChange_field_firstname(row, status);
	}
	if ("lastname" == field) {
		displayChange_field_lastname(row, status);
	}
	if ("middlename" == field) {
		displayChange_field_middlename(row, status);
	}
	if ("dateofbirth" == field) {
		displayChange_field_dateofbirth(row, status);
	}
	if ("address" == field) {
		displayChange_field_address(row, status);
	}
	if ("address1" == field) {
		displayChange_field_address1(row, status);
	}
	if ("town" == field) {
		displayChange_field_town(row, status);
	}
	if ("county" == field) {
		displayChange_field_county(row, status);
	}
	if ("postcode" == field) {
		displayChange_field_postcode(row, status);
	}
	if ("country" == field) {
		displayChange_field_country(row, status);
	}
	if ("telephone" == field) {
		displayChange_field_telephone(row, status);
	}
	if ("mobile" == field) {
		displayChange_field_mobile(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("copy_text" == field) {
		displayChange_field_copy_text(row, status);
	}
	if ("sex" == field) {
		displayChange_field_sex(row, status);
	}
	if ("ethnicity" == field) {
		displayChange_field_ethnicity(row, status);
	}
	if ("nationality" == field) {
		displayChange_field_nationality(row, status);
	}
	if ("disability" == field) {
		displayChange_field_disability(row, status);
	}
	if ("disbility_specify" == field) {
		displayChange_field_disbility_specify(row, status);
	}
	if ("offeron_disability" == field) {
		displayChange_field_offeron_disability(row, status);
	}
}

function displayChange_field_firstname(row, status) {
}

function displayChange_field_lastname(row, status) {
}

function displayChange_field_middlename(row, status) {
}

function displayChange_field_dateofbirth(row, status) {
}

function displayChange_field_address(row, status) {
}

function displayChange_field_address1(row, status) {
}

function displayChange_field_town(row, status) {
}

function displayChange_field_county(row, status) {
}

function displayChange_field_postcode(row, status) {
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

function displayChange_field_telephone(row, status) {
}

function displayChange_field_mobile(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_copy_text(row, status) {
}

function displayChange_field_sex(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sex__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sex" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sex");
	}
}

function displayChange_field_ethnicity(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_ethnicity__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_ethnicity" + row).select2("destroy");
		}
		scJQSelect2Add(row, "ethnicity");
	}
}

function displayChange_field_nationality(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_nationality__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_nationality" + row).select2("destroy");
		}
		scJQSelect2Add(row, "nationality");
	}
}

function displayChange_field_disability(row, status) {
}

function displayChange_field_disbility_specify(row, status) {
}

function displayChange_field_offeron_disability(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_country("all", "on");
	displayChange_field_sex("all", "on");
	displayChange_field_ethnicity("all", "on");
	displayChange_field_nationality("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_member_applicant_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_dummy_dateofbirth" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var sFormat = "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['dateofbirth']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
          sSep = "<?php echo "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""; ?>",
          aParts = sFormat.split(sSep),
          aValue = new Array(),
          i, sPart;
      for (i = 0; i < aParts.length; i++) {
        switch (aParts[i]) {
          case "dd":
            sPart = "_dia";
            break;
          case "mm":
            sPart = "_mes";
            break;
          case "yy":
            sPart = "_ano";
            break;
        }
        aValue[i] = $("#id_sc_field_dateofbirth" + iSeqRow + sPart).val();
      }
      $("#id_sc_dummy_dateofbirth" + iSeqRow).val(aValue.join(sSep));
    },
    onClose: function(dateText, inst) {
      var sFormat = "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['dateofbirth']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
          sSep = "<?php echo "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""; ?>",
          aParts = sFormat.split(sSep),
          aValue = dateText.split(sSep),
          i;
      for (i = 0; i < aParts.length; i++) {
        switch (aParts[i]) {
          case "dd":
            sPart = "_dia";
            break;
          case "mm":
            sPart = "_mes";
            break;
          case "yy":
            sPart = "_ano";
            break;
        }
        $("#id_sc_field_dateofbirth" + iSeqRow + sPart).val(aValue[i]);
      }
      setTimeout(function() { do_ajax_form_member_applicant_validate_dateofbirth(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-30:c+30',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['dateofbirth']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_submitted" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_submitted" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['submitted']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['submitted']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_member_applicant_validate_submitted(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['submitted']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  if (null == specificField || "country" == specificField) {
    scJQSelect2Add_country(seqRow);
  }
  if (null == specificField || "sex" == specificField) {
    scJQSelect2Add_sex(seqRow);
  }
  if (null == specificField || "ethnicity" == specificField) {
    scJQSelect2Add_ethnicity(seqRow);
  }
  if (null == specificField || "nationality" == specificField) {
    scJQSelect2Add_nationality(seqRow);
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

function scJQSelect2Add_sex(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sex_obj" : "#id_sc_field_sex" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sex_obj',
      dropdownCssClass: 'css_sex_obj',
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

function scJQSelect2Add_ethnicity(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_ethnicity_obj" : "#id_sc_field_ethnicity" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_ethnicity_obj',
      dropdownCssClass: 'css_ethnicity_obj',
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

function scJQSelect2Add_nationality(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_nationality_obj" : "#id_sc_field_nationality" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_nationality_obj',
      dropdownCssClass: 'css_nationality_obj',
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
  scJQCalendarAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_country) { displayChange_field_country(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sex) { displayChange_field_sex(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_ethnicity) { displayChange_field_ethnicity(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_nationality) { displayChange_field_nationality(iLine, "on"); } }, 150);
} // scJQElementsAdd

