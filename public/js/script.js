$(function () {
    $('.carousel').carousel({interval: 2000})
})

$(document).ready(function() {
    $('.modifier-profil').click(function(e) {
        e.preventDefault();

        // Récupérer le jeton CSRF
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Effectuer la requête AJAX
        $.ajax({
            url: '/profil/updateButton/',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                // Insérer le contenu du formulaire dans la page
                $('#formulaire-container').html(response);
            },
            error: function(xhr, status, error) {
                // Gérer les erreurs
                console.log(error);
            }
        });
    });
});

$(document).ready(function() {
    $(".show-comments-btn").click(function() {
        var postId = $(this).data("postid");
        var commentsContainer = $(".comments-container[data-postid='" + postId + "']");

        commentsContainer.slideToggle();
    });

    $(".add-comment-form").submit(function(event) {
        event.preventDefault();

        var postId = $(this).data("postid");
        var commentsContainer = $(".comments-container[data-postid='" + postId + "']");

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: function(response) {
                var comment = $('<div class="comment">' +
                    '<p><strong>' + response.auteur + '</strong></p>' +
                    '<p>' + response.content + '</p>' +
                    '</div>');
                commentsContainer.find(".comment:last-child").before(comment);

                $(".add-comment-form[data-postid='" + postId + "']")[0].reset();
            }
        });
    });
});

$(document).ready(function() {
    $(".show-comments-btn2").click(function() {
        var postId = $(this).data("postid");
        var commentsContainer = $(".comments-container[data-postid='" + postId + "']");
        commentsContainer.slideToggle();
    });

    $(".add-comment-form").submit(function(event) {
        event.preventDefault();

        var postId = $(this).data("postid");
        var commentsContainer = $(".comments-container[data-postid='" + postId + "']");

        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            success: function(response) {
                var comment = $('<div class="comment">' +
                    '<p><strong>' + response.auteur + '</strong></p>' +
                    '<p>' + response.content + '</p>' +
                    '</div>');
                commentsContainer.append(comment);

                $(".add-comment-form[data-postid='" + postId + "']")[0].reset();
            }
        });
    });
});







