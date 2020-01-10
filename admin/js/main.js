
function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatar').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $('.phan_quyen').change(function () { 
      let level=$(this).val();
      let idUser=$(this).attr('data-id');
  

     $.get("modules/phan-quyen/xu_ly.php?level="+level+"&id="+idUser+"",
         function (data) {
            if(data=='success'){
                alert('đã cập nhật');
            }else{
                alert('Lỗi');
            }
             
         },
      
     );
      
    });





        $('#avatar').click(function(){
            $('#img').click();
        });
  
});


 

