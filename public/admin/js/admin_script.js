$('document').ready(function() {
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    //xoa nhieu du lieu
    $('#deleteMulti').click(function(){ //tim toi the co id = submit,su kien click
        if(!confirm('Bạn chắc chắn muốn xóa tất cả dữ liệu đã chọn ?'))
        {
            return false;
        }
        
        var ids = new Array();
        $('[name="id[]"]:checked').each(function()
        {
            ids.push($(this).val());
        });
        if (!ids.length) return false;
        //link xoa du lieu
        var url  = $(this).attr('url');

        //ajax để xóa
        $.ajax({
            url: url,
            type: 'POST',
            data : {'ids': ids},
            success: function()
            {
                $(ids).each(function(id, val)
                {
                    //xoa cac the <tr> chua danh muc tung ung
                    $('tr.row_'+val).fadeOut();			
                });
            }
            
        })
        return false;
    });
});
