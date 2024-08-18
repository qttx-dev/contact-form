$(document).ready(function() {
    var filesArray = [];

    $('#file').on('change', function() {
        var newFiles = $(this)[0].files;
        for (var i = 0; i < newFiles.length; i++) {
            filesArray.push(newFiles[i]);
        }
        updateFileList();
        $(this).val(''); // Reset file input
    });

    function updateFileList() {
        var fileListDisplay = $('#fileList');
        fileListDisplay.empty();

        filesArray.forEach(function(file, index) {
            var listItem = $('<li></li>').text(file.name);
            var removeButton = $('<button type="button">Entfernen</button>').on('click', function() {
                filesArray.splice(index, 1);
                updateFileList();
            });
            listItem.append(removeButton);
            fileListDisplay.append(listItem);
        });
    }

    $('#contactForm').on('submit', function(e) {
        var message = $('textarea[name="message"]').val().trim();
        if (message === '') {
            $('#message').text('Bitte geben Sie eine Nachricht ein.').addClass('error').show();
            return false; // Verhindert das Absenden des Formulars
        }

        e.preventDefault();
        $('#submitBtn').prop('disabled', true).text('Wird gesendet...'); // Deaktiviert den Senden-Button
        var formData = new FormData();
        
        // Fügen Sie die Formulardaten hinzu
        formData.append('name', $('input[name="name"]').val());
        formData.append('email', $('input[name="email"]').val());
        formData.append('subject', $('input[name="subject"]').val());
        formData.append('message', message);
        
        // Fügen Sie die Dateien hinzu
        filesArray.forEach(function(file) {
            formData.append('attachments[]', file);
        });

        $.ajax({
            url: 'mail.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#message').text('✔ Nachricht wurde erfolgreich versendet').removeClass('error').addClass('success').show();
                $('#submitBtn').text('Erfolgreich versendet');
            },
            error: function(xhr, status, error) {
                $('#message').text('Es gab ein Problem beim Senden der Nachricht: ' + error).removeClass('success').addClass('error').show();
                $('#submitBtn').prop('disabled', false).text('Senden'); // Aktiviert den Senden-Button
            }
        });
    });
});