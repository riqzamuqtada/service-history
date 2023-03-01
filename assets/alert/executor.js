const flashAuth = $('.flash-data').data('auth');
const flashMain = $('.flash-data').data('main');
const flashError = $('.flash-data').data('error');
const url = $('.flash-data').data('url');


if (flashAuth) {

  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 2000,
    showClass:
      {
        popup: 'animate__animated animate__bounceInDown'
      },
      hideClass:
      {
        popup: 'animate__animated animate__fadeOut'
      },
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: flashAuth
  })

}

if (flashMain) {

  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: flashMain
  })

}

if (flashError) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Unit ' + flashError + ' sedang digunakan pada riwayat service',
    footer: '<a href="'+ url +'service">hapus atau ubah data riwayat service</a>'
  })
}

// logout
$('.btn-logout').on('click', function (e) {

  e.preventDefault()

  Swal.fire({
    title: 'Yakin ingin keluar?',
    text: 'Pilih "logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Logout'
  }).then((result) => {
    if (result.isConfirmed) {

      document.location.href = $(this).attr('href')

    }
  })

})