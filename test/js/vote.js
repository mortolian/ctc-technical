console.log('Vote Script Loaded');

/**
 * Vote
 * @param event
 */

const polls = document.querySelectorAll('[id^=poll-form]');

polls.forEach(item => {
    item = addEventListener('submit', function(event) {
        event.preventDefault();
        console.log('Submitted');

        const data = new FormData(event.target);

        // Validation
        if (!data.get('poll_option')) {
            alert('You have not made a selection.');
            return;
        }

        // get the details to store to the database
        const pollid = data.get('pollid');
        const poll_option = data.get('poll_option');

        // get the results for this poll and display them to the user, replacing the voting form.
        $.ajax({
            method: "POST",
            url: "/save_vote.php",
            data: {
                pollid: pollid,
                poll_option: poll_option
            }
        })
            .done(function (msg) {
                const pollForm = document.getElementById("poll-form-" + pollid);
                pollForm.innerHTML = "The result";
            })
            .fail(function () {
                alert("Could not record your vote at this time");
            });

    })
})