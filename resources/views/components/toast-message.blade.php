<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Toastr
    var toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: true,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        width: '300px',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    @if (Session::has('success'))
        toastMixin.fire({
            icon: 'success',
            title: "{{ Session::get('success') }}"
        });
    @endif
    @if (Session::has('failure'))
        toastMixin.fire({
            icon: 'error',
            title: "{{ Session::get('failure') }}"
        });
    @endif
    @if (Session::has('access_granted'))
        Swal.fire({
            icon: 'error',
            title: 'Access Denied...',
            text: "{{ Session::get('access_granted') }}"
        });
    @endif
</script>
