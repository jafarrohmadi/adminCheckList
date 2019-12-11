let Myroot;
$(function () {
  Myroot = {
    start: function () {
      this.escapeEvent();
    },
    escapeEvent: function () {
      $(document).keydown(function (e) {
        if (e.keyCode === 27) $('.modal').slideUp(300);
      });
    }
  };
  Myroot.start(); // -----------------------------------------------------------------------------------------

  const accordionItem = document.querySelectorAll('.fd-accordion-item');

  const onClickAccordionHeader = e => {
    if (e.currentTarget.parentNode.parentNode.parentNode.classList.contains('currentSelect')) {
      e.currentTarget.parentNode.parentNode.parentNode.classList.remove('currentSelect');
    } else {
      Array.prototype.forEach.call(accordionItem, e => {
        e.classList.remove('currentSelect');
      });
      e.currentTarget.parentNode.parentNode.parentNode.classList.add('currentSelect');
    }
  };

  const runIt = () => {
    Array.prototype.forEach.call(accordionItem, e => {
      e.querySelector('div.comment').addEventListener('click', onClickAccordionHeader, false);
    });
  };

  runIt();
  $('.close').on('click', function () {
    $('.modal').slideUp(300);
  });

  function showModal(id) {
    $('#' + id).slideDown(300);
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('[data-photo=get-photo]').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#photo-proof').change(function () {
    readURL(this);
    $('.result-photo').show();
    $('.take-photo').hide();
  });
  $('.reTakePhoto').on('click', function (e) {
    e.preventDefault();
    $('#photo-proof').trigger('click', function () {
      $('.result-photo').show();
    });
  });
  $('.nav-bar .fd-wrapper .fd-slot').eq(2).on('click', function (e) {
    e.preventDefault();
    $('.timepickerBox').css({
      'marginTop': '50px'
    });
  });
  $('.hidePickerBox').on('click', function (e) {
    e.preventDefault();
    $('.timepickerBox').css({
      'marginTop': '0'
    });
  });
  $('.check').on('click', function () {
    let $checkList = $(this).find('input').prop('checked');
    $(this).find('input').prop('checked', !$checkList);

    if ($checkList === false) {
      $(this).children('div').eq(1).find('h4').css({
        'color': '#ddd',
        'textDecoration': 'line-through'
      });
    } else {
      $(this).children('div').eq(1).find('h4').removeAttr('style');
    }
  });
  $('.fd-accordion-item').each(function (e) {
    var _that = $(this);

    function capture(id) {
      let encodeImg = $('[data-photo=get-photo]').attr('src'); // let decodeImg = 
      // console.log(encodeImg);

      let getPhoto = $('[data-photo="get-photo"]').attr('src');
      $('#' + id).slideUp();

      _that.find('.groupBtn').children('figure.photo-thumb').show();

      _that.find('.groupBtn').children('div.takePic').hide();

      _that.find('.groupBtn').find('figure.photo-thumb').children('img').attr('src', getPhoto);
    }

    $(this).find('.groupBtn').children('div.takePic').on('click', function () {
      showModal('photo-capture');
      $('.result-photo').hide();
      $('.take-photo').show(100, function () {
        $('.savePhoto').on('click', function (a) {
          a.preventDefault();
          capture('photo-capture');
        });
      });
    });
    $(this).find('.groupBtn').children('figure.photo-thumb').on('click', function () {
      showModal('re-capture');
      $('.result-photo').show();
      $('.take-photo, .reSavePhoto').hide();
      $('#re-capture .result-photo img[data-photo="get-photo"]').on('load', function () {
        $('.reSavePhoto').show();
        $('.reSavePhoto').on('click', function (a) {
          a.preventDefault();
          capture('re-capture');
        });
      });
    });
    $(this).find('div.fd-accordion-body').find('button').on('click', function (e) {
      let $rel = $(this).data('rel');

      if ($rel === 'save') {
        if ($(this).parents().siblings('.textarea-custom').val() === '') {
          swal({
            title: 'Note masih kosong!',
            text: 'Anda harus mengisinya jika ingin menyimpan',
            icon: 'warning'
          });
        } else {
          swal({
            title: 'Simpan catatan',
            text: 'Catatan anda telah tersimpan',
            icon: 'success'
          }).then(() => {
            $(this).attr('disabled', true);
            $(this).parents().siblings('.textarea-custom').attr('disabled', true);
            $(this).parent().siblings('li').children('button[data-rel=edit]').removeAttr('disabled');
            $(this).parent().siblings('li').children('button[data-rel=erase]').removeAttr('disabled');
            $(this).parents().parents().removeClass('currentSelect');
            $(this).parents().parents().children('.fd-accordion-header').find('div.comment').children('i').removeClass('fa-pencil-alt').addClass('fa-comment-dots').css('color', '#26BEDB');
          });
        }
      } else if ($rel === 'edit') {
        $(this).attr('disabled', true);
        $(this).parents().siblings('.textarea-custom').attr('disabled', false);
        $(this).parent().siblings('li').children('button[data-rel=save]').removeAttr('disabled');
      } else {
        swal({
          title: 'Anda yakin ingin menghapus?',
          text: 'Apabila terhapus, data tidak dapat di kembalikan kembali!',
          icon: 'warning',
          buttons: true,
          dangerMode: true
        }).then(willDelete => {
          if (willDelete) {
            swal('Data telah terhapus!', {
              icon: 'success'
            }).then(() => {
              $(this).attr('disabled', true);
              $(this).parents().siblings('.textarea-custom').attr('disabled', false).val('');
              $(this).parent().siblings('li').children('button[data-rel=save]').removeAttr('disabled');
              $(this).parent().siblings('li').children('button[data-rel=edit]').attr('disabled', true);
              $(this).parents().parents().children('.fd-accordion-header').find('div.comment').children('i').removeClass('fa-comment-dots').addClass('fa-pencil-alt').removeAttr('style');
            });
          } else {
            swal('Data anda masih tersimpan!');
          }
        });
      }
    });
  });
});
//# sourceMappingURL=main.js.map
