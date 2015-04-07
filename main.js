$(document).ready(function() {
  correct_list = [];

  $('.add-button').click(function(e) {
    var action = 'new';
    var japanese = $('input[name=jp-word]').val();
    var english = $('input[name=en-word]').val();

    $.ajax({
      url: "ajax.php",
      type: "POST",
      data: { action : action, jp : japanese, en : english }
    }).done(function(data) {
      if(data == 'success') {
        location.reload();
      } else {
        $('.message').html(data);
      }
    }); // end of ajax done
  }); // end of add button

  $('.delete-button').click(function(e) {
    var action = 'delete';
    var id = $(this).prev().val();
    $.ajax({
      url: "ajax.php",
      type: "POST",
      data: { action : action, id : id }
    }).done(function(data) {
      if(data == 'success') {
        location.reload();
      } else {
        $('.message').html(data);
      }
    }); // end of ajax done
  }); // end of delete button

  $('.value').keypress(function(e) {
    var key = e.which;
    if(key == 13) {
      $('.ok-button').click();
      return false;
    }
  });

  $('.ok-button').click(function() {
    $('.message').html('');
    var id = $('input[name=id]').val();
    var action = $('input[name=action]').val();
    var japanese = '';
    var english = '';
    if(action == 'jpen') {
      japanese = $('.jp-word').html();
      english = $('input[name=en-word]').val();
    } else {
      japanese = $('input[name=jp-word]').val();
      english = $('.en-word').html();
    }

    $('input[name=jp-word]').val('');
    $('input[name=en-word]').val('');
    $.ajax({
      url: "ajax.php",
      type: "POST",
      data: { action : action, jp : japanese, en : english }
    }).done(function(data) {
      if(data == 'success') {
        correct_list[correct_list.length] = id;
        $('.counter .correct').html(correct_list.length);
        if(correct_list.length < $('.counter .total').html()) {
          $.ajax({
            url: "ajax.php",
            type: "POST",
            data: { action : 'get_data', ids : correct_list.join()},
            success: function(data) {
              result = data.split("::");
              if(action == 'jpen') {
                $('.jp-word').html(result[0]);
              } else {
                $('.en-word').html(result[1]);
              }
              $('input[name=id]').val(result[2]);
            }
          }); // end of ajax
        } else {
          $('.jp-word').html('');
          $('input[name=en-word]').val('').attr('disabled','disabled');
          $('.en-word').html('');
          $('input[name=jp-word]').val('').attr('disabled','disabled');
          $('input[name=id]').val('');
          $('.ok-button').attr('disabled','disabled');
          $('.message').html('You have completed all words').css('color','green');
        }
      } else {
        $('.message').html(data);
      }
    }); // end of ajax done
  }); // end of ok button


  $('.next-button').click(function() {

  }); // end of next button
});