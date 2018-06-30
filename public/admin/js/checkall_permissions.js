$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.check_permissions').each(function(){
                this.checked = true;
            });
        }else{
             $('.check_permissions').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.check_permissions').on('click',function(){
        if($('.check_permissions:checked').length == $('.check_permissions').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
