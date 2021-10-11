function addFriend(id, obj){
  //alert("Adicionando amigo "+ id);
  if(id != '') {

    $(obj).closest('.sugestaoitem').slideUp('fast');

    $.ajax({
      type:'POST',
      url:ajax/add_friend,
      data:{id:id}
    });
  }
}