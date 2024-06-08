import './bootstrap';
import Swal from 'sweetalert2';

window.Swal = Swal;

window.addEventListener('confirm', (event) => {
    let data = event.detail;
    Swal.fire({
        title: data.title,
        text: data.text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: data.confirmText,
        cancelButtonText: data.cancelText,
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch(data.method, { id: data.userId });
            // Swal.fire({
            //     title: "Đã thực hiện!",
            //     text: "",
            //     icon: "success"
            // });
        }
    });
});
