<!-- javascript-->
{!! HTML::script('js/all.js') !!}

  <!-- JS Include -->
@section('jsInclude')
@show
  <!-- JS Include Form -->
@section('jsIncludeForm')
@show

<script>
  $(document).ready(function () {
    bootbox.setDefaults({backdrop: false});

    $("a.confirm-remove").click(function (e) {
      e.preventDefault();
      var location = $(this).attr('href');
      bootbox.dialog({
        title: 'You are about to delete an item',
        message: "This is not reversible.  Are you sure you want to proceed?",
        buttons: {
          success: {
            label: "Yes",
            className: "btn-primary",
            callback: function () {
              window.location.replace(location);
            }
          },
          danger: {
            label: "No",
            className: "btn-primary"
          }
        }
      });
    });
    $("a.confirm-continue").click(function (e) {
      e.preventDefault();
      var location = $(this).attr('href');
      bootbox.dialog({
        title: 'Verify before continuing',
        message: "Are you sure you want to continue?",
        buttons: {
          danger: {
            label: "No",
            className: "btn-primary"
          },
          success: {
            label: "Yes",
            className: "btn-primary",
            callback: function () {
              window.location.replace(location);
            }
          },
        }
      });
    });

    // Work around for multi data toggle modal
    // http://stackoverflow.com/questions/12286332/twitter-bootstrap-remote-modal-shows-same-content-everytime
    $('body').on('hidden.bs.modal', '#modal', function () {
      $(this).removeData('modal');
    });
    $("div[id$='Modal']").on('hidden.bs.modal', function () {
      $(this).removeData('bs.modal');
    });
    $("div[id$='modal']").on('hidden.bs.modal', function () {
      $(this).removeData('bs.modal');
    });

    $('[data-toggle="tooltip"]').tooltip()

    var mainError = {!! (Session::has('error') ? json_encode(Session::get('error')) : 0) !!};
    var mainErrors = {!! (Session::has('errors') ? json_encode(Session::get('errors')->all()) : 0) !!};
    var mainMessage = {!! (Session::has('message') ? json_encode(Session::get('message')) : 0) !!};
    var mainWarning = {!! (Session::has('warning') ? json_encode(Session::get('warning')) : 0) !!};
    var mainTwitch = {!! (Session::has('twitch') ? json_encode(Session::get('twitch')) : 0) !!};
    var mainSteam = {!! (Session::has('steam') ? json_encode(Session::get('steam')) : 0) !!};
    var mainRockstar = {!! (Session::has('rockstar') ? json_encode(Session::get('rockstar')) : 0) !!};
    var mainYoutube = {!! (Session::has('youtube') ? json_encode(Session::get('youtube')) : 0) !!};
    var mainSlack = {!! (Session::has('slack') ? json_encode(Session::get('slack')) : 0) !!};

    $.notifyDefaults({
      placement: {
        from: 'bottom',
        align: 'right'
      },
      animate: {
        enter: 'animated fadeInUp',
        exit: 'animated fadeOutDown'
      },
      allow_dismiss: true
    });

    if (mainError != 0) {
      $.notify({
        message: mainError,
        icon: 'fa fa-exclamation-triangle'
      }, {
        // settings
        type: 'danger'
      });
    }

    if (mainErrors != 0) {
      $.each(mainErrors, function () {
        $.notify({
           message: this,
           icon: 'fa fa-exclamation-triangle'
         }, {
           // settings
           type: 'danger'
         });
      });
    }

    if (mainMessage != 0) {
      $.notify({
        message: mainMessage,
        icon: 'fa fa-info-circle'
      }, {
        // settings
        type: 'info'
      });
    }

    if (mainTwitch != 0) {
      $.notify({
        message: mainTwitch,
        icon: 'fa fa-twitch'
      }, {
        // settings
        type: 'twitch'
      });
    }

    if (mainSteam != 0) {
      $.notify({
        message: mainSteam,
        icon: 'fa fa-steam'
      }, {
        // settings
        type: 'steam'
      });
    }

    if (mainRockstar != 0) {
      $.notify({
        message: mainRockstar,
        icon: 'fa fa-star'
      }, {
        // settings
        type: 'rockstar'
      });
    }

    if (mainYoutube != 0) {
      $.notify({
        message: mainYoutube,
        icon: 'fa fa-youtube-play'
      }, {
        // settings
        type: 'youtube'
      });
    }

    if (mainSlack != 0) {
      $.notify({
        message: mainSlack,
        icon: 'fa fa-slack'
      }, {
        // settings
        type: 'slack'
      });
    }

    if (mainWarning != 0) {
      $.notify({
        message: mainWarning,
        icon: 'fa fa-info'
      }, {
        // settings
        type: 'warning'
      });
    }

    // On Ready Js
    @section('onReadyJs')
    @show
    // On Ready Js Form
    @section('onReadyJsForm')
    @show
  });
</script>

<!-- JS -->
@section('js')
@show
  <!-- JS Form -->
@section('jsForm')
@show
