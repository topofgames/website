function checkform(form) {
    $('#sb').show();
    if (form.title.value.length < 5) {
        alert("Title is to short. Must be minimum 5 characters long.");
        form.title.focus();
        $('#sb').hide();
        return false;
    }

    /*if (!regex.test(form.title.value)) {
        alert( "Title must contain only Letters, Numbers, Minus (-), Dot (.) or Colon (:)." );
        form.title.focus();
        $('#sb').hide();
        return false;
    }*/

    let cat = form.category.value;
    let url = form.url.value;
    let discord = form.discord.value;
    if (url.length > 8 && discord.length > 8 && url.toLowerCase() == discord.toLowerCase()) {
        alert("Website and Discord may not be the same or similar links.");
        form.url.focus();
        $('#sb').hide();
        return false;
    }

    var discord_regex = new RegExp("(https?:\/\/)?(www\.)?(discord\.(gg|io|me|li)|discordapp\.com\/invite)\/[a-zA-Z0-9]{6,8}");
    if (form.hasi.value == 1) {
        let ip = form.server_ip.value;
        if (ip == "") {
            alert("Please enter the your Server IP.");
            form.server_ip.focus();
            $('#sb').hide();
            return false;
        }

        if (url.length > 0 && url.indexOf('.') === -1) {
            alert("Website URL is not valid.");
            form.url.focus();
            $('#sb').hide();
            return false;
        }

        if (discord.length > 0 && !discord_regex.test(form.discord.value)) {
            alert("Please enter a valid Discord Invite URL or leave blank. Make sure the link code is set to never expire.");
            form.discord.focus();
            $('#sb').hide();
            return false;
        }
    } else {
        /*if (cat == "discord") {
            if (!discord_regex.test(form.discord.value)) {
                alert("Please enter a valid Discord Invite URL. Make sure the link code is set to never expire.");
                form.discord.focus();
                $('#sb').hide();
                return false;
            }
        } else {
            if (url.length < 4) {
                alert("Please enter the your website URL.");
                form.url.focus();
                $('#sb').hide();
                return false;
            }
        }

        if (url.length > 0 && url.indexOf('.') === -1) {
            alert("Website URL is not valid.");
            form.url.focus();
            $('#sb').hide();
            return false;
        }

        if (discord.length > 0 && !discord_regex.test(form.discord.value)) {
            alert("Please enter a valid Discord Invite URL or leave blank. Make sure the link code is set to never expire.");
            form.discord.focus();
            $('#sb').hide();
            return false;
        }*/
    }


    if ($('input[name="votifier"]:checked').val() == 1) {
        if (form.votifier_ip.value == "") {
            alert("Please enter your votifier IP.");
            form.votifier_ip.focus();
            $('#sb').hide();
            return false;
        }
        var port = form.votifier_port.value;
        if (port == "" || Math.floor(port) != port || !$.isNumeric(port) || port < 1 || port > 65535) {
            alert("Please enter a valid Votifier port, must be a value between 1 - 65535.");
            form.votifier_port.focus();
            $('#sb').hide();
            return false;
        }
        var key = form.public_key.value;
        if (key == "" || key.length < 300) {
            if (key.length < 300)
                alert("Your Votifier public key is to short, it is not valid.");
            else
                alert("Please enter your public key for Votifier.");
            form.public_key.focus();
            $('#sb').hide();
            return false;
        }
    }
    return true;
}


$(function(){
    $('#sb').hide();
    $('#sc').hide();
    $('#csuccess').hide();
    $('#cfailed').hide();
    $('#cunavail').hide();
    $('#connect').prop('disabled', false);

	$("#selectCountry").select2({placeholder: "Select hosting location"});
    $("#selectVersion").select2({
        tags: versions,
        tokenSeparators: [",", ";"],
        maximumSelectionSize: 5,
        maximumInputLength: 25,
        placeholder: "Version 1, Version2, v3.0,"
    });
    $("#selectType").select2({
        tags: types,
        tokenSeparators: [",", ";"],
        maximumSelectionSize: 15,
        maximumInputLength: 25,
        placeholder: "Type 1, Type2,"
    });

    var v, t = '';
    $('#enableVotifier').on("click", function () {
        $(".isVotifier").removeClass("hidden");
        $("#votifier_ip").prop('required', true);
        $("#votifier_port").prop('required', true);
        $("#public_key").prop('required', true);
    });
    $('#disableVotifier').on("click", function () {
        $(".isVotifier").addClass("hidden");
        $("#votifier_ip").prop('required', false);
        $("#votifier_port").prop('required', false);
        $("#public_key").prop('required', false);
    });
    $('#banner').change(function () {
        $('#filename').val($(this).val());
    });
    $('#title_size').maxlength({maxCharacters: 50, minCharacters: 5, status: true, showAlert: false, slider: true});
    $("#title_size").on("change, keyup", function () {
        if (this.value.length >= 4)
            $("#title-valid").removeClass("has-error").addClass("has-success");
        else
            $("#title-valid").removeClass("has-success").addClass("has-error");
    });

    $("#url").on("change", function () {
        if (this.value.indexOf("http") !== 0 && this.value != '' && this.value != '//') this.value = "https://" + this.value;
    });

    $("#discord").on("change", function () {
        if (this.value.indexOf("http") !== 0 && this.value != '' && this.value != '//') this.value = "https://" + this.value;
    });

    $("#connect").click(function () {
        const cat = $("#category").val();
        if (cat) {
            const ip = $("#server_ip").val();
            if (ip.length < 3) {
                alert("Please enter the your Server IP and Port.");
                form.server_ip.focus();
                $('#sb').hide();
                return false;
            }
            const query = $("#query").val();
            $('#connect').prop('disabled', true);
            $('#sc').show();
            const con = "/index.php?a=user_cpl&b=connect&c=" + cat + "&ip=" + ip + "&query=" + query;
            $.get(con, function (data) {
                if (data == '1') {
                    $('#csuccess').show();
                    $('#cfailed').hide();
                    $('#cunavail').hide();
                    $('#sc').hide();
                } else if (data == '0') {
                    $('#csuccess').hide();
                    $('#cfailed').show();
                    $('#cunavail').hide();
                    $('#sc').hide();
                } else {
                    $('#csuccess').hide();
                    $('#cfailed').hide();
                    $('#cunavail').show();
                    $('#sc').hide();
                }
                $('#connect').prop('disabled', false);
            });
        }
    });

});