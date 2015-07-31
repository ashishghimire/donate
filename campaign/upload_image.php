
	<script>
		
$(document).ready(function() {
//elements
var progressbox         = $('#progressbox'); //progress bar wrapper
var progressbar         = $('#progressbar'); //progress bar element
var statustxt           = $('#statustxt'); //status text element
var submitbutton        = $("#SubmitButton"); //submit button
var myform              = $("#UploadForm"); //upload form
var output              = $("#output"); //ajax result output element
var completed           = '0%'; //initial progressbar value
var FileInputsHolder    = $('#AddFileInputBox'); //Element where additional file inputs are appended
var MaxFileInputs       = 10; //Number of file input fields allowed to add

// adding and removing file input box

var i = $("#AddFileInputBox div").size() + 1;
$("#AddMoreFileBox").click(function (event) {
        event.returnValue = true;
        if(i < MaxFileInputs)
        {
            $('<span><input type="file" id="fileInputBox" size="20" name="file[]" class="addedInput" value=""/><a href="#" class="removeclass small2"><img src="images/close_icon.gif" border="0" /></a></span>').appendTo(FileInputsHolder);
            i++;
        }
        return false;
});
$("body").on("click",".removeclass", function(e){
        event.returnValue = false;
        if( i > 1 ) {
                $(this).parents('span').remove();i--;
        }  
});

$("#ShowForm").click(function () {
  $("#uploaderform").slideToggle(); //Slide Toggle upload form on click
});

$(myform).ajaxForm({
    beforeSend: function() { //brfore sending form
        submitbutton.attr('disabled', ''); // disable upload button
        statustxt.empty();
        progressbox.show(); //show progressbar
        progressbar.width(completed); //initial value 0% of progressbar
        statustxt.html(completed); //set status text
        statustxt.css('color','#000'); //initial color of status text

    },
    uploadProgress: function(event, position, total, percentComplete) { //on progress
        progressbar.width(percentComplete + '%') //update progressbar percent complete
        statustxt.html(percentComplete + '%'); //update status text
        if(percentComplete>50)
            {
                statustxt.css('color','#fff'); //change status text to white after 50%
            }else{
                statustxt.css('color','#000');
            }

        },
    complete: function(response) { // on complete
        output.html(response.responseText); //update element with received data
        myform.resetForm();  // reset form
        submitbutton.removeAttr('disabled'); //enable submit button
        progressbox.hide(); // hide progressbar
        $("#uploaderform").slideUp(); // hide form after upload
    }
});

});
	</script>
<div id="uploaderform">
    <label>
    <span class="small"><a href="#" id="AddMoreFileBox">Add More Files</a></span>
    </label>
    <div id="AddFileInputBox"><input id="fileInputBox" style="margin-bottom: 5px;" type="file"  name="file[]"/></div>
    <div class="sep_s"></div>

</div>