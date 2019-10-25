
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
  scEventControl_data["training_examination" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["technical_skills" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["interest_hobbies" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["professional_goal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["info" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["youtube" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["other_links" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["file_upload" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["training_examination" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["training_examination" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["technical_skills" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["technical_skills" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["interest_hobbies" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["interest_hobbies" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["professional_goal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["professional_goal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["info" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["info" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["youtube" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["youtube" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["other_links" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["other_links" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["file_upload" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["file_upload" + iSeqRow]["change"]) {
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
  $('#id_sc_field_training_examination' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_training_examination_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_performing_arts_i_training_examination_onfocus(this, iSeqRow) });
  $('#id_sc_field_technical_skills' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_technical_skills_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_performing_arts_i_technical_skills_onfocus(this, iSeqRow) });
  $('#id_sc_field_interest_hobbies' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_interest_hobbies_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_performing_arts_i_interest_hobbies_onfocus(this, iSeqRow) });
  $('#id_sc_field_professional_goal' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_professional_goal_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_performing_arts_i_professional_goal_onfocus(this, iSeqRow) });
  $('#id_sc_field_youtube' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_youtube_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_performing_arts_i_youtube_onfocus(this, iSeqRow) });
  $('#id_sc_field_other_links' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_other_links_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_performing_arts_i_other_links_onfocus(this, iSeqRow) });
  $('#id_sc_field_info' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_info_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_performing_arts_i_info_onfocus(this, iSeqRow) });
  $('#id_sc_field_file_upload' + iSeqRow).bind('blur', function() { sc_form_performing_arts_i_file_upload_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_performing_arts_i_file_upload_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_performing_arts_i_training_examination_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_training_examination();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_training_examination_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_technical_skills_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_technical_skills();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_technical_skills_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_interest_hobbies_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_interest_hobbies();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_interest_hobbies_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_professional_goal_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_professional_goal();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_professional_goal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_youtube_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_youtube();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_youtube_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_other_links_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_other_links();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_other_links_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_info_onblur(oThis, iSeqRow) {
  do_ajax_form_performing_arts_i_mob_validate_info();
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_info_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_performing_arts_i_file_upload_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_performing_arts_i_file_upload_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("training_examination", "", status);
	displayChange_field("technical_skills", "", status);
	displayChange_field("interest_hobbies", "", status);
	displayChange_field("professional_goal", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("info", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("youtube", "", status);
	displayChange_field("other_links", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("file_upload", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_training_examination(row, status);
	displayChange_field_technical_skills(row, status);
	displayChange_field_interest_hobbies(row, status);
	displayChange_field_professional_goal(row, status);
	displayChange_field_info(row, status);
	displayChange_field_youtube(row, status);
	displayChange_field_other_links(row, status);
	displayChange_field_file_upload(row, status);
}

function displayChange_field(field, row, status) {
	if ("training_examination" == field) {
		displayChange_field_training_examination(row, status);
	}
	if ("technical_skills" == field) {
		displayChange_field_technical_skills(row, status);
	}
	if ("interest_hobbies" == field) {
		displayChange_field_interest_hobbies(row, status);
	}
	if ("professional_goal" == field) {
		displayChange_field_professional_goal(row, status);
	}
	if ("info" == field) {
		displayChange_field_info(row, status);
	}
	if ("youtube" == field) {
		displayChange_field_youtube(row, status);
	}
	if ("other_links" == field) {
		displayChange_field_other_links(row, status);
	}
	if ("file_upload" == field) {
		displayChange_field_file_upload(row, status);
	}
}

function displayChange_field_training_examination(row, status) {
}

function displayChange_field_technical_skills(row, status) {
}

function displayChange_field_interest_hobbies(row, status) {
}

function displayChange_field_professional_goal(row, status) {
}

function displayChange_field_info(row, status) {
}

function displayChange_field_youtube(row, status) {
}

function displayChange_field_other_links(row, status) {
}

function displayChange_field_file_upload(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_performing_arts_i_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

<?php

if (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl'] && isset($this->ul_info_file_upload) && '' != $this->ul_info_file_upload)
{
    $aTmpUploads = explode('@scl@', $this->ul_info_file_upload);
?>
var scUploadCount_file_upload = <?php echo sizeof($aTmpUploads); ?>;
var scUploadQueue_file_upload = new Array("<?php echo implode('", "', $aTmpUploads); ?>");
<?php
}
else
{
?>
var scUploadCount_file_upload = 0;
var scUploadQueue_file_upload = new Array();
<?php
}

?>
function scJQMultiUploadAdd(iSeqRow) {
  $("#id_sc_field_file_upload" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_performing_arts_i_mob_ul_save.php",
    dropZone: $("#id_sc_dragdrop_file_upload" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'file_upload'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    add: function (e, data) {
      var $elemSubmit, $divUpload, htmlUpload;
      $elemSubmit = $("#id_sc_submit_file_upload" + iSeqRow);
      if (!$elemSubmit.hasClass("sc_upload_submit")) {
        $elemSubmit.click(function () {
          data.submit();
        }).add("sc_upload_submit");
      }
      $divUpload = $("#id_sc_upload_todo_file_upload" + iSeqRow);
      $.each(data.files, function (index, file) {
        htmlUpload = $("<table id='id_sc_file_" + file.name + "' style='border-collapse: collapse; border-width: 0'><tr><td style='padding: 0'><img src='" + sc_img_mupload_pending + "' style='border-width: 0' title='<?php echo $this->Ini->Nm_lang['lang_upload_pending'] ?>' /></td><td class='sc_ui_mu_status_file_upload' style='padding: 1px 5px 1px 2px'>" + file.name + "</td><td style='padding: 1px 5px'><?php echo $this->Ini->Nm_lang['lang_errm_mu_pending'] ?></td></table>");
        $divUpload.append(htmlUpload);
      });
      sc_mupload_ok = false;
      scJQMultiFixStatus("file_upload");
    },
    progressall: function (e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_file_upload" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_file_upload" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var i, fileData, respData, respPos, respMsg, $loader, $elemSubmit, $divUploadTodo, $divUploadDone, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $loader = $("#id_img_loader_file_upload" + iSeqRow);
        $loader.hide();
      }
      else
      {
        $loader = $("#id_ajax_loader_file_upload" + iSeqRow);
        $loader.hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = fileData[0].error;
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $elemSubmit = $("#id_sc_submit_file_upload" + iSeqRow);
      $elemSubmit.unbind("click").removeClass("sc_upload_submit");
      $divUploadTodo = $("#id_sc_upload_todo_file_upload" + iSeqRow);
      $divUploadTodo.html("");
      $divUploadDone = $("#id_sc_upload_done_file_upload" + iSeqRow);
      for (i = 0; i < fileData.length; i++) {
        scUploadCount_file_upload++;
        scUploadQueue_file_upload.push("add@sci@" + fileData[i].name_prot + "@sci@" + fileData[i].sc_random_prot + "@sci@" + scUploadCount_file_upload);
        $divUploadDone.html($divUploadDone.html() + "<table id='id_sc_fileok_file_upload_" + scUploadCount_file_upload + "' style='border-collapse: collapse; border-width: 0'><tr><td style='padding: 0'><img src='" + sc_img_mupload_finished + "' style='border-width: 0' title='<?php echo $this->Ini->Nm_lang['lang_upload_completed'] ?>' /></td><td class='sc_ui_mu_status_file_upload' style='padding: 1px 5px 1px 2px; white-space: nowrap'>" + fileData[i].name + "&nbsp;<a href='javascript:scJQMultiUploadCancel_file_upload(" + scUploadCount_file_upload + ")'><img src='<?php echo $this->Ini->path_icones ?>/scriptcase__NM__trash.gif' style='border-width: 0; vertical-align: middle'></a></td><td style='padding: 1px 5px'><?php echo $this->Ini->Nm_lang['lang_errm_mu_complete'] ?></td></tr></table>");
      }
      sc_mupload_ok = true;
      scJQMultiFixStatus("file_upload");
    }
  });

} // scJQMultiUploadAdd

function scJQMultiFixStatus(fieldName) {
  var i, maxWidth = 0, $itemList;
  $itemList = $(".sc_ui_mu_status_" + fieldName);
  for (i = 0; i < $itemList.length; i++) {
    maxWidth = Math.max(maxWidth, $($itemList[i]).width());
  }
  if (0 < maxWidth) {
    $itemList.css("width", maxWidth + "px");
  }
} // scJQMultiFixStatus

function scJQMultiUploadPrepare_file_upload() {
  var i, $delItems = $(".id_mu_chkbx_file_upload:checked");
  for (i = 0; i < $delItems.length; i++) {
    scUploadCount_file_upload++;
    scUploadQueue_file_upload.push("del@sci@" + $($delItems[i]).val() + "@sci@@sci@" + scUploadCount_file_upload);
  }
  return scUploadQueue_file_upload.join("@scl@");
} // scJQMultiUploadPrepare_file_upload

function scJQMultiUploadCancel_file_upload(itemIndex) {
  var i, ulInfo;
  for (i = 0; i < scUploadQueue_file_upload.length; i++) {
    ulInfo = scUploadQueue_file_upload[i].split("@sci@");
    if (ulInfo[3] == itemIndex) {
      scUploadQueue_file_upload.splice(i, 1);
      $("#id_sc_fileok_file_upload_" + itemIndex).hide();
    }
  }
} // scJQMultiUploadCancel_file_upload

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQMultiUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

