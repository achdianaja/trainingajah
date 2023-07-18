<script src="/vendor/jquery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            // Fungsi untuk menambahkan input
            let qty = {{count($description)}};
            // let numberOfErrors;
            $("#addInput").click(function () {
                generate();
            });

            function generate() {
                var inputHTML = `<div class="inputForm mb-3">` +
                    `<div class="input-group">` +
                    `<input type="text" class="form-control inputData" name="description[]" placeholder="Enter Description Package....">` +
                    `<input type="hidden" class="form-control inputId" name="descriptionId[]" placeholder="Enter Description Package....">` +
                    `<div class="input-group-append">` +
                    `<button type="button" class="btn btn-danger removeInput"><i class="fa-solid fa-xmark"></i></button>` +
                    `</div>` +
                    `</div>` +
                    `</div>`;

                $("#inputContainer").append(inputHTML);
                qty++;
                console.log(qty);
            }


            $(document).on('click', '.removeInput', function () {
                var $inputForm = $(this).closest('.inputForm');
                var descriptionId = $(this).data('description-id');
                var url = '/user/description-delete/' + descriptionId;

                if ($('.inputForm').length < 2) {
                    showToast('error', 'minimal maksimal boss')
                    return;
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        descriptionId: descriptionId
                    },
                    success: function (response) {
                        $inputForm.remove();
                        console.log(response);
                    },
                    error: function (msg) {
                        console.log(msg);
                    }
                });

                function showToast(type, message) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "The Description Fields Minimum 1"
                    });
                }
            });

            @if($errors->has('description.*'))
                showError();
            @endif

            function showError(type, message) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "The Description Must Be Filled!"
                    });
                }
        });
    });
</script>
