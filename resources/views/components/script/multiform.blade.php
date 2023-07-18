<script src="/vendor/jquery/jquery.js"></script>
<script>
    $(document).ready(function () {
        // Fungsi untuk menambahkan input
        let qty = 1;
        $("#addInput").click(function () {
            var inputHTML = `<div class="inputForm mb-3">` +
                                `<div class="input-group">` +
                                    `<input type="text" class="form-control inputData" name="description[]" placeholder="Enter Description Package....">` +
                                    `<div class="input-group-append">` +
                                        `<button class="btn btn-danger name="removeEdit" removeInput"><i class="fa-solid fa-xmark""></i></button>` +
                                    `</div>` +
                                `</div>` +
                            `</div>`;
            
            $("#inputContainer").append(inputHTML);
            qty++;
            $('#qty').val(qty);
        });
        
        // Fungsi untuk menghapus input
        $(document).on('click', '.removeInput', function () {
            qty--;
            $('#qty').val(qty);
            if ($('.inputForm').length > 0) {
                $(this).closest('.inputForm').remove();
            } else {
                alert("Minimal harus ada satu form input.");
            }
        });
    });

</script>
