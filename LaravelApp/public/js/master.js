var postId = 0;
var postBodyElement = null;
$('.post').find('.dropdown-menu').find('.edit').on('click', function (event) {

    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$(document).on('click', '#modal-save', function () {

    console.log($.ajax({
            method: 'POST',
            url: urlEdit,
            data: {
                body: $('#post-body').val(),
                postId: postId,
                _token: token
            }
        })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        }));
});

$(document).on('click', '.like', function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
    var nameOfOption = event.target.textContent;
    var isLike = false;
    if (nameOfOption == 'Like') {
        isLike = true;
    }
    var likenumber = $('#likenumber').text();
    var likeOnPost = ($('#' + postId + 'likes').text()).split(" ", 1);
    console.log("likenumber " + likenumber.length);
    console.log("likeOnPost " + likeOnPost.length);
    $.ajax({
            method: 'POST',
            url: urlLike,
            data: {
                isLike: isLike,
                postId: postId,
                _token: token
            }
        })
        .done(function () {


            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                likeOnPost++;
                $('#' + postId + 'likes').text(likeOnPost + " Likes");
                likenumber++;
                $('#likenumber').text(likenumber);
                event.target.parentNode.nextElementSibling.childNodes[0].innerText = 'Dislike';
            } else {
                likeOnPost--;
                $('#' + postId + 'likes').text(likeOnPost + " Likes");
                likenumber--;
                $('#likenumber').text(likenumber);
                event.target.parentNode.previousElementSibling.childNodes[0].innerText = 'Like';
            }
        });
});