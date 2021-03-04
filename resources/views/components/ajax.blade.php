<script>
    function deleteConfirmation(url) {
        swal({
            title: 'Apakah kamu yakin untuk menghapus?',
            text: "Data ini tidak bisa dikebalikan lagi",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }, function(){
            deleteData(url);
        });
    }
    function alertSuccess(message, url){
        setTimeout(function() {
            swal({
                title: "Sukses",
                text: message,
                type: "success",
                html: true
            }, function () {
                window.location.replace(url)
            });
        }, 500);
    }
    function alertError(message){
        swal({
            title: "Gagal",
            text: message,
            showConfirmButton: true,
            confirmButtonColor: '#0760ef',
            type:"error",
            html: true
        });
    }
    
    function createOrUpdate(url, form_data){
        return $.ajax({
            type: 'post',
            url: url,
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
        });
    }
    function deleteData(url){
        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
            
            },
            success: function(res) {
                res.status == 'success' ? alertSuccess(res.message, res.url) : alertError(res.message)
            }
        })
    }
</script>